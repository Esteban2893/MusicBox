<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Http\Requests;
use Session;
use Redirect;

class ArtistController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
     $artists  = Artist::all();
     return view('artists/index',compact('artists'));
   }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('artists/create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Artist::create([
            'name' => $request['name'],
            ]);
      Session::flash('message','Artista creado correctamente');
      return redirect('/artists');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
        $artist = Artist::find($id);
        return view('artists.show',['artist'=> $artist]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $artist = Artist::find($id);
    return view('artists.edit',['artist'=>$artist]);
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
      $artist->fill($request->all());
      $artist->save();
      Session::flash('message','Artista actualizado correctamente');
      return Redirect::to('/artists');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      Artist::destroy($id);
      Session::flash('message','Artista eliminado correctamente');
      return Redirect::to('/artists');
  }
}
