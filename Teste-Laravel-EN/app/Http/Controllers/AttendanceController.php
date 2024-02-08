<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\UC;
use App\Models\UCClass;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // GET /attendance/add/{ucId}/{classId}
    public function create($ucId, $classId)
    {
        $uc = UC::find($ucId);
        $data['uc'] = $uc?->name;

        if (!$data['uc']) {
            return response()->view('error', ['errorCode' => 404, 'errorDescription' => 'Esta UC não existe.'], 404);
        }

        $ucClass = UCClass::find($classId);
        $data['aula'] = $ucClass?->name;

        if (!$data['aula']) {
            return response()->view('error', ['errorCode' => 404, 'errorDescription' => 'Esta aula não existe.'], 404);
        }

        $data['data'] = $ucClass->timestamp;
        $data['ucId'] = $ucId;
        $data['classId'] = $classId;
        $data['students'] = $uc->students;
        $data['lastUpdate'] = explode(' ', $ucClass->created_at)[0];
        return view('attendance.add', $data);
    }

    // POST /attendance/store
    public function store(Request $request)
    {
        $classId = $request->get('classId');
        $uc = UC::find($request->get('ucId'));
        $students = $uc->students;

        foreach ($students as $student) {
            $newState = $request->get('attendance-' . $student->student_id);
            $attendance = Attendance::firstOrNew(['student_id' => $student->student_id, 'class_id' => $classId]);
            $attendance->state = $newState ? 1 : 0;
            $attendance->save();
        }

        return redirect('attendance/show/' . $uc->uc_id . '/' . $classId);
    }

    // GET /attendance/show/{ucId}/{classId}
    public function index($ucId, $classId)
    {
        $uc = UC::find($ucId);
        $ucClass = UCClass::find($classId);

        if (!$uc) {
            return response()->view('error', ['errorCode' => 404, 'errorDescription' => 'Esta UC não existe.'], 404);
        } else if (!$ucClass) {
            return response()->view('error', ['errorCode' => 404, 'errorDescription' => 'Esta aula não existe.'], 404);
        }

        $data['students'] = $uc->students;
        $data['uc'] = $uc->name;
        $data['ucId'] = $ucId;
        $data['classId'] = $classId;
        $data['aula'] = $ucClass->name;
        $data['data'] = $ucClass->timestamp;
        $data['lastUpdate'] = explode(' ', $ucClass->created_at)[0];

        foreach ($data['students'] as $student) {
            $attendance = current(array_filter(
                $ucClass->attendances->toArray(),
                fn ($attendance) =>
                $attendance['student_id'] === $student->student_id
            ));

            if (!$attendance) {
                return response()->view('error', ['errorCode' => 404, 'errorDescription' => 'Esta UC ainda não tem presenças marcadas.'], 404);
            }

            $student->attendance = $attendance['state'] ? 'Sim' : 'Não';
        }

        return view('attendance.show', $data);
    }
}
