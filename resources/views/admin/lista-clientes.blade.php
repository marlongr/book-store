@extends('layouts.admin')

@section('conteudo')
<h2>Clientes cadastrados</h2>
    {!! Form::open(array('route' => 'admin.busca-clientes', 'class'=>'navbar-form navbar-right')) !!} 
    <div class="form-group">
        {!! Form::text('termo-pesquisa', null,['placeholder'=>'Pesquisar',
        'class'=>'form-control']) !!}
    </div>
    <button type="submit" class="btn btn-primary">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
    </button>
    {!! Form::close() !!}
<table class="table table-striped">
    <thead>
        <tr>
            <th class="text-left">Nome</th>
            <th class="text-left">Tipo</th>
            <th class="text-left">Pedidos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)

            <tr>
                <td>
                    {{$user->name}}
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
@stop