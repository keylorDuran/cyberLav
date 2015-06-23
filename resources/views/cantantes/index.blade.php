@extends('layouts.master')
@section('content')
    <div class="row">
    
            <legend>Cantantes (Lista)</legend>
               
            <div class="pull-right">
                    <div class="btn-group">
                        {!! link_to("artists/create", 'Nuevo', $attributes = array('Class'=>'btn btn-default'), $secure = null); !!}                                    
                    </div>
                </div>       
            </div>             
                <div class="row">                
                        
                        <div class="table-responsive">                            
                            <table class="table">
                                <thead>
                                    <tr>                                        
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th></th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($artists as $artist)
                                        <tr>                                         
                                        <td>{{{ $artist->id }}}</td>
                                        <td>{{{ $artist->name }}}</td>
                                        <td>
                                            <a href="/artists/{{{$artist->id}}}/edit">Modificar</a>                              
                                        </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3">No hay cantantes registrados</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                      
                        <!-- /.table-responsive -->
                  
                </div>             
                            
        

@endsection




