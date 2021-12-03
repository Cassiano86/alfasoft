@extends('layouts.app')
@section('content')
<div class="container">
    @if(auth()->user())
        <div class="row justify-content-end mb-5">
            <a href="{{route('contato.create')}}" class="btn btn-outline-success">
                <i class="{{config('app.material')}}">group_add</i> Novo contato
            </a>
        </div>
    @endif
    <div class="row justify-content-center mt-5">
        <div class="table-responsive">
            <table class="table table-highlight table-bordered text-center">
                <thead class='thead-dark'>
                    <tr>
                        <th scope='col'>Nome</th>
                        <th scope='col'>Email</th>
                        @if(auth()->user())
                            <th scope='col'>Ações</th>
                        @endif
                    </tr> 
                </thead>
                <tbody>
                    @forelse($contatos as $contato)
                        <tr>
                            <td>{{$contato->name}}</td>
                            <td>{{$contato->email}}</td>
                            @if(auth()->user())
                                <td>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-4 col-sm-12">
                                            <a href="{{route('contato.show', $contato->id)}}" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-placement="top" title="Visualizar contato">
                                                <i class="{{config('app.material')}}">contact_page</i> 
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <a href="{{route('contato.edit',$contato->id)}}" class="btn btn-outline-primary btn-sm btn_atualizar" data-toggle="tooltip" data-placement="top" title="Atualizar contato">
                                                <i class="{{config('app.material')}}">manage_accounts</i> 
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <button class="btn btn-outline-danger btn-sm btn_deletar" data-href="{{route('contato.destroy', $contato->id)}}" data-toggle="tooltip" data-placement="top" title="Deletar contato">
                                                <i class="{{config('app.material')}}">person_remove</i> 
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            @endif
                        </tr> 
                    @empty
                        <td colspan='3'>
                            <i class="{{config('app.material')}}">person_off</i> Nenhum contato adicionado
                        </td>
                    @endforelse
                </tbody>
            </table>        
            <div class="row d-flex justify-content-end mt-3">
                {{ $contatos->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@include('contatos.modals.modal_deletar_contato')
@push('js')
    <script src="{{asset('js/contatos.js')}}"></script>
@endpush
@endsection
