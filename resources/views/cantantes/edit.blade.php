@extends('layouts.master')
@section('content')
<div class="container">    
  <legend>Modificar Cantante</legend>
  {!!Form::open(array('url' => "/artists/$artist->id", 'method' => 'PUT'))!!}
  <fieldset>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="name">Nombre</label>
      <div class="controls">        
      {!! Form::text('name', $artist->name, array('class' => 'form-control', 'required' => 'true')) !!}       
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