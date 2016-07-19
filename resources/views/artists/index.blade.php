@extends('layout.app')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

@section('content')
<h1>Artists</h1>
    <div class="row">
      <div class="col-sm-12">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Opciones</th>
            </tr>
          </thead>
            @foreach($artists as $artist)
          <tbody>
                  <tr>
                    <td>{{$artist->name}}</td>
                    <td>
					            {!!link_to_route('artists.edit', $title = 'Editar', $parameters = $artist, $attributes =
                      ['class'=>'fa fa-pencil fa-fw'])!!}
				          </td>
                  </tr>
                </tbody>
              @endforeach
        </table>

@stop
