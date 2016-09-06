<?php
session_start();
?>
<?php



  if($_SESSION['user']=="")  //lo puse asi para que si se accede desde 0 te manda al index si apretas enviar entra
  {
    include'redir.php';
  }else /*<!-- aca termina el if si no paso por el index*/
{

    include 'head.php';
?>
    <link href="css/jquery-ui.css" rel="stylesheet">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
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
    		<form class="form-horizontal" action="profesio.php" method="post">

								<!-- profesio input-->
								<div class="form-group">
                  <div class="col-sm-1 col-md-1"></div> <!--lo puse para alinear-->

									<label class="col-md-3 col-sm-3 control-label" for="profesio">Nombre del Profesional</label>
									<div class="col-md-4 col-sd-4">
									<input id="profesio" name="profesio" title="Por favor ingrese tipo de profesio"
                  type="text" placeholder="Ingrese profesio" class="form-control" list="profesionales" value="" required autofocus/>

									</div>
								</div>

							  <div class="form-horizontal">
                  <button style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-info  btn-lg" name="calcular">Buscar Profesional</button>
                  <!--<a href="sucesiones.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Calcular de Sucesiones</button></a>-->
								</div>

						</form>
  		</div>
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
$( "#profesio" ).autocomplete({
  source: profesionales
});
</script>
