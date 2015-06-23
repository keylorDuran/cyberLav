@extends('layouts.master')
@section('content')
<div class="container">    
  
  <LEGEND>Agregar Canción</LEGEND>
  
  {!! Form::open(array('url' => 'songs','files' => true)) !!}
  
  <fieldset>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="name">Canción</label>
      <div class="controls">
        {!! Form::text('name', Input::old('name'), array('placeholder' => '', 'class' => 'form-control', 'required' => 'true')) !!}
      </div>
    </div>

    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="artist_id">Cantante</label>
      <div class="controls">
        {!! Form::select('artist_id', $artists, null, array('class' => 'form-control')) !!} 
      </div>
    </div>   

    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="name">Ruta de Origen</label>
      <div class="controls">
        {!! Form::file('url_source', '', array('class' => 'form-control input-sm')) !!}
      </div>
    </div>
   <br>
    <div class="control-group">
      <!-- Button -->
      <div class="controls">        
        {!! Form::submit('Guardar', array()) !!}
      </div>
    </div>
  </fieldset>

{!! Form::close() !!}

</div>
@endsection