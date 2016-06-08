@extends('layouts.admin')
@section('conteudo')
<div class='col-sm-12'>
    <div class="page-header text-muted">
        {{$users->total()}} encontrado(s) com o termo de busca 
        <span class="label label-info">{{$termo}}</span>
    </div>
</div>

<div class="col-sm-12 text-center">
    {!! $users->appends(['termo-pesquisa' => $termo])->links() !!}
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Usuário</th>
            <th>Pedidos</th>
        </tr>
    </thead>
    <tbody>

        @foreach($users as $user)

        <tr>
            
            <td>
                <a href="{{route('cliente.perfil', $user->id)}}">
                    {{$user->name}}
                </a>
            </td>
            <td>
                {{$user->role}}
            </td>
            <td>
                <a href="{{route('admin.lista-pedidos', $user->id)}}">Pedidos</a>
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
<div class="col-sm-12 text-center">
    {!! $users->links() !!}
</div>
@stop