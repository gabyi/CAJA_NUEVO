<?php
session_start();

if($_SESSION['user']=="")
{
		include'redir.php';
}
else
	{
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="imagenes/logo.ico"/>

    <title>Caja Forense de La Pampa</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--mi estilo -->
    <link href="css/miestilo.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

     <!--Estos estan agregados para que minimece la barra movil-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--<link type="text/css" rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">-->

    <link href="css/jquery-ui.css" rel="stylesheet">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>

  <!--script para mover carrussel-->
    <script>
    $(document).ready(function(){
        $('.myCarousel').carousel()
    });
    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <?php

    	include 'conexion.php';

  ?>
  <body>

  </body>

  <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

		        <a class="navbar-brand" href="index.php">Caja Forense de La Pampa</a>

		</div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Inicio</a></li>
             <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Institucional <span class="caret"></span></a>
              	<ul class="dropdown-menu" role="menu">
              		<li><a href="#">Creacion y objetivos</a></li>
              		<!--<li class="divider"><li> Este se pone para hacer una linea divisoria entre los li-->
              		<li><a href="#">Autoridades</a></li>
              		<li><a href="#">Marco normativo y financiamiento</a></li>
              		<li><a href="#">Coordinadora de cajas</a></li>
             	</ul>
             </li>
			      <li class="active"><a href="montosJuicios.php">Costos de juicios</a></li>
                  <li><a href="contacto.php">Contacto</a></li>
          </ul>
        </div><!-- /.nav-collapse -->

       </div><!-- /.container -->
    </nav><!-- /.navbar -->
<?php
include 'logo.php';
?>

<div class="container " style="height: 380px; padding-top: 80px;">

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">Costos de Juicios</h3>
  		</div>
  		<div class="panel-body" id="montos">
    		<form class="form-horizontal" action="contacto.php" method="post">

								<!-- Juicio input-->
								<div class="form-group">
									<label class="col-md-3 col-sm-3 control-label" for="juicio">Tipo de Juicio</label>
									<div class="col-md-4 col-sd-4">
									<input id="juicio" name="juicio" title="Por favor ingrese tipo de juicio"
                  type="text" placeholder="Ingrese Juicio" class="form-control" list="juicios" required autofocus/>

									</div>
								</div>

								<!-- Monto input-->
								<div class="form-group">
									<label class="col-md-3 col-sm-3 control-label" for="monto">Monto del Juicio</label>
									<div class="col-md-3 col-sm-3">

										<input type="text" id="monto" name="monto" title="Ingrese Monto"  placeholder="Monto" class="form-control" required>

                  </div>
								</div>

							  <div class="form-horizontal">
                  <button type="submit" class="btn btn-info  btn-lg"name='calcular'>Calcular</button>
								</div>

						</form>
  		</div>
	</div>
</div>
<?php
include 'footer.php';
	}/*termina el else de que si no hay session disponible, o si no entro por el index */
?>

<script type="text/javascript" charset="utf-8">
var availableTags = [
<?php
$consulta="select * from ValoresCajaRentas order by materia asc";
$result=mysql_query($consulta, $conexion);
$n= mysql_num_rows($result);
$i=0;


  for($i;$i<=$n;$i++)
  {
    $fila= mysql_fetch_array($result);
    if($fila["materia"]!="")
      print ('"'.$fila["materia"].'",');
  }
?>

];
$( "#juicio" ).autocomplete({
  source: availableTags
});
</script>