@extends('layouts.app')

@section('content')
	@parent

	<div class="row">
	  <div class="col-md-6">
			<h1>Listado de Artistas</h1>
		</div>
	</div>
	<div class="row">
	  <div class="col-md-6">
			@if(count($artists)>0)
				<table  class="table table-hover">
					<tr>
						<th>Ver</th>
						<th>Editar</th>
						<th>Eliminar</th>
						<th>Nombre</th>
					</tr>
					@foreach ($artists as $artist)
						<tr>
							{{-- Columna botón SHOW --}}
							<td>
								<a class="btn btn-default btn-sm"
									 href="{{ URL::to('artists/' . $artist->id) . '/show' }}" role="button">
								 	<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
								 </a>
							</td>
							{{-- Columna botón EDIT --}}
							<td>
								<a class="btn btn-default btn-sm"
									 href="{{ URL::to('artists/' . $artist->id . '/edit') }}" role="button">
								 	<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
								 </a>
							</td>
							{{-- Columna botón DELETE --}}
							<td>
								<!-- Utilizar el método DESTROY /artists/{id} -->
								<form
								action="{{ url('/artists', $artist->id) }}"
								method="post">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="_method" value="DELETE">
									<button type="submit" class="btn btn-default btn-sm">
										<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
									</button>
								</form>
							</td>
							{{-- Columna NOMBRE de artista --}}
							<td>
								{{ $artist->name }}
							</td>
					</tr>
					@endforeach
				</table>
			@else
				<p>No se encontró ningún registro de artista</p>
			@endif
		</div>
	</div>
	<div class="row">
	  <div class="col-md-6">
			<a href="{{ url('/artists/create') }}"
				 class="btn btn-primary btn-sm">
				Registrar nuevo artista
			</a>
			<a href="{{ url('/') }}"
				 class="btn btn-default btn-sm">
				Inicio
			</a>
		</div>
	</div>
@stop
