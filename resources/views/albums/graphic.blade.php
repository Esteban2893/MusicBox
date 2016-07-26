@extends('layouts.app')
@section('header')
  @parent
	<script type="text/javascript"
          src="{{ asset('js/graphics.js') }}"
          charset="UTF-8"></script>
@stop
@section('content')
	@parent
  <script type="text/javascript" charset="UTF-8">
  	$(document).ready(function() {
      doGraphic(2);
  	});
  	// Recuperando el JSON desde el servidor
    // usando una solicitud GET HTTP
  	function doGraphic(type) {
  		$.getJSON( "{{ URL::to('albums/graphic-data') }}", function(data) {
  			makeGraphic(
          data,
          JSON.parse('{!! $graphicTitle !!}').title,
          type);
  		});
  	}
  </script>
  <div class="row">
    <div class="col-md-7">
      <div class="btn-group btn-group-justified" role="group">
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-default" onclick="doGraphic(1)">Pie Chart</button>
        </div>
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-default" onclick="doGraphic(2)">Circle Donut</button>
        </div>
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-default" onclick="doGraphic(3)">Semi Donut</button>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-7" id="graphic">
    <!-- style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto" -->
    </div>
  </div>
@stop
@section('content')
	@parent
  <script src="{{asset('js/highcharts/highcharts.js')}}"></script>
  <script src="{{asset('js/highcharts/modules/exporting.js')}}"></script>
@stop
