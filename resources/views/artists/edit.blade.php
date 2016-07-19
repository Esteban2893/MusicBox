@extends('layouts.app')

@section('content')
	@parent
	<div class="row">
		<div class="col-md-5">
			<h1>Editando: {!! $artist->name  !!}</h1>
	    <hr>
			<form
		  method="POST"
			action="{{ url('/artists', $artist->id) }}"
			accept-charset="UTF-8">
				<input type="hidden" name="_method" value="PATCH">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				@include('artists.partials.form',
					['submitButtonText'=>'Actualizar'])
    	</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			@include('errors.list')
		</div>
	</div>

@stop
