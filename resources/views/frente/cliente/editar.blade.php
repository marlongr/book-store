@extends('layouts.cliente')

@section('conteudo')
<h2>Perfil Editar- {{Auth::user()->name}}</h3>

 <div class="container">

		{!! Form::open(['url' =>"cliente/Auth::user()->id/update" , 'method'=>'put']) !!}
 
<div class="form-group">
    {!! Form::label('name', 'Nome:', ['class' => 'control-label']) !!}
    {!! Form::text('nome', $user->nome, ['class'=>'form-control']) !!}
</div>
 
<div class="form-group">
    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
    {!! Form::textarea('email', $user->email, ['class'=>'form-control']) !!}
</div>
 
{!! Form::submit('Alterar perfil', ['class' => 'btn btn-primary']) !!}
 
{!! Form::close() !!}

 </div>
@endsection