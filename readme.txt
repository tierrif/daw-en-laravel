Identificação: 22897 / Tierri Ferreira / 22897@stu.ipbeja.pt

Antes de iniciar esta aplicação Laravel, é necessário alterar o ficheiro .env com os respetivos dados da base de dados MySQL a utilizar. Os valores atuais apenas de aplicam ao meu computador.

Para fazer o setup desta aplicação Laravel, executar os seguintes comandos:
- php artisan migrate
- php artisan db:seed
- php artisan serve

O script com a base de dados encontra-se anexado a este projeto, na mesma pasta que este ficheiro readme. No entanto, não é necessário criar a base de dados com esse script, uma vez que as migrations e os seeders fazem essa parte, exceto obviamente o registo de assiduidade (tabela attendance).

Uma dúvida que resolvi da maneira que mais me fez sentido foi o ID das classes no URL e o número da aula apresentada. Resolvi a dúvida da seguinte forma:
- O ID no URL (id2 conforme enunciado) é o ID da Class na base de dados (ou seja, a chave primária da tabela);
- A "Aula" que é mostrada na view é o atributo "name" da Class.
- Assim, ao usar o URL para lançar a assiduidade da UC com o ID 1 (TWAM) para a aula 1 de TWAM, o ID da aula será o ID na tabela class, que dependerá do resultado do seeder. Ou seja, o ID da Class no URL é DIFERENTE do valor "Aula" na view.

Para todos os acessos à base de dados foi usado o Eloquent ORM com relações criadas através de cada classe Model aplicável. As chamadas foram todas feitas no controlador.

Apenas foi aplicável a criação de um controlador uma vez que apenas o endpoint de Attendances é usado.

O teste foi realizado na sua totalidade.
