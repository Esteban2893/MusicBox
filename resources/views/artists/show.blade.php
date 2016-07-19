@extends('layout.app')
@section('content')
<h2>Ver artista</h2>

<div class="row">
  <div class="col-sm-12">
    <table class="table">
      <thead>
        <tr>
          <th>Nombre</th>
        </tr>
      </thead>
      <tbody>
              <tr>
                <td>{{$artist->name}}</td>
              </tr>
            </tbody>
          </table>
      <input type="button" class="btn btn-info" onclick="history.back()" name="Regresar" value="Regresar">
@stop
