<h1>Observações</h1>

    ---EM CONSTRUÇÃO!---

PROJETO COM O OBJETIVO DE TESTAR MEUS CONHECIMENTOS EM LARAVEL/PHP. 

    * PHP 7.4
    * Composer 2.2
    * Laravel 8
    * MySql

    Logo é necessario que se tenha instalados os seguintes itens citados acima.


<br>

<h1>Instalação</h1>

Use os seguintes comandos para o funcionamento da aplicação.
    
    * composer install
    * composer update

Verifique as configurações no arquivo .env do projeto.

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=seu-banco-de-dados
    DB_USERNAME=root
    DB_PASSWORD=senha

<strong>Caso não encontre o .env, renomeie o arquivo .env.example para  .env</strong>


Após isso, rode o seguinte comando para iniciar as configurações do banco de dados do projeto.

    * php artisan migrate ou php artisan migrate:fresh


<br>

<h1>Sobre</h1>

O projeto possui a parte de Aluno e Professor, sendo que cada uma das partes possui regras expecificas só que com algumas exeções.

<br>


<h1>Uso</h1>

<p>Use no INSOMNIA os arquivos localizados na pasta 'vox-Json-Projeto' na raiz do projeto. Os arquivos contém os dados para a utilização do projeto.</p>
<br>

    * crud-aluno: temos as rotas para, Criação, Deleção, Atualização, Busca e Listagem de todos os cadastros de Aluno.
    
    * crud-professor: temos as rotas para, Criação, Deleção, Atualização, Busca e Listagem de todos os cadastros de Professor.

    * crud-add-aula-professor: temos as rotas para Criar, Deletar, Atualizar, Confirmar e desmarcar uma aula por parte do Professor.

    * crud-marcar-aula: temos as rotas para marcar e desmarcar uma aula por parte do Aluno.

    * crud-add-calendario-aula: Temos as rotas para, caso um professor tenha adicionado uma aula a sua lista de aulas, assim podemos adicionar os dias de disponibilidade.



    OBS: É importante que seja efetuado o cadastro de alunos e professores antes de consumir as demais rotas do projeto.
     
<br>



<h1>PHPunit</h1>

Foram criadas funções que consomem as rotas de criação de alunos e professores com dados falsos.
Para usar basta digitar o comando abaixo no terminal.

    * ./vendor/bin/phpunit



