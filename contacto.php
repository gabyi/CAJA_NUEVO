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
  ?>
  <body>
 		<!-- barra de titulo -->

		<!-- barra de titulo -->

<nav class="navbar navbar-fixed-top navbar-default scrollclass" role="navigation">
      <div class="container">

            <div id="navLogo" class="navbar-header">
              <a id="" class="navbar-brand" href="index.php"><img src="imagenes/logos/Logo12016" style="width:150px; height:110px;" alt="Logo de Caja Forense"></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navPills">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>                    
            </div>
         
            <div class="navbar-collapse collapse" id="navPills">
              <ul id="navUl" class="nav navbar-nav">
                <li><a href="index.php">Inicio</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Institucional<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="institucional.php#creacion">Creación y Objetivos</a></li>
                      <li><a href="institucional.php#autoridades">Autoridades</a></li>
                      <li><a href="institucional.php#normativa">Marco normativo y financiamiento</a></li>   
                    </ul>
                </li>
                  <li><a href="noticias.php">Noticias</a></li>
                  <li><a href="institucional.php#comision">Comisi&oacute;n de J&oacute;venes</a></li>
                  <li class="active"><a href="contacto.php">Contacto</a></li>            
              </ul>
            </div><!-- /.nav-collapse -->

      </div><!-- /.container -->
   </nav><!-- /.navbar -->
<?php
if($_SESSION['captcha']==$_REQUEST['codigo'])
	{
		$codigo="bien";

		if(isset($enviar))
		{
			$nombre =$_REQUEST['name'];
			$email  = "From:".$_REQUEST['email']; //siempre hay que poner from, sino sale como el cuerpo del mensaje
			$asunto =$_REQUEST['asunto'];
			$mensaje = $_REQUEST['message'];
			$webmail="gabrielisabella@cforense.org ";

			if(mail($webmail, $asunto, $nombre." dice: \r\n".$mensaje, $email )) //\r\n hace solo el salto de linea
  				$aviso="Su Mensaje fue enviado. Nos pondremos en contacto con usted si fuese necesario. Muchas Gracias.-";
  			else
  				$aviso="Su Mensaje no fue enviado";
		}


	}

?>

	<div class="container" style='' id="cuerpoContacto">
	<div class="row">
		<div class="col-md-3"> </div>
		<div class="col-md-6 col-sd-6 ">
			<div id="panel" class="login-panel panel panel-default">
				<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Contacto</div>
					<div id="panel-cuerpo" class="panel-body">

					<?php
					if(isset($enviar))
					{
						if(isset($enviar) && $codigo!="bien")
						{

							print "<div class='alert bg-danger' role='alert' style='margin-top: 80px; margin-bottom: 80px;'>";
						    print "<a href='contacto.php'><span class='glyphicon glyphicon-exclamation-sign'></span> El codigo ingresado es incorrecto</a>
									</div>";
					?>

			    </div>
		    </div>
	    </div>
    </div>
</div>


<?php

	include 'footer.php';
?>
</body>
</html>

					<?php
						}else
						{
							if(isset($enviar)&&$codigo=="bien")
							{
								if($aviso=="Su Mensaje no fue enviado")
								{
									print "<div class='alert bg-danger' role='alert' style='margin-top: 80px; margin-bottom: 80px;'>";
						            print "<a href='contacto.php'><span class='glyphicon glyphicon-exclamation-sign'></span> ".$aviso." disculpe las molestias</a>
									</div>";
								?>

						</div>
					</div>
				</div>
			</div>
		</div>




<?php

	include 'footer.php';
	include 'footer1.php';
?>
</body>
</html>
					<?php
								}else
								{
							print "<div class='alert bg-success' role='alert' style='margin-top: 80px; margin-bottom: 80px;'>";
					        print "<a href='index.php'><span class='glyphicon glyphicon-check'></span> ".$aviso."</a>
									</div>";
									?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php

	include 'footer.php';
?>
</body>
</html>
					<?php
								}

							}
					}
				}else{

					 ?>


  						<form class="form-horizontal" action="contacto.php" method="post">
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nombre</label>
									<div class="col-md-9">
									<input id="name" name="name" title="Por favor ingrese un nombre" type="text" placeholder="Nombre y Apellido" class="form-control" required autofocus>
									</div>
								</div>

								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Email</label>
									<div class="col-md-9">
										<input id="email" name="email" title="Por favor ingrese un e-mail" type="email" placeholder="Su e-mail.." class="form-control" required>
									</div>
								</div>

									<!-- Asunto input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Asunto</label>
									<div class="col-md-9">
									<input id="name" name="asunto" title="Por favor ingrese un Asunto" type="text" placeholder="Asunto" class="form-control" required>
									</div>
								</div>

								<!-- Message body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="message">Mensaje</label>
									<div class="col-md-9">
										<textarea class="form-control" id="message" title="Por favor el mensaje" name="message" placeholder="Escriba aquí su mensaje.." rows="5" required Style="resize:none;"></textarea>
									</div>
								</div>


								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12">
                                    	<div class="col-md-6">
										 <img src="captcha.php" class=""></img>
										</div>
                                        <div class="col-md-6">
                                       <input id="name" name="codigo" title="Por favor ingrese codigo" type="text" placeholder="Captcha" class="form-control" required>
                                        </div>
                                       </div>
                                    </div>

                                     <div class="col-md-12 widget-left">
                                        <button id="boton-noticia" style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-primary btn-lg" 
                                        name='enviar'>Enviar</button>    
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
}

?>
</body>
</html>