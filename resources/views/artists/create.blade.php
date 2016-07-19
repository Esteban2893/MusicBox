@extends('layout.app')
@section('content')
<h2>Crear artista</h2>
	{!!Form::open(['route'=>'artists.store', 'method'=>'POST'])!!}
	<div class="form-group">
		{!!Form::label('nombre','Nombre:')!!}
		{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del artista'])!!}
	</div>
	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
