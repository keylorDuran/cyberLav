<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Support\Facades\Redirect;
use App\Song;
use Auth;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Auth::user()->is_admin){
            $songs = \App\Song::all();
            return view('canciones.index', compact('songs'));
        }
        return redirect('inicio');    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::user()->is_admin){
            //$artists = \App\Artist::all();
            $artists = \App\Artist::lists('name', 'id');
            return view('canciones.create', compact('artists'));
        }
        return redirect('inicio');    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function validar($ext){
    $valido = 1;
        if($ext!=="mp3"){
            $valido = 0;
        }
        
        return $valido;
    }

    public function uploadFile($file)
    {
        
        if ($file != NULL) {          
            
            $destinationPath = public_path();        
            $filename = $file->getClientOriginalName();
            $extension =$file->getClientOriginalExtension();        
            if($this->validar($extension) == 1){
                $uploadSuccess = Input::file('url_source')->move($destinationPath, $filename);
               
                if( $uploadSuccess ) {
                    $fileurl = $destinationPath . "/" . $filename;
                    
                        $newName = uniqid().'.mp3';         
                        rename($fileurl, $destinationPath.'/'.$newName);
                        $fileurl = $destinationPath . "/" . $newName;
                        
                        return $fileurl;            
                    
                    
                } else {
                   return Redirect::to('inicio'); 
                } 
            } else {
                
                    return Redirect::to('inicio');
            }
        } else {
            return Redirect::to('inicio'); 
        }
    }



    public function store()
    {
        $file = Input::file('url_source');

        $file = $this->uploadFile($file);
        $name = Input::get('name');
        $artist_id = Input::get('artist_id');


        $user = new Song();
        $user->name = $name;
        $user->artist_id = $artist_id;
        $user->url_source = $file;
        $user->save();

        return redirect('songs');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $artists = \App\Artist::lists('name', 'id');        

        $song = \App\Song::find($id);
        return view('canciones.edit', compact('song','artists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $song = \App\Song::find($id);
        $name = \Input::get('name');
        $artist_id = \Input::get('artist_id');
        
        $song->name = $name;
        $song->artist_id = $artist_id;
        $song->save();
        return redirect('songs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $song = \App\Song::find($id);

        unlink($song->url_source);

        $song->delete();
        return redirect('songs');
    }
}
