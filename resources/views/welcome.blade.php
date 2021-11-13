@extends('layouts.app')
@section('title_page', 'Página inicial')

@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <div class="container">
            <div class="row mt-5 text-center">
                <div class="col-lg-5">
                    <h2 class='mt-5'>Realize o gerenciamento dos seus contatos.</h2>
                    <p>Basta fazer o cadastro ou efetuar login e senha para realizar o gerenciamento.</p>  
                </div>
                <div class="col-lg-7">
                    <img src="{{asset('../img/ilustrativa.png')}}" alt="Imagem ilustrativa" class="img-fluid img-thumbnail">
                </div>
            </div>
        </div>
@endsection