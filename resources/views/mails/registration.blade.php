<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>


    <style>
        body {

            background-color: #9933ff;

        }


        .card {

            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 50%;
            align-content: center;
            text-align: center;
            margin: 0 auto;
            margin-top: 20%;
            background-color: #bf80ff
        }



        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }


        .container {
            padding: 2px 16px;

        }

        .button {

            background-color: #9933ff;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius:5px
        }

    </style>
</head>

<body>

    
    
    <div class="card">
        <img src="{{asset('imagens/purple.jpg')}}" alt="Avatar" style="width:100%">
        <div class="container">
            <h4><b>Cadastro efetuado com sucesso!</b></h4>
            <p>Acesse o Link para confirmar seu cadastro.</p>
        </div>
        <button class="button">OK</button>
    </div>
    


</body>

</html>