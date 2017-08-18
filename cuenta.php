<?php

include 'conexion.php';
$consultar = $_REQUEST['consultar']; 

  
?>  

<html lang="es">
<meta charset="utf-8">
<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

    
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

  <head>
     <?php
      include 'head2.php';
      //include 'conexion.php';
      ?>
      <!--mi estilo -->
    <link href="css/mestilocalculo.css" rel="stylesheet">


  


  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">

  <title>Consulta de Estado Previsional</title>
    <script src="funciones.js" language="JavaScript"></script>
  <link rel="StyleSheet" href="estilos.css" type="text/css">
  </head>

  <body>
   <?php 
    include 'navbarFooter.php';
    include 'logo.php';
    ?>
    <div class="container" id="containerCuerpo">
      <div id="forminteres" class="panel panel-default">
        <div class="panel-heading">

    <? 
    /////////////////////////////////////////////////////
    /// SI YA COMPLETO EL FORMULARIO TOMA LA CONSULTA ///
    /////////////////////////////////////////////////////
      

     
     /// toma las variables del formulario para hacer las consultas
     $codigoprof = $_POST['codigoprof'];
     $documento = $_POST['documento'];
     
      if (!empty($consultar)) { 

        // realiza la consulta
        $sql = "select * from profesio1 where codprof = '".$codigoprof."'"." and documento = '".$documento."'"; 
        $link = $conexion;
        
        $result = mysql_query($sql, $link);
        if (mysql_num_rows($result) == 0) {
          echo '<div class="alert alert-danger" role="alert">
          <strong>Error de Acceso!</strong> Usted a ingresado mal sus Datos Personales
        </div>';
      }else{
        ?>

        <table class="table">
          <tr>
            <td><h2>Datos Personales: </h2>
              <table width="100%" border="0">
                <tr>
                  <td><ul>
                     <li><strong>C&oacute;digo Profesional: </strong><? echo mysql_result($result, 0, "codprof")?> </li>
        			<li><strong>Apellido y Nombres:</strong><? echo  mysql_result($result, 0, "nombrepro") ?> </li>
                  </ul></td>
                  <td><ul>
                    <li><strong>Domicilio Profesional:</strong> <? echo mysql_result($result, 0, "domiciprof") ?></li>
                    <li><strong>Localidad: </strong><? echo mysql_result($result, 0, "locaprof") ?> </li>
                  </ul>
                  </td>
                  <td><ul>
                    <li><strong>Tel&eacute;fono Profesional:</strong><? echo "(".mysql_result($result, 0, "prefijo").")".mysql_result($result, 0, "teprof") ?></li>
                    <li><strong>E-mail: </strong><? echo mysql_result($result, 0, "correoelec") ?></li>
                  </ul>
                  </td>
                </tr>
              </table>      <p>&nbsp;</p></td>
          </tr>
        </table>
        <table class="table-striped" style="width:100%">
          <tr>
            <td><h2 align="center">Estado de Cuenta:</h2>
              <table class="table-bordered" width="100%" border="2">
                <tr>
                  <th scope="row">Excedentes A&ntilde;os Anteriores: </th>
                  <td><div align="right"><? echo number_format(mysql_result($result, 0, "Excedentes"),2) ?> </div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <th scope="row">Ingresos:</th>
                  <td><div align="right"><? 
                      $sql = "select sum(aportes) as ingresos from ingresos where codprof = '".mysql_result($result, 0, "codprof")."'";  
                      $link = $conexion;
                      $result_ing = mysql_query($sql, $link);                    
                      echo number_format(mysql_result($result_ing, 0, "ingresos"),2) ?> </div></td>                
                  <td><a id="enlace1" href="informes.php?cod=<? echo mysql_result($result, 0, "codprof")?>&informe=ingresos">Detalles</a></td>
                </tr>
                <tr>
                  <th scope="row">Egresos:</th>
                  <td><div align="right">- <? 
                      $sql = "select sum(debitoreti) as debitos from Egresos where codprof = '".mysql_result($result, 0, "codprof")."' and concepto <> 'S.V.C.'";  
                      $link = $conexion;
                      $result_egr = mysql_query($sql, $link);                    
                      echo number_format(mysql_result($result_egr, 0, "debitos"),2)?>
                    <td><div id="menu"><p><a id="enlace2" href="informes.php?cod=<? echo mysql_result($result, 0, "codprof")?>&informe=egresos">Detalles</a></p></div></td>
                </tr>
                <tr>
                  <th scope="row">Aporte M&iacute;nimo Anual - Categoria: </th>
                  <td><div align="right">- <? echo number_format(mysql_result($result, 0, "categoria"),2) ?></div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <th scope="row">Saldo Actual: </th>
                  <td><div align="right"><? echo number_format(mysql_result($result, 0, "excedentes") + mysql_result($result_ing, 0, "ingresos") -  mysql_result($result_egr, 0, "debitos") - mysql_result($result, 0, "categoria"),2) ?></div></td>
                  <td>&nbsp;</td>
                </tr>
              </table>      
              <!--<p><strong>De acuerdo con nuestros registros, a la fecha Ud. registra </strong><strong>deudas vencida a la fecha por la suma de $ <? echo number_format(mysql_result($result, 0, "deudas"),2) ?> <div id="menu"><p><a id="enlace3" href="informes.php?cod=<? echo mysql_result($result, 0, "codprof")?>&informe=deudas">Detalles</a></p></div></strong></p>-->
              </td>
   
            <p>&nbsp;</p></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <div id="detalles">Detalles a Mostrar.</div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        </div>
        </div>
        </div>
        </body>
        </html>
        <?php
      } 
    }
    else {
		?>
	   

      <form method=post action=cuenta.php>
        <div class="alert alert-info" role="alert">
          <strong>Consulta de Estado Previsional</strong> Bienvenido a la consulta de Estado Previsional de su cuenta, complete el formulario para ingresar.
        </div>
        <strong>C&oacute;digo Profesional: </strong>
        <input type="text" name="codigoprof" class="form-control" placeholder="Código Profesional"/>
        <strong>Nro. de Documento de Identidad: </strong>
        <input type="text" name="documento" class="form-control" placeholder="Docum. Identidad."/>
  	  	<input type="submit" name="consultar" value="Consultar" />

      </form>
  
      </div>
      </div>
      </div>
<?php	
}
include 'footer.php';
include 'footer1.php';


?>

