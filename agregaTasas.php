<?php
session_start();
?>
<?php


	if($_SESSION['user']=="" && !isset($enviar))  //lo puse asi para que si se accede desde 0 te manda al index si apretas enviar entra
	{
		include'redir.php';
	}else /*<!-- aca termina el if si no paso por el index*/
{
?>

<!DOCTYPE html>
<html lang="en">
  <?php
  	include'head.php';
  	include "conexion.php";

	print '<body>';

	include 'navbar.php';


		if(isset($_POST['enviar']))
		{
			//modifico el formato de la fecha para que sea igual a la base
			$fecha= $_POST['fecha'];
			$activa= $_POST['activa'];
			$pasiva= $_POST['pasiva'];
			$mix= $_POST['mix'];
			$descubierto= $_POST['descub'];

			echo("fecha:".$fecha.", ");
			echo "activa".$activa.", ";
			echo "mix".$mix.", ";
			echo "pasiva".$pasiva;

			$queryactiva=""
			$querymix="";
			$querypasiva="";
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
							<fieldset>
								<div class="form-group">
									<label class="col-md-3 control-label" for="fecha">Fecha Inicio</label>
									<div class="col-md-9">
									<input id="fecha" name="fecha" type="date" class="form-control" required autofocus>
									</div>
								</div>

								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="activa">Tasa Activa</label>
									<div class="col-md-9">
									<input id="activa" name="activa" type="number" class="form-control" required autofocus>
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
                                        <button id="boton-noticia" style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-primary btn-lg" 
                                        name='enviar'>Enviar</button>    
								    </div>
								</div>

 							</fieldset>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

	<?php

		include 'footer.php';
		include 'footer1.php';
	
}

?>
</body>
</html>