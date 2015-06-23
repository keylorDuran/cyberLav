<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Hash;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return \View::make('user.register');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {        
        $email = Input::get('email');        
        $password = Input::get('password');
        $password = Hash::make($password);
        

        $user = new User();
        $user->email = $email;
        $user->password = $password;
        $user->save();
        
        return Redirect::to('/');
    }

   public function logon(){

        $userdata = array(
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
        );

        

        if (Auth::attempt($userdata)) {            
            
            if (Auth::user()->is_admin){
                return Redirect::to('inicio');
            }
            /*Si es guest lo manda a la lista de canciones*/
            return Redirect::to('playlists');

        } else {
            // validation not successful, send back to form
            return Redirect::to('/')->withErrors(array('message' => 'Acceso Denegado'));
        }
    
   }
}
