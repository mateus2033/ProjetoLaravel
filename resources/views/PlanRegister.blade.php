@extends('layouts.app')



@section('content')

<div class="container-xl">

<div class="card-deck">
    <div class="card">
        <img class="card-img-top" src="{{asset('imagens/student.jpg')}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Seja um Aluno</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            <a href="{{ route('register') }}" class="btn btn-primary">Cadastrar</a>
        </div>
    </div>



    <div class="card">
        <img class="card-img-top" src="{{asset('imagens/teacher.jpg')}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Seja um Professor</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            <a href="{{route('professor')}}"  class="btn btn-primary">Cadastrar</a>
        </div>
    </div>

</div>


</div>

<!--
<div class="container">
 
<div class="row align-items-center">
    <div class="row align-items-center">

            <div class="card" style="width: 25rem;">
            <img class="card-img-top" src="{{asset('imagens/student.jpg')}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Seja um Aluno</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="{{ route('register') }}" class="btn btn-primary">Cadastrar</a>
            </div>
            </div>

    </div>


    <div class="col align-self-center">


            <div class="card" style="width: 25rem;">
            <img class="card-img-top" src="{{asset('imagens/teacher.jpg')}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Seja um Professor</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="{{route('professor')}}"  class="btn btn-primary">Cadastrar</a>
            </div>
            </div>


    </div>
    </div>

</div>

-->





<br>
<footer class="text-center text-white fixed-bottom" style="background-color: #8732E0;">


    <div class="text-center p-3" style="background-color:#8732E0;">
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>

</footer>
@endsection