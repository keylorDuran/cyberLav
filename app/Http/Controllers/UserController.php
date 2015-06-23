<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Hash;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Auth;

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
        $userName = Input::get('user_name');
        $email = Input::get('email');        
        $password = Input::get('password');
        $password = Hash::make($password);
        $user = new User();
        $user->email = $email;
        $user->password = $password;
        $user->save();
        //Auth::attempt(array('email' => $email, 'password' => $password));
        return Redirect::to('/');
    }

   public function logon(){

        $userdata = array(
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
        );
        if (Auth::attempt($userdata)) {
            
            if (Auth::user()->is_admin){
                return Redirect::to('homes');
            }
            return Redirect::to('rocks');

        } else {
            // validation not successful, send back to form
            return Redirect::to('/')->withErrors(array('invalid_credentials' => 'Acceso Denegado'));
        }
    
   }
}
