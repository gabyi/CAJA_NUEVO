<?php
session_start();
?>
<?php



	if($_SESSION['user']=="" && !isset($enviar))  //lo puse asi para que si se accede desde 0 te manda al index si apretas enviar entra
	{
		include'redir.php';
	}else /*<!-- aca termina el if si no paso por el index*/

{?>

<!DOCTYPE html>
<html lang="en">
	<title>Actualizador de Comunicaciones</title>
  <?php
  	include'head.php';

	print '<body>';

	include 'navbar.php';

?>

	<div class="container" style='' id="containerCuerpo">
	<div class="row">
		<div class="col-md-3"> </div>
		<div class="col-md-6 col-sd-6 ">
			<div id="panel" class="login-panel panel panel-default">
				<div class="panel-heading">Actualizador de Comunicaciones</div>
				<div id="panel-cuerpo" class="panel-body">
					<form class="form-horizontal" action="" method="">

							<fieldset><br><br>
								<!-- Comunicacion input-->
								<div class="form-group">

									<label class="col-md-3 control-label" for="name">Comunicación</label>
									<div class="col-md-3"><input id="comunica" name="comunica" title="" type="text" placeholder="" class="form-control" autofocus></div>
									<div class="col-md-3">
                                        <button id="boton-noticia" style="background: url(imagenes/logos/fondo_azul.png);" type="button" class="btn btn-primary btn-lg" name='buscar' onClick="javascript:buscarComunica();">Buscar</button>    
								    </div>
								</div>
								



								<div class="col-md-12" id="respuesta">
									<br><br><br><!--<div class="alert alert-danger" role="alert">La comunicación 2578 no existe</div>  o -->								
								</div>
	

								<!-- Email input
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Email</label>
									<div class="col-md-9">
										<input id="email" name="email" title="Por favor ingrese un e-mail" type="email" placeholder="Su e-mail.." class="form-control" required>
									</div>
								</div>

									<!-- Asunto input
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Asunto</label>
									<div class="col-md-9">
									<input id="name" name="asunto" title="Por favor ingrese un Asunto" type="text" placeholder="Asunto" class="form-control" required>
									</div>
								</div>

								<!-- Message body 
								<div class="form-group">
									<label class="col-md-3 control-label" for="message">Mensaje</label>
									<div class="col-md-9">
										<textarea class="form-control" id="message" title="Por favor el mensaje" name="message" placeholder="Escriba aquí su mensaje.." rows="5" required Style="resize:none;"></textarea>
									</div>
								</div>-->

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