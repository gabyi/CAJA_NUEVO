<?php
session_start();
?>
<?php



  if($_SESSION['user']=="")  //lo puse asi para que si se accede desde 0 te manda al index si apretas enviar entra
  {
    include'redir.php';
  }else //<!-- aca termina el if si no paso por el index
{
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" lang="es">
     <?php
      include 'head2.php';
      include 'conexion.php';
      ?>
  <title>Presupuesto de Sucesiones</title>
  </head>

  <body>


<!--===================== VIEJO NAV
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
        </div><!-- /.nav-collapse 

       </div><!-- /.container 
    </nav><!-- /.navbar 
============================================================================================-->
<?php
include 'navbarFooter.php';
include 'logo.php';

?> <!-- php para las sucesiones-->

<div class="container" id="containerCuerpo">

	<div id="panel" class="panel panel-default">
  		<div class="panel-heading">
        Presupuesto de Juicios
      </div>   		
  		
  		<div id="panel-cuerpo" class="panel-body">
    		<form name="form-sus" class="form-horizontal" method="post" action="" onsubmit="return validacion()">

<!-- =================================================================================================================================-->
								<!-- Juicio input-->

                <div class="form-group">
                    <div class="col-sm-4 col-md-4 control-label" for="bg1">
                      <h4>Bienes Gananciales</h4>
                    </div>

                    
                    <div class="col-sm-4 col-md-4">
                        <?php 
                            if(isset($_POST['calcular1']))
                              echo "<input type='text' class='form-control' id='bg1' name='bg1' placeholder='En la Provincia de La Pampa' value='".$_POST['bg1']."'>";
                            else
                              echo "<input type='text' class='form-control' id='bg1' name='bg1' placeholder='En la Provincia de La Pampa' value=''>";
                         ?>
                      
                      
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <?php 
                            if(isset($_POST['calcular1']))
                              echo "<input type='text' class='form-control' id='bg2' name='bg2' placeholder='En la Provincia de La Pampa' value='".$_POST['bg2']."'>";
                            else
                              echo "<input type='text' class='form-control' id='bg2' name='bg2' placeholder='Extra&ntilde;a Jurisdicci&oacute;n' value=''>";
                         ?>
                      
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 col-md-4 control-label" for="bp1">
                      <h4>Bienes Propios</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <?php 
                            if(isset($_POST['calcular1']))
                              echo "<input type='text' class='form-control' id='bp1' name='bp1' placeholder='En la Provincia de La Pampa' value='".$_POST['bp1']."'>";
                            else
                              echo "<input type='text' class='form-control' id='bp1' name='bp1' placeholder='En la Provincia de La Pampa' value=''>";
                         ?>
                      
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <?php 
                            if(isset($_POST['calcular1']))
                              echo "<input type='text' class='form-control' id='bp2' name='bp2' placeholder='En la Provincia de La Pampa' value='".$_POST['bp2']."'>";
                            else
                              echo "<input type='text' class='form-control' id='bp2' name='bp2' placeholder='Extra&ntilde;a Jurisdicci&oacute;n' value=''>";
                         ?>
                      
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 col-md-4">
                      <div class="checkbox">
                          
                          <?php 
                            if(isset($_POST['calcular1']) && isset($_POST['oficio']))
                              echo "<label><input type='checkbox' name='oficio' value='oficio_ley' checked> Oficio Ley 22.172 </label>";
                            else
                              echo "<label><input type='checkbox' name='oficio' value='oficio_ley'> Oficio Ley 22.172 </label>";
                          ?>

                      </div>
                    </div>

                    <div class="col-sm-4 col-md-4">
                      <div class="radio">
                          <?php 

                            if(isset($_POST['sel']) && $_POST['sel'] == "1" )
                              echo "<label><input type='radio' value='1' name='sel' option='opcion1' checked> Act&uacute;a con poder (Apoderado)</label>";
                            else
                              echo "<label><input type='radio' value='1' name='sel' option='opcion1'> Act&uacute;a con poder (Apoderado)</label>";
                          ?>
                        
                      </div>
                    </div>

                    <div class="col-sm-4 col-md-4">
                      <div class="radio">

                          <?php 

                            if(isset($_POST['sel']) && $_POST['sel'] == "2")
                              echo "<label><input type='radio' value='2' name='sel' option='opcion2' checked> Act&uacute;a por derecho propio (Letrado) </label>";
                            else
                              echo "<label><input type='radio' value='2' name='sel' option='opcion2'> Act&uacute;a por derecho propio (Letrado) </label>";
                          ?>
                        
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

<?php

  if(isset($_POST['calcular1']))
    {

      include 'calculosucesiones.php';
      include 'tabla1.php';
    
    } 
    

echo "</div>";

 

echo ("</div>");

include 'footer.php';
include 'footer1.php';
	}/*termina el else de que si no hay session disponible, o si no entro por el index */

?>
  </body>
  </html>

<script type="text/javascript">


function validacion() {

  var bg1 = document.getElementById("bg1").value;
  var bg2 = document.getElementById("bg2").value;
  var bp1 = document.getElementById("bp1").value;
  var bp2 = document.getElementById("bp2").value;

  var v1=parseInt(bg1);
  var v2=parseInt(bg2);
  var v3=parseInt(bp1);
  var v4=parseInt(bp2);

    
  if (!isNaN(v1)) {

   return true;
  }
  else if (!isNaN(v2)) {

    return true;
  }
  else if (!isNaN(v3)) {

    return true;
  }
  else if (!isNaN(v4)) {

    return true;
  }
 
  // Si el script ha llegado a este punto, todas las condiciones
  // se han cumplido, por lo que se devuelve el valor true
  alert ("Debe llenar las casillas con valores numérico");
  return false;
}



/*function doprint(){ 
 window.print()
 }*/

 function imprJui() {
  var juiwin = window.open("", "juiwin","toolbar=0,status=1,menubar=0,left=50,top=100,scrollbars=1,resizable=1,width=950,height=670");
  var doc = juiwin.document; 
  doc.open(); 
  doc.write("<head><Title>Caja Forense de Abogados de La Pampa</title>");
  doc.write("<style>body,table, panel-heading, td, th {font-family:Arial, Helvetica, sans-serif; font-size:10px;}</style>");
  doc.write("<link href='css/bootstrap.min.css' rel='stylesheet'>");
  doc.write("<link href='css/fuentes.css' rel='stylesheet'>");
  doc.write("</head>");
  doc.write("<body onload='window.print()' bgcolor='#ffffff'><img style='width:100%' src='imagenes/logos/Sin titulo.png'>");
  doc.write("<div align='center'><h4>Presupuesto para Iniciación de Juicios</h4>");
  doc.write("<table class='table-striped' border=\"0\" width=\"50%\"><tr><th colspan=\"3\">Acervo Hereditario</th></tr>");
  doc.write("<tr><th>&nbsp;</th><th>Provincia de La Pampa</th><th>Extraña Jurisdiccion</th></tr>");
  doc.write("<tr><th>Bienes Gananciales</th><td align=\"center\">" + Formato($("#bg1").val()) + "</td><td align=\"center\">" + Formato($("#bg2").val()) + "</td></tr>");
  doc.write("<tr><th>Bienes Propios</th><td align=\"center\">" + Formato($("#bp1").val()) + "</td><td align=\"center\">" + Formato($("#bp2").val()) + "</td></tr>");
  doc.write("</table>\n");
  doc.write("<div id='aca'></div>");
  doc.getElementById('aca').innerHTML=$("#panel11").html();
  doc.write('<script>window.print()');
  doc.close();

}

function Formato(imp){
  var impInt = new String();
  var impDec = new String();
  var i, j;
  txtImp = new String(imp);
  if (txtImp.indexOf(',') >= 0) {txtImp = txtImp.replace(',', '.'); }
  i = txtImp.indexOf('.');
  if (i == -1) { impInt = txtImp; impDec = '0000'; }
  else { impInt = txtImp.substring(0, i); impDec = txtImp.substring(i + 1) + '0000'; }
  impDec = impDec.substr(0, 2);
  txtImp = impInt + ',' + impDec;
  return txtImp;
}

</script>

<?php

  session_unregister ("juicio1");


  function calculaAportes ($a, $b)
      {
        $valor=$a * ($b/100);
        return $valor;
      }

?>