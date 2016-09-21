<?php
session_start();
?>
<?php



  if($_SESSION['user']=="")  //lo puse asi para que si se accede desde 0 te manda al index si apretas enviar entra
  {
    include'redir.php';
  }else /*<!-- aca termina el if si no paso por el index*/
{

    
?>
    <head>
    <meta charset="UTF-8" lang="es">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="imagenes/logo.ico"/>



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- fuentes -->
    <link href="css/fuentes.css" rel="stylesheet">

    <!--mi estilo -->
    <link href="css/miestilo.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

  
    <link href="css/jquery-ui.css" rel="stylesheet">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/cajascript.js" type="text/javascript"></script>

    </head>
    <?php 

    include 'conexion.php';

  ?>
  <body>

<?php

include 'navbarFooter.php';

?>

<div class="container" id="containerCuerpo">

	<div id="panel" class="panel panel-default">
  		<div class="panel-heading">
    		Profesionales
  		</div>
  		<div id="panel-cuerpo" class="panel-body" id="montos">


									
									<div class="col-md-6 col-sd-6">
                    <label for="profesional">Nombre del Profesional</label>

                  <!--<input type="text" id="codigo" onChange="buscar();" placeholder="Buscar"/>-->
									
                  <input id="profesio" name="profesio" title="Por favor ingrese tipo de profesio"
                  type="text" placeholder="Ingrese profesio" class="form-control" list="profesionales" required autofocus/> <br>
                  
                  
									</div>

                  <div class="col-md-6 col-sd-6">
                    <label for="profesional">Localidad</label>

                  <!--<input type="text" id="codigo" onChange="buscar();" placeholder="Buscar"/>-->
                  
                    <input id="localidad" name="localidad" title="Por favor ingrese localidad"
                    type="text" placeholder="Ingrese localidad" class="form-control" list="localidad"/> <br>
                  
                  
                  </div>
      
      </div>
      <div class="panel-footer"><button style="background: url(imagenes/logos/fondo_azul.png);" type="submit"  onClick="javascript:buscar('1');" class="btn btn-info  btn-lg" name="calcular">Buscar Profesional</button>
      <div id="mensaje"></div>
                  <!--<a href="sucesiones.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Calcular de Sucesiones</button></a>--></div>
	</div>

  <div id="panel" class="panel panel-default">

    <table id="grilla" class="table table-striped">
        <thead>
        <tr>
        <th>Nombre y Apellido</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Localidad</th>
        </tr>
        </thead>
      <tbody></tbody>
    </table>
    
    <ul class="pagination" id="pagination"></ul>
    
  </div>
</div>

<?php

include 'footer.php';
include 'footer1.php';
	}/*termina el else de que si no hay session disponible, o si no entro por el index */

?>
</body>
</html>

<script type="text/javascript">
var profesionales = [
<?php

$consulta="select *  from profesio1 order by nombrepro asc"; /*busca todo menos los que tenga suces*/
$result=mysql_query($consulta, $conexion);
$n= mysql_num_rows($result);
$i=0;


  for($i;$i<=$n;$i++)
  {
    $fila= mysql_fetch_array($result);
    if($fila["nombrepro"]!="")
    {

      print ('"'.$fila["nombrepro"].'",');
     }
  }
?>

];

var localidad = [
    <?php 
      $consulta="select locaprof  from profesio1 group by locaprof order by locaprof asc"; /*busca todo menos los que tenga suces*/
      $result=mysql_query($consulta, $conexion);
      $n= mysql_num_rows($result);
      $i=0;


      for($i;$i<=$n;$i++)
        {
          $fila= mysql_fetch_array($result);
          if($fila["locaprof"]!="")
        {

          print ('"'.$fila["locaprof"].'",');
          }
        }
    ?>
  ];

$( "#profesio" ).autocomplete({
  source: profesionales
});

$("#localidad").autocomplete({
  source: localidad
});
</script>
