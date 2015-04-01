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
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Institucional <span class="caret"></span></a>
              	<ul class="dropdown-menu" role="menu">
              		<li><a href="#">Creacion y objetivos</a></li>
              		<!--<li class="divider"><li> Este se pone para hacer una linea divisoria entre los li-->
              		<li><a href="#">Autoridades</a></li>
              		<li><a href="#">Marco normativo y financiamiento</a></li>
              		<li><a href="#">Coordinadora de cajas</a></li>
             	  </ul>
             </li>
             <li><a href="montosJuicios.php">Costos de juicios</a></li>
			       <li class="active"><a href="sucesiones.php">Costos de sucesiones</a></li>
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

<div class="container " style="height: 380px; padding-top: 80px;">
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
<div class="container" style="height: 380px; padding-top: 80px;">

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">Costos de Juicios</h3>
  		</div>
  		<div class="panel-body" id="montos">
    		<form class="form-horizontal" action="sucesiones.php" method="post">
          <table class="table" style="margin-left: auto;
  margin-right: auto;">
              <tr>
                <td>
                  
                    <h4>Acervo Hereditario</h4>
                
                </td>

                <td>
                           
                    <h4>Bienes en la Provincia de La Pampa</h4>
                  
                </td>

                <td>
                  
                    <h4>Bienes Estraña Jurisdicción</h4>
                  
                </td>
              </tr>

              <tr>
                    <td>
                      <h4>Bienes Gananciales</h4>

                    </td>
                    
                    <td>
                      <input type="text" class="form-control" id="" name=""> 

                    </td>
                     
                    <td>
                      <input type="text" class="form-control" id="" name="">
                    </td>

              </tr>
          </table>








<!-- =================================================================================================================================-->
								<!-- Juicio input-->
								<div class="form-group">                        
                    <div class="col-sm-4 col-md-4">
                      <h4>Acervo Hereditario</h4>
                    </div>                        
                      
                      
                    <div class="col-md-4 col-sm-4">         
                      <h4>Bienes en la Provincia de La Pampa</h4>
                    </div>
                      
                    <div class="col-sm-4 col-md-4">
                    <h4>Bienes Estraña Jurisdicción</h4>
                    </div>
                  
                </div>

                <div class="form-group">
                    <div class="col-sm-4 col-md-4">
                      <h4>Bienes Gananciales</h4>
                    </div>                     
                      
                      
                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="" name=""> 
                    </div>                   

                      
                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="" name="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 col-md-4">
                      <h4>Bienes Gananciales</h4>
                    </div>                     
                      
                      
                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="" name=""> 
                    </div>                   

                      
                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="" name="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 col-md-4">
                      <div class="checkbox">
                        <label><input type="checkbox"> Oficio Ley 22.172 </label>
                      </div>                      
                    </div> 

                    <div class="col-sm-4 col-md-4">
                      <div class="radio">
                        <label><input type="radio" name="poder" option="opcion1" checked> Actúa con poder (Apoderado) </label>
                      </div>                      
                    </div> 

                    <div class="col-sm-4 col-md-4">
                      <div class="radio">
                        <label><input type="radio" name="poder" option="opcion2"> Actúa por derecho propio (Letrado) </label>
                      </div>                      
                    </div>                  
                </div>

                  
							  <div class="form-group">
                  <div class="col-sm-12 col-md-12" style="text-align:center;">
                  <button type="submit" class="btn btn-info  btn-lg" name="calcular">Calcular de Sucesiones</button>
                  <a href="montosJuicios.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Volver a Calculo de Juicios</button></a>
								</div>
                </div>

						</form>
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