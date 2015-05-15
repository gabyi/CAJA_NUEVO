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

    if(isset($calcular))
      {/*si se envian datos de sucesion, stristr( $string_donde_buscar, $string_que_se_busca) y se pone === para igual y !== para desigual */
?> <!-- php para las sucesiones-->

<div class="container " style="">
      <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Costos de Juicios</h3>
          </div>

          <div class="panel-body" id="montos">
            <form class="form-horizontal" action="montosJuicios.php" method="post">

            </form>
          </div>
      </div>
</div>

<?php
/* sucesiones sin si hay*/
} else { /*comienza si no hay*/

?>
<div class="container" style="margin-top: 80px;">

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">Costos de Juicios: INCIDENTE DE ADMINISTRACION. Monto: $100,00.</h3>
  		</div>
  		<div class="panel-body" id="montos" style="text_align:center;">
 <div class="col-sm-6 col-md-6">
  <CAPTION><h4>Costo de Iniciacion</h4></CAPTION>
  <table class="table-striped">
  <tr><th>Caja Forense de La Pampa</th></tr>
  
  <tr><td>Bono Ley Nº 422</td><td>125.00</td>
  <tr><td>Aportes</td><td>340,00</td><td style="align:right;padding-left:50px;">0.588000%</td></tr>
  <tr><td>Contribuciones</td><td>250,00</td></tr>  
  <tr style="border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;"><th>Total Caja Forense: </th><th>715,00</th></tr>
  
</table></div>
        


        <div class="col-sm-6 col-md-6">




<caption><h4>Costo de Finalizacion</h4></caption>
<table class="table-striped">
  
  <tr><th>Direccion General de Rentas</th></tr>
  <tr><td style="align:left;">Aportes</td><td style="align:right;">340.00</td><td></td><td style="align:right;padding-left:50px;">0.588000%</td></tr>
  
  
</table>

</div>


<!-- =================================================================================================================================-->
								<!-- Juicio input-->

                
                
</div>
						
  		</div>
	</div>
</div>

<?php
    }/*termina el form de las sucesiones*/
include 'footer.php';
	}/*termina el else de que si no hay session disponible, o si no entro por el index */

?>
  </body>
  </html>
<script type="text/javascript">
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