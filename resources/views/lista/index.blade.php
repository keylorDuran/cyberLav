@extends('layouts.master')
@section('content')
<div class="row">
    <legend>Lista de Reproducción</legend>
             
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
                                                <a href="/playlists/{{{$song->id}}}/select">Reproducir...</a>
                                            </td>                                        
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3">No hay canciones disponibles para reproducir...</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {!! $songs->render() !!}
                        </div>
                       
                        <!-- /.table-responsive -->
                        
                    
                </div>             
   
</div>
@endsection