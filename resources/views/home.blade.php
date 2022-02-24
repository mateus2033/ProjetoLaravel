@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-12">
        <div class="card-header" style="background-color: #E0E0E0; border-radius:5px"><h3>{{Auth::user()->name}},<h3><h3>veja o que escolhemos para você.</h3></div>
         
        </div>
    </div>

    <br>
    
    <div class="row">

        <div class="col-3">
            <div class="card" style="width: 16rem;">
                <img class="card-img-top" src="{{asset('imagens/aulas/matematica.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Matemática</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Pesquisar</a>
                </div>
            </div>
        </div>


        <div class="col-3">
            <div class="card" style="width: 16rem;">
                <img class="card-img-top" src="{{asset('imagens/aulas/historia.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Historia</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Pesquisar</a>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card" style="width: 16rem;">
                <img class="card-img-top" src="{{asset('imagens/aulas/quimica.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Quimica</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Pesquisar</a>
                </div>
            </div>
        </div>


        <div class="col-3">
            <div class="card" style="width: 16rem;">
                <img class="card-img-top" src="{{asset('imagens/aulas/geografia.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Geografia</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Pesquisar</a>
                </div>
            </div>
        </div>
    </div>

</div>







@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
