@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-end mb-5">
        <a href="{{route('home')}}" class="btn btn-outline-success">
            <i class="{{config('app.material')}}">arrow_back</i> Voltar
        </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-4 col-sm-12 form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{$contato->name}}" class='form-control' readonly>
                </div>
                <div class="col-md-4 col-sm-12 form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{$contato->email}}" class='form-control' readonly>
                </div>
                <div class="col-md-4 col-sm-12 form-group">
                    <label for="phone">Contact</label>
                    <input type="phone" name="phone" id="phone" value="{{$contato->contact}}" class='form-control' readonly>
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection
