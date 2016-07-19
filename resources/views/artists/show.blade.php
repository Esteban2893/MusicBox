@extends('layouts.app')

@section('content')
	@parent

  <div class="row">
	  <div class="col-md-5">
      @if(is_null($artist))
    		<h1>Mostrando Artista</h1>
    		<p>El artista solicitado no existe</p>
    	@else
    		<h1>Mostrando: {{ $artist->name }}</h1>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Id: </span>
          <input readonly="true" type="text" class="form-control" value="{{ $artist->id }}">
        </div>
        <br>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Nombre: </span>
          <input readonly="true" type="text" class="form-control" value="{{ $artist->name }}">
        </div>
        <br>
    	@endif
		</div>
	</div>
  <div class="row">
	  <div class="col-md-5">
			<a href="{{ url('/artists') }}"
				 class='btn btn-default btn-sm'>
				 Ver todos los artistas
			</a>
		</div>
	</div>

@stop
