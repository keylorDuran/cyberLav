@extends('layouts.master')
@section('content')
<div class="container">    
  <legend>Modificar Canción</legend>
  <br>  
  {!! Form::open(array('url' => "/songs/$song->id/update")) !!}
  <fieldset>
 
    
    <div class="control-group">
          <!-- E-mail -->
          <label class="control-label" for="name">Canción</label>
          <div class="controls">
            {!! Form::text('name', $song->name, array('class' => 'form-control', 'required' => 'true')) !!}
          </div>
        </div>

        <div class="control-group">
          <!-- E-mail -->
          <label class="control-label" for="artist_id">Cantante</label>
          <div class="controls">
            {!! Form::select('artist_id', $artists, $song->artist_id, array('class' => 'form-control')) !!}
          </div>
        </div> 
        <br>
      <!-- Button -->
      <div class="controls">        
        {!! Form::submit('Guardar', array()) !!}
      </div>
    </div>
  </fieldset>

{!! Form::close() !!}

</div>
@endsection