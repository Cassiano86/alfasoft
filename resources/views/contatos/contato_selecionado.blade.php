@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-end mb-5 mr-3">
        <a href="{{route('home')}}" class="btn btn-outline-success">
            <i class="{{config('app.material')}}">arrow_back</i> Voltar
        </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{$contato->name}}" class='form-control' readonly>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{$contato->email}}" class='form-control' readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 form-group">
                            <label for="phone">Contact</label>
                            <input type="phone" name="phone" id="phone" value="{{$contato->contact}}" class='form-control' readonly>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <label for="date">Registration date</label>
                            <input type="text" name="date" id="date" value="{{date('d-m-Y',strtotime($contato->created_at))}}" class='form-control' readonly>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <a href="{{route('contato.edit',$contato->id)}}" class="btn btn-primary btn-sm">
                                <i class="{{config('app.material')}}">manage_accounts</i> Atualizar contato 
                            </a>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-danger btn-sm btn_deletar" data-href="{{route('contato.destroy', $contato->id)}}">
                                <i class="{{config('app.material')}}">person_remove</i> Deletar contato 
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('contatos.modals.modal_deletar_contato')
    @push('js')
        <script src="{{asset('js/contatos.js')}}"></script>
    @endpush
</div>
@endsection
