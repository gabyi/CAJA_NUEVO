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
      <!--mi estilo -->
    <link href="css/mestilocalculo.css" rel="stylesheet">
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

	<div id="" class="panel panel-default">
  		<div class="panel-heading">
        C&aacute;lculo de intereses
      </div>   		
  		
  		<div id="" class="panel-body">
    		<form name="form-sus" class="form-horizontal" method="post">

     <!-- =================================================================================================================================-->
								<!-- Juicio input-->

                <div class="form-group">
                    <div class="col-md-3 col-sm-3 control-label" for="carat">
                      <h4>Car&aacute;tula</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">
            
                       <input type='text' class='form-control' id='carat' name='carat' placeholder='' value='' required>
                      
                    </div>

                    <div class="col-md-2 col-sm-2 control-label" for="fechcalc">
                      <h4>Fecha C&aacute;lculo</h4>
                    </div>

                    <div class="col-sm-3 col-md-3">

                      <input type="date" class="form-control" id="fachacalc" name="fechacalc" placeholder="" value="" required>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3 col-md-3 control-label" for="concep">
                      <h4>Concepto</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="concep" name="concep" placeholder="" value="" required>
                    </div>


                    <div class="col-md-2 col-sm-2 control-label" for="fechcalc">
                      <h4>Fecha Origen</h4>
                    </div>

                    <div class="col-sm-3 col-md-3">

                      <input type="date" class="form-control" id="fechaorig" name="fechaorig" placeholder="" value="" required>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3 col-md-3 control-label" for="importe">
                      <h4>Importe</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="importe" name="importe" placeholder="" value="" required>
                    </div>


                    <div class="col-md-2 col-sm-2 control-label" for="fechcalc">
                      <h4>M&eacute;todo de C&aacute;lculo</h4>
                    </div>

                    <div class="col-sm-3 col-md-3">                      

                        <select name="programa" class="form-control" id="tasalist" name="fechacalc" placeholder="" value="">    
                            <option value="mix" selected="selected">Tasa Mix</option>
                            <option value="bna">Activa BNA</option>
                            <option value="blp">Activa BLP</option>
                        </select>

                    </div>
                </div>

							  <div class="form-group">
                  <div class="col-sm-12 col-md-12" style="text-align:center;">
                  <button style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-info  btn-lg" name="calcular1" onclick= "doSend()">Calcular de Intereses</button>
                  <!--<a href="montosJuicios.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Volver a Calculo de Juicios</button></a>-->
								  </div>
                </div>

						</form>
  		</div>
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

  var carat = document.getElementById("carat").value;
  var fachacalc = document.getElementById("fachacalc").value;
  var concep = document.getElementById("concep").value;
  var fechaorig = document.getElementById("fechaorig").value;
  var importe = document.getElementById("importe").value;
  var fechacalc = document.getElementById("fechacalc").value;

if(carat == "" && fachacalc == "")
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
  var carat = document.getElementById("carat").value;
  var fachacalc = document.getElementById("fachacalc").value;
  var bp1 = document.getElementById("bp1").value;
  var bp2 = document.getElementById("bp2").value;
  

  var v1=parseInt(carat);
  var v2=parseInt(fachacalc);
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
      document.all.item("form-sus").action="calculoint.php";
    }
    }
  }
}

</script>