@extends('app')
@section('content')
 <div class="container">
 <h1>Edição de cliente</h1>

		{!! Form::open(['url' =>"clientes/$clientes->id_cliente/update" , 'method'=>'put']) !!}
 
<div class="form-group">
    {!! Form::label('nome', 'Nome:', ['class' => 'control-label']) !!}
    {!! Form::text('nome', $clientes->nome, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('cpf', 'Cpf:', ['class' => 'control-label']) !!}
    {!! Form::text('cpf', $clientes->cpf, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
    {!! Form::text('email', $clientes->email, ['class'=>'form-control']) !!}
</div>
 
{!! Form::submit('Alterar', ['class' => 'btn btn-primary']) !!}
 
{!! Form::close() !!}

 </div>
@endsection
