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

<?php

  include 'head.php';
  include 'conexion.php';

  echo '<body>';

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