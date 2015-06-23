@extends('layouts.master')
@section('content')
    <div class="row">
    
        <legend>Canciones (Lista)</legend>
        <div class="pull-right">
            <div class="btn-group">
                {!! link_to("songs/create", 'Nuevo', $attributes = array('Class'=>'btn btn-default'), $secure = null); !!}                                    
            </div>
        </div>       
    </div>     

             
    <div class="row">
     <div class="table-responsive">                      
        <table class="table">
            <thead>
            <tr>                                        
                 <th>Canción</th>
                 <th>Cantante</th>
                 <th></th>                                                                          
            </tr>
            </thead>
            <tbody>
                @forelse($songs as $song)
                    <tr>                                         
                    <td>{{{ $song->name }}}</td>

                    <td>{{{ $song->artist->name }}}</td>
                    <td>
                    <a  href="/songs/{{{$song->id}}}/edit">Modificar</a>
                    <a  href="/songs/{{{$song->id}}}/delete">Eliminar</a>                                                                      
                    </td>                                        
                    </tr>
                    @empty
                    <tr>
                    <td colspan="3">No hay canciones registradas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>
                       

@endsection




