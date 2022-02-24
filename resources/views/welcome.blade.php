<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mayall</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <style>

body {
  background: #007bff;
  background: linear-gradient(to right, #9933ff, #b366ff);
}
</style>

  
</head>

<body>
        <nav class="navbar navbar-expand-lg navbar navbar-light" style="background-color: #8732E0;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">LOGO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" style="font-size:19px; color:black" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-size:19px; color:black" href="#">Aulas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-size:19px; color:black" href="#">Cursos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-size:19px; color:black" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                </div>

                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">@</span>
                        <input type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping" style="padding: 5px;">
                    </div>

                    <ul class="navbar-nav" style="padding:5px;">
                        <li class="nav-item">
                            <a class="nav-link " style="font-size:19px; color:black" aria-current="page" href="{{ route('login') }}">Login</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" style="font-size:19px; color:black" href= "{{route('PlanRegister')}}" >Cadastrar</a>    
                        </li>
                    
                    </ul>
                </div>

            </div>
        </nav>
        

        <div class="card bg-dark text-white" style="width:100%; padding:1px;">
            <img src="{{asset('imagens/purple.jpg')}}" style="height:200px" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title">Cartão de Titulo</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text">Last updated 3 mins ago</p>
            </div>
        </div>
    


    <div class="container" style="margin-top:2%;">
        <div class="row row-cols-4">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('imagens/cropped.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Física</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Consultar Professores</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('imagens/cropped.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Biologia</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Consultar Professores</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('imagens/cropped.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Matemática</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Consultar Professores</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('imagens/cropped.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Geografia</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Consultar Professores</a>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col align-self-center" style="padding:2px">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="padding:4px;">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('imagens/cropped.jpg')}}" style="height:250px" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 style="color: black;">Tecnologia</h3>
                                <p style="color: black;">Some representative placeholder content for the third slide.</p>>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('imagens/cropped.jpg')}}" style="height:250px" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 style="color: black;">Tecnologia</h3>
                                <p style="color: black;">Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('imagens/cropped.jpg')}}" style="height:250px" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 style="color: black;">Tecnologia</h3>
                                <p style="color: black;">Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>



    <div class="container">

        <div class="container">
            <div class="row row-cols-4">
                <div class="col">

                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('imagens/avatar.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>


                </div>
                <div class="col">

                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('imagens/avatar.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>



                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('imagens/avatar.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>


                </div>
                <div class="col">

                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('imagens/avatar.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <br>
    
    <footer class="text-center text-white " style="background-color: #8732E0;">
        <div class="text-center p-3" style="background-color:#8732E0;">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
    </footer>

</body>
</html>