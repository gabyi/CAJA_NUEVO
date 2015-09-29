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
     <?php
      include 'head2.php';
      include 'conexion.php';
      ?>
  <title>Presupuesto de Sucesiones</title>
  </head>

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

		        <a id="marca" class="navbar-brand" href="index.php"><h4>Caja Forense de La Pampa</h4></a>

		</div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="institucional.php">Institucional</a></li>
            <li><a href="institucional.php#comision">Comisi&oacute;n de J&oacute;venes</a></li>
            <li><a href="contacto.php">Contacto</a></li>
          </ul>
        </div><!-- /.nav-collapse -->

       </div><!-- /.container -->
    </nav><!-- /.navbar -->
<?php
include 'logo.php';

?> <!-- php para las sucesiones-->

<div class="container" style="margin-top: 80px;">

	<div id="panel" class="panel panel-default">
  		<div class="panel-heading">
        Presupuesto de Juicios
      </div>   		
  		
  		<div id="panel-cuerpo" class="panel-body">
    		<form name="form-sus" class="form-horizontal" method="post">

<!-- =================================================================================================================================-->
								<!-- Juicio input-->

                <div class="form-group">
                    <div class="col-sm-4 col-md-4 control-label" for="bg1">
                      <h4>Bienes Gananciales</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">
              
                      <input type='text' class='form-control' id='bg1' name='bg1' placeholder='En la Provincia de La Pampa' value=''>
                      
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="bg2" name="bg2" placeholder="Extra&ntilde;a Jurisdicci&oacute;n" value="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 col-md-4 control-label" for="bp1">
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
                  <button style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-info  btn-lg" name="calcular1" onclick= "doSend()">Calcular de Sucesiones</button>
                  <!--<a href="montosJuicios.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Volver a Calculo de Juicios</button></a>-->
								</div>
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

var numero= control();

if(errorbp != "" && errorbg != "")
{
  control();
  //document.all.item("form-sus").action="tabla1.php";
  //document.all.item("form-sus").action="sucesiones.php";
}

}

function control()
{
  var bg1 = document.getElementById("bg1").value;
  var bg2 = document.getElementById("bg2").value;
  var bp1 = document.getElementById("bp1").value;
  var bp2 = document.getElementById("bp2").value;
  

  var v1=parseInt(bg1);
  var v2=parseInt(bg2);
  var v3=parseInt(bp1);
  var v4=parseInt(bp2);

  if(!isNaN(v1))
  {
    document.all.item("form-sus").action="tabla1.php";
  }else
  {
    if(!isNaN(v2))
    {
      document.all.item("form-sus").action="tabla1.php";
    }else
    {
      if(!isNaN(v3))
    {
      document.all.item("form-sus").action="tabla1.php";
    }else
    {
      if(!isNaN(v4))
    {
      document.all.item("form-sus").action="tabla1.php";
    }else
      document.all.item("form-sus").action="sucesiones.php";
    }
    }
  }
}

var juicios = [
<?php

$consulta="select * from ValoresCajaRentas where materia LIKE '%SUCES%' order by materia asc"; /*busca todo menos los que tenga suces*/
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