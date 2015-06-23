<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>
<body>
  
  <div class="container">    
  <div style="margin-top:50px;" class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
  <div class="panel panel" >
  <div class="panel-heading">
  <div class="panel-title">Formulario de Registro</div>
  <br>  
  {!! Form::open(array('url' => 'register')) !!}
  <fieldset>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">Correo Electrónico</label>
      <div class="controls">
        {!! Form::email('email', Input::old('email'), array('placeholder' => '', 'class' => 'form-control', 'required' => 'true')) !!}
        
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Contraseña</label>
      <div class="controls">
        {!! Form::password('password', array('placeholder' => 'Contraseña', 'class' => 'form-control', 'required' => 'true')) !!}
        
      </div>
    </div>

     <div class="control-group">
      <!-- retype-->
      <label class="control-label" for="retype">Vuelva a digitar la contraseña</label>
      <div class="controls">
        {!! Form::password('retype', array('placeholder' => 'Contraseña', 'class' => 'form-control', 'required' => 'true')) !!}
      </div>
    </div>
 
   
    <div class="control-group">
      <!-- Button -->
      <div class="controls">        
        {!! Form::submit('Unirse', array()) !!}
      </div>
    </div>
  </fieldset>

{!! Form::close() !!}
</div>
</div>
</div>
</div>
</body>
</html>
