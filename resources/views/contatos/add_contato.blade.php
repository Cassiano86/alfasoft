@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-end mb-5">
        <a href="{{route('home')}}" class="btn btn-outline-success">
            <i class="{{config('app.material')}}">arrow_back</i> Voltar
        </a>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{route('contato.store')}}" method='post' id="atualizar_contato">

                @csrf

                <div class="row">
                    <div class="col-md-4 col-sm-12 form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{old('name')}}" class='form-control'>
                        <small class="text-danger font-weight-bold">
                            {{$errors->has('name') ? $errors->first('name') : ''}}
                        </small>
                    </div>
                    <div class="col-md-4 col-sm-12 form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{old('email')}}" class='form-control'>
                        <small class="text-danger font-weight-bold">
                            {{$errors->has('email') ? $errors->first('email') : ''}}
                        </small>
                    </div>
                    <div class="col-md-4 col-sm-12 form-group">
                        <label for="contact">Contact</label>
                        <input type="phone" name="contact" id="contact" value="{{old('contact')}}" class='form-control'>
                        <small class="text-danger font-weight-bold">
                            {{$errors->has('contact') ? $errors->first('contact') : ''}}
                        </small>
                    </div>        
                </div>
                    
                <div class="row">
                    <button type='submit' class='btn btn-success d-block ml-auto mr-3'>
                        <i class="{{config('app.material')}}">add</i> Adicionar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('js')
    <script src="{{asset('js/contatos.js')}}"></script>
@endpush
@endsection
