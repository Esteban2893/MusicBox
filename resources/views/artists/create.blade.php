@extends('layouts.app')

@section('content')
	@parent

	<div class="row">
	  <div class="col-md-5">
			<h1>Nuevo artista</h1>
	    <hr>
		</div>
	</div>
	<div class="row">
	  <div class="col-md-5">
			<form action=" {{ url('/artists') }}" method="post">
				<input type="hidden" name="_token"
				value="{{ csrf_token() }}">
				@include('artists.partials.form',['submitButtonText'=>'Agregar'])
			</form>
			@include('errors.list')
		</div>
	</div>

@stop
