<?php
session_start();
?>
<?php



  if($_SESSION['user']=="" && !isset($calcular))  //lo puse asi para que si se accede desde 0 te manda al index si apretas enviar entra
  {
    include'redir.php';
  }else /*<!-- aca termina el if si no paso por el index*/
{
?>

<!DOCTYPE html>
<html lang="en">

  <head>
   <!--<meta charset="utf-8"> se lo saque para que tome las ñ en la busqueda de los juicios-->
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
    <script type="text/javascript" src="http://getbootstrap.com/dist/js/bootstrap.js"></script>
    <!--<link type="text/css" rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">-->

    <link href="css/jquery-ui.css" rel="stylesheet">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>

  </head>
  <?php

    	include 'conexion.php';

  ?>
  <body>



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
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Institucional <span class="caret"></span></a>
              	<ul class="dropdown-menu" role="menu">
              		<li><a href="#">Creacion y objetivos</a></li>
              		<!--<li class="divider"><li> Este se pone para hacer una linea divisoria entre los li-->
              		<li><a href="#">Autoridades</a></li>
              		<li><a href="#">Marco normativo y financiamiento</a></li>
              		<li><a href="#">Coordinadora de cajas</a></li>
             	  </ul>
             </li>
             <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Costos<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="montosJuicios.php">Costos de juicios</a></li>
                  <li class="active"><a href="sucesiones.php">Costos de sucesiones</a></li>
                </ul>
              </li>

             <li><a href="contacto.php">Contacto</a></li>
          </ul>
        </div><!-- /.nav-collapse -->

       </div><!-- /.container -->
    </nav><!-- /.navbar -->
<?php
include 'logo.php';

?> <!-- php para las sucesiones-->

<div class="container" style="margin-top: 80px;">

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">Costos de Juicios</h3>
  		</div>
  		<div class="panel-body" id="montos">
    		<form name="form-sus" class="form-horizontal" method="post">

<!-- =================================================================================================================================-->
								<!-- Juicio input-->

                <div class="form-group">
                    <div class="col-sm-4 col-md-4">
                      <h4>Bienes Gananciales</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="bg1" name="bg1" placeholder="En la Provincia de La Pampa" value="">
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="bg2" name="bg2" placeholder="Extra&ntilde;a Jurisdicci&oacute;n" value="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 col-md-4">
                      <h4>Bienes Propios</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="bp1" name="bp1" placeholder="En la Provincia de La Pampa" value="">
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="bp2" name="bp2" placeholder="Extra&ntilde;a Jurisdicci&oacute;n" value="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 col-md-4">
                      <div class="checkbox">
                        <label><input type="checkbox" name="oficio"> Oficio Ley 22.172 </label>
                      </div>
                    </div>

                    <div class="col-sm-4 col-md-4">
                      <div class="radio">
                        <label><input type="radio" value="1" name="sel" option="opcion1" checked> Act&uacute;a con poder (Apoderado) </label>
                      </div>
                    </div>

                    <div class="col-sm-4 col-md-4">
                      <div class="radio">
                        <label><input type="radio" value="2" name="sel" option="opcion2"> Act&uacute;a por derecho propio (Letrado) </label>
                      </div>
                    </div>
                </div>


							  <div class="form-group">
                  <div class="col-sm-12 col-md-12" style="text-align:center;">
                  <button type="submit" class="btn btn-info  btn-lg" name="calcular1" onclick= "doSend()" >Calcular de Sucesiones</button>
                  <!--<a href="montosJuicios.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Volver a Calculo de Juicios</button></a>-->
								</div>
                </div>

						</form>
  		</div>
	</div>

</div>

<?php

include 'footer.php';
	}/*termina el else de que si no hay session disponible, o si no entro por el index */

?>
  </body>
  </html>

<script type="text/javascript">

function doSend()
{

  var bg1 = document.getElementById("bg1").value;
  var bg2 = document.getElementById("bg2").value;
  var bp1 = document.getElementById("bp1").value;
  var bp2 = document.getElementById("bp2").value;

if(bg1 == "" && bg2 == "")
{
  var errorbg="";
}else
{
  var errorbg="TRUE";
}

if(bp1 == "" && bp2 == "")
{
  var errorbp="";
}else
{
  var errorbp="TRUE";
}

if(errorbp == "" && errorbg == "")
{
  document.all.item("form-sus").action="";
}else
{
  document.all.item("form-sus").action="tabla1.php";
}

};


var juicios = [
<?php

$consulta="select * from ValoresCajaRentas where materia LIKE '%SUCES%' order by materia asc"; /*buca todo menos los que tenga suces*/
$result=mysql_query($consulta, $conexion);
$n= mysql_num_rows($result);
$i=0;


  for($i;$i<=$n;$i++)
  {
    $fila= mysql_fetch_array($result);
    if($fila["materia"]!="")
    {

      print ('"'.$fila["materia"].'",');
     }
  }
?>

];
$( "#juicio" ).autocomplete({
  source: juicios
});


</script>
