<!DOCTYPE html:5>
<html lang="es">

<?php

  include 'head.php';
  include 'conexion.php';

  echo '<body>';


?>

<div class="container" id="containerCuerpo">

  <div id="panel" class="panel panel-default">
      <div class="panel-heading">
        Costos de Juicios
      </div>
      <div id="panel-cuerpo" class="panel-body" id="montos">
        <form class="form-horizontal" action="tabla3.php" method="post">

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
                  <div class="col-md-3 col-sm-3" id="append">

                    <input type="text" id="monto" name="monto" title="Ingrese Monto"  placeholder="Monto" class="form-control" required>

                  </div>
                </div>

                <div class="row" > 
                  <div class="col-md-3 col-sm-3">
                    <label><input type='checkbox' name='oficio' value='oficio_ley'> Oficio Ley 22.172 </label>
                  </div>
                  <div class="col-md-4 col-sm-4">
                   <label><input type='checkbox' name='beneficio' value='beneficio'> Beneficio de litigar sin gastos </label>
                  </div>
                  <div class="col-md-4 col-sm-4">
                   <label><input type='checkbox' id="indeterminado" name='indeterminado' value='indeterminado' onclick="cambiar();"> Juicio por monto indeterminado </label>
                  </div>
                </div><br>

                <div class="form-horizontal">
                  <button style="background: url(imagenes/logos/fondo_azul.png);" class="btn btn-info  btn-lg" name="calcular">Calcular Juicio</button>
                  <!--<a href="sucesiones.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Calcular de Sucesiones</button></a>-->
                </div>

                <div id='total-IniFin' class= 'well well-sm'>Monto de juicio CERO (0) equivale a juicio sin contenido economico. <br>
                  La información que se suministra no tiene validez legal. Los datos son meramente informativos, por lo que no constituyen ni reemplazan
                                             las liquidaciones formales que efectúan la Caja Forense de La Pampa y la Dirección General de Rentas.
                                             Para la programación de este aplicativo se han tomado como referencia las disposiciones de la Ley 1861 y de la Ley Impositiva.</div>

            </form>
      </div>
  </div>
</div>


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


/////////////////////////////////////////////////solo numeros presskey para flotantes///////////////////////////////////////////////////////
 $("#monto").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
     $(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////enteros//////////////////////////////////////////////////////////////
$(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
function cambiar()
{
  var monto='<input type="text" id="monto" name="monto" title="Ingrese Monto"  placeholder="Monto" class="form-control" required>';

  if( $('#indeterminado').prop('checked')) 
  {
    $("#monto").remove();
  }else
    {
      $("#append").append(monto);
        agregar();
    }
}

function agregar()
  {
     $("#monto").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
     $(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
  }

</script>
<?PHP
if (!isset($_POST['calcular'])) {
    $juicio = "juicio";
    //session_register ("juicio");
    $_SESSION['juicio'] = $juicio;
}

?>
