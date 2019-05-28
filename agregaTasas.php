<!DOCTYPE html>
<html lang="en">
  <?php
  	include'head2.php';
  	include "conexion.php";

$consulta  = "select * from tmix ORDER BY fecha DESC Limit 3";
$query     = mysql_query($consulta) or die("no se puedo hacer la consulta paso 1 de consultatasas.php");
$fila      = mysql_fetch_array($query);
$lastDate= split("-",$fila['fecha']);
$minDate=$lastDate[2]."/".$lastDate[1]."/".$lastDate[0];


ultimaActualizada();

	print '<body>';
		if(isset($_POST['enviar']))
		{

			//modifico el formato de la fecha para que sea igual a la base
			$fecha= $_POST['fecha'];
			$ultimoDia=split("/", $fecha);
			$activa= $_POST['activa'];
			$pasiva= $_POST['pasiva'];
			$mix= $_POST['mix'];
			$descubierto= $_POST['descub'];

			echo("fecha:".$fecha.", ");
			echo "activa".$activa.", ";
			echo "mix".$mix.", ";
			echo "pasiva".$pasiva;
			$diaUltimo= date("d-m-Y",(mktime(0,0,0,$ultimoDia[0]+1,1,$ultimoDia[1])-1));
			echo " ".$diaUltimo.", ". $masMes;

			$queryActiva="select * from tactiva order by fecha desc Limit 2";
			
			$queryPasiva="select * from tpasiva order by fecha desc Limit 2";
			
			$tpasiva= mysql_query($queryPasiva) or die ("No se pudo acceder a la base de datos de Tasa Pasiva");
			$tpactiva= mysql_query($queryActiva) or die ("No se pudeo acceder a la base de datos de Tasa Activa");

			actualizaTasa("tmix", $fecha);
			//actualizaTasa("tpasiva", $pasiva);
			//actualizaTasa("tpactiva", $activa);
		}



?>

	<div class="container" style='' id="containerCuerpo">
	<div class="row">
		<div class="col-md-3"> </div>
		<div class="col-md-6 col-sd-6 ">
			<div id="panel" class="login-panel panel panel-default">
				<div class="panel-heading"><span class="glyphicon glyphicon-envelope"> </span> Actualizazor de Tasas</div>
					<div id="panel-cuerpo" class="panel-body">

  						<form class="form-horizontal" action="agregaTasas.php" method="post">
							
								<div class="form-group">
									<label class="col-md-3 control-label" for="fecha">Ult. Actualiz. </label>
									<div class="col-md-9">
										<?php echo '<input name="fecha" type="text" class="form-control" value='.ultimaActualizada().' readonly>'?>
									
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="fecha">Fecha </label>
									<div class="col-md-9">
									<input id="fecha" name="fecha" type="text" class="form-control" required>
									</div>
								</div>

								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="activa">Tasa Activa</label>
									<div class="col-md-9">
									<input id="activa" name="activa" type="number" class="form-control" required>
									</div>
								</div>

								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="mix">Tasa Mix</label>
									<div class="col-md-9">
										<input id="mix" name="mix" type="number" class="form-control" required>
									</div>
								</div>

									<!-- Asunto input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="pasiva">Tasa Pasiva</label>
									<div class="col-md-9">
									<input id="pasiva" name="pasiva" type="number"class="form-control" required>
									</div>
								</div>

								<!-- Message body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="descub">Tasa Descubierto</label>
									<div class="col-md-9">
										<input type="number" class="form-control" id="descub" name="descub"></textarea>
									</div>
								</div>

                                     <div class="col-md-12 widget-left">
                                        <button id="boton-noticia" name="enviar" style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-primary btn-lg" 
                                        name='enviar'>Enviar</button>    
								    </div>
								</div>

						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>

<script language = "Javascript">

$(function($){
$.datepicker.regional['es'] = {
closeText: 'Cerrar',
dateFormat: "dd/mm/yy",
prevText: '',
currentText: 'Hoy',
monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
weekHeader: 'Sm',
firstDay: 1,
isRTL: false,
showMonthAfterYear: false,
yearSuffix: '',
orientation: 'bottom auto',
};
$.datepicker.setDefaults($.datepicker.regional['es']);
});

$("#fecha").datepicker();  



</script>
<?php 
function ultimaActualizada()
{
	$consulta  = "select * from tmix ORDER BY fecha desc";
	$query     = mysql_query($consulta) or die("no se puedo hacer la consulta paso 1 de consultatasas.php");
	for ($i=0; $i < 3; $i++) { 
		$fila  = mysql_fetch_array($query);
	}

	$ultimaFecha= date("d-m-Y", strtotime($fila['fecha']));

	return $ultimaFecha;
}

function actualizaTasa($tabla, $tasa)
{
	$queryMix="select * from ".$tabla." order  by fecha desc Limit 2";
	$tmix= mysql_query($queryMix) or die ("No se pudo acceder a la base de datos de Tasa Mix");
	//hago la consulta desde al fecha que puso, hago las modificaciones hasta el fin y agrego 1 que es la nueva
}


 ?>