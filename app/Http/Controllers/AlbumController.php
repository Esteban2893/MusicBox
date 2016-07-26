<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

use App\Artist;
use App\Album;
use App\Helpers\Message;

class AlbumController extends Controller
{
    /**
  	 * Recuperar los datos para el gráfico
	 	 * @return Array
  	 */
  	protected function getGraphicData()
  	{
  		// "Raw Queries"
  		$albums =
  			DB::select(
  				DB::raw("select art.name as artist_name,
  								        floor(count(*)/t.total*100) percentage
    						     from albums alb
  						       join artists art
      					       on art.id = alb.artist_id
    						     join (select count(*) total from albums) t
  						      group by artist_id") );
      return $albums;
  	}

    /**
     * Retorna JSON con los datos de gráfico
     * @return JSON;
     */
  	public function graphicData()
  	{
  		return Response::json($this->getGraphicData());
  	}

    /**
     * Muestra la vista con el gráfico
     */
    public function graphic()
    {
      $data['graphicData'] = json_encode($this->getGraphicData());
      $data['graphicTitle'] = json_encode(['title'=>'Cantidad de Álbumes']);
      return view('albums.graphic', $data);
    }

}
