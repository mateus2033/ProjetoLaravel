@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="aluno/store">
      
        <!--<form method="POST" action="{{ route('register') }}">-->
        <!--<form method="POST" action="api/aluno/store">-->
        <!--    @dump($errors->all()) -->
        @csrf
        <div class="card">
            <div class="card-header">{{ __('Dados Gerais') }}</div>
            <div class="card-body">

                <div class="row">

                    <!--value="{{ old('name') }}"-->
                    <div class="col-4">
                        <label for="name" class=""></label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="Mateus" placeholder="Nome" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!--value="{{ old('sobre_nome') }}"-->
                    <div class="col-4">
                        <label for="sobre_nome" class=""></label>
                        <input id="sobre_nome" type="text" class="form-control @error('sobre_nome') is-invalid @enderror" name="sobre_nome" value="Redfild" placeholder="Sobre nome" required autocomplete="sobre_nome" autofocus>
                        @error('sobre_nome')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!--value="{{ old('idade_aluno') }}"-->
                    <div class="col-2">
                        <label for="idade_aluno" class=""></label>
                        <input id="idade_aluno" type="numeric" class="form-control @error('idade_aluno') is-invalid @enderror" name="idade_aluno" value="1050" placeholder="Idade" required autocomplete="idade_aluno" autofocus>
                        @error('idade_aluno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!--value="{{ old('cpf_aluno') }}"-->
                    <div class="col-2">
                        <label for="cpf_aluno" class=""></label>
                        <input id="cpf_aluno" type="numeric" class="form-control @error('cpf_aluno') is-invalid @enderror" name="cpf_aluno" value="2424242424-MG" placeholder="CPF" required autocomplete="cpf_aluno" autofocus>
                        @error('cpf_aluno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>


                <div class="row">
                    <!--value="{{ old('email') }}"-->
                    <div class="col-4">
                        <label for="email" class=""></label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="mateus@email.com" placeholder="Email" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!--value="{{ old('password') }}"-->
                    <div class="col-4">
                        <label for="password" class=""></label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="12345678" placeholder="Senha" required autocomplete="password" autofocus>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <!--value="{{ old('password-confirm') }}"-->
                    <div class="col-4">
                        <label for="password-confirm" class=""></label>
                        <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password-confirm" value="12345678" placeholder="Confirmar Senha" required autocomplete="password-confirm" autofocus>
                        @error('confirm-password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                </div>
            </div>
        </div>
</div>


<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Escolaridade') }}</div>
        <div class="card-body">

            <div class="row">
                <!--value="{{ old('escolaridade_aluno') }}"-->
                <div class="col-4">
                    <label for="escolaridade_aluno" class=""></label>
                    <select id="escolaridade_aluno" type="text" class="form-control @error('escolaridade_aluno') is-invalid @enderror" name="escolaridade_aluno" value="Ensino Superior" placeholder="Escolaridade" required autocomplete="escolaridade_aluno" autofocus>

                        <option selected>
                        <p>Nivel</p>
                        </option>
                        <option value="FI">Fundamental-Incompleto</option>
                        <option value="FC">Fundamental-Completo</option>
                        <option value="MI">Médio-Incompleto</option>
                        <option value="MC">Médio-Completo</option>
                        <option value="TI">Técnico-Incompleto</option>
                        <option value="TC">Técnico-Completo</option>
                        <option value="SI">Superior-Incompleto</option>
                        <option value="SC">Superior-Completo</option>
                        <option value="OU">Outros</option>

                    </select>
                    @error('escolaridade_aluno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!--value="{{ old('curiosidades_aluno') }}"-->
                <div class="col-4">
                    <label for="curiosidades_aluno" class=""></label>
                    <textarea id="curiosidades_aluno" class="form-control @error('curiosidades_aluno') is-invalid @enderror" name="curiosidades_aluno" value="Curiosidades Apenas" placeholder="Curiosidades" required autocomplete="curiosidades_aluno" rows="1" autofocus></textarea>
                    @error('curiosidades_aluno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!--value="{{ old('objetivos_aluno') }}"-->
                <div class="col-4">
                    <label for="objetivos_aluno" class=""></label>
                    <textarea id="objetivos_aluno" type="text" class="form-control @error('objetivos_aluno') is-invalid @enderror" name="objetivos_aluno" value="Aulas Somente" placeholder="Objetivo" required autocomplete="objetivos_aluno" rows="1" autofocus></textarea>
                    @error('objetivos_aluno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>
        </div>
    </div>
</div>





<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Endereço') }}</div>
        <div class="card-body">


            <div class="row">

                <!--value="{{ old('endereco_rua') }}"-->
                <div class="col-4">
                    <label for="endereco_rua" class=""></label>
                    <input id="endereco_rua" type="text" class="form-control @error('endereco_rua') is-invalid @enderror" name="endereco_rua" value="29" placeholder="Rua" required autocomplete="endereco_rua" autofocus>
                    @error('endereco_rua')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!--value="{{ old('endereco_bairro') }}"-->
                <div class="col-4">
                    <label for="endereco_bairro" class=""></label>
                    <input id="endereco_bairro" type="text" class="form-control @error('endereco_bairro') is-invalid @enderror" name="endereco_bairro" value="Caixa Baixa" placeholder="Bairro" required autocomplete="endereco_bairro" autofocus>
                    @error('endereco_bairro')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <!--value="{{ old('endereco_cidade') }}"-->
                <div class="col-4">
                    <label for="endereco_cidade" class=""></label>
                    <input id="endereco_cidade" type="text" class="form-control @error('endereco_cidade') is-invalid @enderror" name="endereco_cidade" value="Vanna" placeholder="Cidade" required autocomplete="endereco_cidade" autofocus>
                    @error('endereco_cidade')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



            </div>


            <div class="row">

                <!--value="{{ old('endereco_estado') }}"-->
                <div class="col-4">
                    <label for="endereco_estado" class=""></label>
                    <select type="text" class="form-control" aria-label="Default select example" type="select" class="form-control @error('endereco_estado') is-invalid @enderror" name="endereco_estado" placeholder="Estado" required autocomplete="endereco_estado" autofocus>

                        <option selected>
                            <p>Estado</p>
                        </option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>

                    @error('endereco_estado')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <!--
                <label for="endereco_estado" class=""></label>
                <input id="endereco_estado" type="select" class="form-control @error('endereco_estado') is-invalid @enderror" name="endereco_estado" value="ES" placeholder="Estado" required autocomplete="endereco_estado" autofocus>
                @error('endereco_estado')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                -->
                </div>


                <!--value="{{ old('endereco_cep') }}"-->
                <div class="col-4">
                    <label for="endereco_cep" class=""></label>
                    <input id="endereco_cep" type="text" class="form-control @error('endereco_cep') is-invalid @enderror" name="endereco_cep" value="28168-494" placeholder="CEP" required autocomplete="endereco_cep" autofocus>
                    @error('endereco_cep')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <!--value="{{ old('endereco_longradouro') }}"-->
                <div class="col-4">
                    <label for="endereco_longradouro" class=""></label>
                    <input id="endereco_longradouro" type="text" class="form-control @error('endereco_longradouro') is-invalid @enderror" name="endereco_longradouro" value="Casa 80" placeholder="Longradouro" required autocomplete="endereco_longradouro" autofocus>
                    @error('endereco_longradouro')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>

        </div>
    </div>
</div>



<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Contato') }}</div>
        <div class="card-body">


            <div class="row">

                <!--value="{{ old('celular_primario') }}"-->
                <div class="col-6">
                    <label for="celular_primario" class=""></label>
                    <input id="celular_primario" type="text" class="form-control @error('celular_primario') is-invalid @enderror" name="celular_primario" value="99888-8888" placeholder="Celular Primario" required autocomplete="celular_primario" autofocus>
                    @error('celular_primario')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <!--value="{{ old('celular_secundario') }}"-->
                <div class="col-6">
                    <label for="celular_secundario" class=""></label>
                    <input id="celular_secundario" type="text" class="form-control @error('celular_secundario') is-invalid @enderror" name="celular_secundario" value="99999-9999" placeholder="Celular Secundario" required autocomplete="celular_secundario" autofocus>
                    @error('celular_secundario')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <div class="row">

                <!--value="{{ old('telefone_primario') }}"-->
                <div class="col-6">
                    <label for="telefone_primario" class=""></label>
                    <input id="telefone_primario" type="text" class="form-control @error('telefone_primario') is-invalid @enderror" name="telefone_primario" value="6767-7979" placeholder="Telefone primario" required autocomplete="telefone_primario" autofocus>
                    @error('telefone_primario')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!--value="{{ old('telefone_secundario') }}"-->
                <div class="col-6">
                    <label for="telefone_secundario" class=""></label>
                    <input id="telefone_secundario" type="text" class="form-control @error('telefone_secundario') is-invalid @enderror" name="telefone_secundario" value="3333-3333" placeholder="Telefone Secundario" required autocomplete="telefone_secundario" autofocus>
                    @error('telefone_secundario')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>




            </div>

            <div class="row">

                <!--value="{{ old('linkedin') }}"-->
                <div class="col-12">
                    <label for="linkedin" class=""></label>
                    <input id="linkedin" type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" value="mateus2033@linkedin.com" placeholder="Linkedin" required autocomplete="linkedin" autofocus>
                    @error('linkedin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="form-row text-center">
                <div class="col">
                    <a href="{{ url('/') }}" id="cancel" name="cancel" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-primary">{{ __('Registrar') }}</button>      
                </div>
            </div>
        </div>
    </div>
</div>
</form>
</div>

<footer class="text-center text-white " style="background-color: #8732E0;">
        <div class="text-center p-3" style="background-color:#8732E0;">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
    </footer>
@endsection
