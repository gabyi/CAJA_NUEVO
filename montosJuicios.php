<?php
session_start();
?>
<?php

$juicio = "juicio";
//session_register ("juicio");
$_SESSION['juicio'] = $juicio;

if ($_SESSION['user'] == "") //lo puse asi para que si se accede desde 0 te manda al index si apretas enviar entra
{
    include 'redir.php';
} else /*<!-- aca termina el if si no paso por el index*/
{
    ?>

<!DOCTYPE html:5>
<html lang="es">

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

    <!--Estilo de fuentes-->
    <link href="css/fuentes.css" rel="stylesheet">

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

<?php

    include 'navbar.php';

    ?>

<div class="container" id="containerCuerpo">

  <div id="panel" class="panel panel-default">
      <div class="panel-heading">
        Costos de Juicios
      </div>
      <div id="panel-cuerpo" class="panel-body" id="montos">
        <form class="form-horizontal" action="tabla.php" method="post">

                <!-- Juicio input-->
                <div class="form-group">
                  <div class="col-sm-1 col-md-1"></div> <!--lo puse para alinear-->

                  <label class="col-md-3 col-sm-3 control-label" for="juicio">Tipo de Juicio</label>
                  <div class="col-md-4 col-sd-4">
                  <input id="juicio" name="juicio" title="Por favor ingrese tipo de juicio"
                  type="text" placeholder="Ingrese Juicio" class="form-control" list="juicios" value="" required autofocus/>

                  </div>
                </div>

                <!-- Monto input-->
                <div class="form-group" >
                  <div class="col-sm-1 col-md-1"></div> <!--lo puse para alinear-->
                  <label class="col-md-3 col-sm-3 control-label" for="monto">Monto del Juicio</label>
                  <div class="col-md-3 col-sm-3">

                    <input type="text" id="monto" name="monto" title="Ingrese Monto"  placeholder="Monto" class="form-control" required>

                  </div>
                </div>

                <div class="form-horizontal">
                  <button style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-info  btn-lg" name="calcular">Calcular Juicio</button>
                  <!--<a href="sucesiones.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Calcular de Sucesiones</button></a>-->
                </div>

            </form>
      </div>
  </div>
</div>

<?php
print("Valor de la variable de sesión: " . $_SESSION['user']);
    print("<br>Valor de la variable de sesión:" . $_SESSION['juicio']);
    include 'footer.php';
    include 'footer1.php';
} /*termina el else de que si no hay session disponible, o si no entro por el index */

?>
</body>
</html>

<script type="text/javascript">
var juicios = [
<?php
$consulta = "select * from ValoresCajaRentas where materia NOT LIKE '%SUCES%' order by materia asc"; /*busca todo menos los que tenga suces*/
$result   = mysql_query($consulta, $conexion);
$n        = mysql_num_rows($result);
$i        = 0;

for ($i; $i <= $n; $i++) {
    $fila = mysql_fetch_array($result);
    if ($fila["materia"] != "") {

        print('"' . $fila["materia"] . '",');
    }
}
?>

];
$( "#juicio" ).autocomplete({
  source: juicios
});
</script>
<?PHP
if (!isset($_POST['calcular'])) {
    $juicio = "juicio";
    //session_register ("juicio");
    $_SESSION['juicio'] = $juicio;
}
?>