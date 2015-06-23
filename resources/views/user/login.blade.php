<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>Iniciar Sesión</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  
    {!! Form::open(array('url' => 'logon')) !!}
    <div class="container">
      <div style="margin-top:50px;" class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
       
        
          <h2 class="form-signin-heading">Iniciar Sesión - CyberLAV</h2>
          <label for="inputEmail" class="sr-only">Email address</label>
          {!! Form::email('email', Input::old('email'), array('placeholder' => '', 'class' => 'form-control', 'required' => 'true')) !!}
          <label for="inputPassword" class="sr-only">Password</label>
          {!! Form::password('password', array('placeholder' => 'Contraseña', 'class' => 'form-control', 'required' => 'true')) !!}
          <div class="checkbox">
            
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar</button>
       
        <a href="users/create" onClick="">Registrarse</a>
      </div>
    </div> <!-- /container -->
    {!! Form::close() !!}  

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>