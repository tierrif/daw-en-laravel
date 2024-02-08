<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste DAW</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            padding: 5px 30px;
        }

        header {
            background: rgb(73, 73, 73);
            padding: 15px 5px;
        }

        header h1,
        header h2 {
            color: white;
            font-family: sans-serif;
            margin: 10px;
        }

        main {
            background: rgb(255, 250, 202);
            padding: 10px;
            font-family: sans-serif;
            margin: 10px 0;
            padding-top: 20px;
        }

        .class-info {
            margin: 10px 0;
        }

        .students {
            background: white;
            border-collapse: collapse;
        }

        tr, td, th {
            text-align: center;
            padding: 2px;
            border: 2px solid black;
        }

        .student-name, .student-number {
            width: 300px;
        }

        .student-attendance {
            width: 150px;
        }

        input[type="submit"] {
            margin-top: 10px;
            font-size: 16px;
            padding: 0 5px;
        }

        footer {
            background: rgb(73, 73, 73);
            padding: 5px;
            padding-top: 20px;
            color: white;
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <header>
        <h1>Portal Académico</h1>
        <h2>Gestão de assiduidade</h2>
    </header>
    <main>
        <hr />
        <h3>Registo de Assiduidade</h3>
        <hr />
        <div class="class-info">
            <p><b>UC: </b>{{ $uc }}</p>
            <p><b>Aula: </b>{{ $aula }}</p>
            <p><b>Data: </b>{{ $data }}</p>
        </div>
        <form method="POST" action="{{ url('/attendance/store') }}">
            @csrf
            <input type="hidden" name="ucId" value="{{ $ucId }}" />
            <input type="hidden" name="classId" value="{{ $classId }}" />
            <table class="students">
                <thead>
                    <th class="student-number">Número Aluno</th>
                    <th class="student-name">Nome Aluno</th>
                    <th class="student-attendance">Presença</th>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->number }}</td>
                            <td>{{ $student->name }}</td>
                            <td><input type="checkbox" name="attendance-{{ $student->student_id }}"
                                    @checked(old('attendance-' . $student->student_id)) /></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <input type="submit" value="Registar Presenças" />
        </form>
    </main>
    <footer>
        <p>Última atualização: {{ $lastUpdate }}<br />
            Todos os direitos do IPBeja (C) 2023</p>
    </footer>
</body>

</html>
