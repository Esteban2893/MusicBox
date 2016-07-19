<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Artist;
use App\Helpers\Message;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recuperar todos los registros
    		$artists = Artist::all();

        // Carga las vista y le pasa el arreglo
        return View::make('artists.index')
          ->with('artists', $artists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Carga la vista con el formulario de creación de nuevo registro
    		return View::make('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtistRequest $request, Message $message)
    {
        Artist::create($request->all());

        /* Para evitar repetir estas lineas cada vez que se desea enviar un
        mensaje al usuario, se debe crear un ServiceProvider.

          session()->flash('flash_message','El artículo se registró correctamente');
          session()->flash('flash_message_level','danger');
          session()->flash('flash_message_important', true);
        */
        $message->pushMessage('Artista guardado correctamente', 'success', false);
        return redirect('artists');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Recupera el registro de base de datos
    		$artist = Artist::find($id);

    		// Carga las vista y le pasa el "Artist"
    		return View::make('artists.show ')
    			->with('artist', $artist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Recupera el registro de base de datos
    		$artist = Artist::find($id);

        //return $artist->name;
        //dd($artist);
        //exit;

    		//  Muestra el formulario de edición y pasa datos del registro
    		return View::make('artists.edit')
    			->with('artist', $artist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artist = Artist::find($id);
    		//$artist->name = Input::get('name');
        $artist->name = $request->get('name');
    		$artist->save();
    		return Redirect::to('artists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Message $message)
    {
        // delete
    		$artist = Artist::find($id);
        $message->pushMessage('Artista ' . $artist->name . ' eliminado', 'warning', false);
    		$artist->delete();
    		return Redirect::to('artists');
    }
}
