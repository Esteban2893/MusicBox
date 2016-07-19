@extends('layout.app')
@section('content')
<h2>Editar artista</h2>
	{!!Form::model($artist,['route'=>['artists.update',$artist],'method'=>'PUT'])!!}
  <div class="form-group">
		{!!Form::label('nombre','Nombre:')!!}
		{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del artista'])!!}
	</div>
	{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
