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
    <link href="offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    
     <!--Estos estan agregados para que minimece la barra movil-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!--<link type="text/css" rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">-->

	<style type="text/css">
      .footer {/* el estilo del div footer lo puse aca porque no le gusta imagen importada*/
          background: url(prueba1.gif);
          background-size: 70%;
          background-repeat: no-repeat;
          background-position: center;
          height:250px;

              }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
 		<!-- barra de titulo -->

		<!-- barra de titulo -->

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
			      <li><a href="#about">Costos de juicios</a></li>
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
			$webmail="gabrielisabella@hotmail.com";

			if(mail($webmail, $asunto, $nombre." dice: \r\n".$mensaje, $email )) //\r\n hace solo el salto de linea
  				$aviso="Su Mensaje fue enviado";
  			else
  				$aviso="Su Mensaje no fue enviado";
		}


	}

	include 'logo.php';


?>

	<div class="container ">
	<div class="col-md-3">
		<!--Este div es para centrar el formulario de contacto deltro del container well-->
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="login-panel panel panel-default">
				<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span>Contacto</div>
					<div class="panel-body">

					<?php
					if(isset($enviar))
					{
						if(isset($enviar) && $codigo!="bien")
						{

							print "<div class='alert bg-danger' role='alert'>";
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
									print "<div class='alert bg-danger' role='alert'>";
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
?>
</body>
</html>
					<?php
								}else
								{
							print "<div class='alert bg-success' role='alert'>";
					        print "<a href='contacto.php'><span class='glyphicon glyphicon-check'></span> ".$aviso."</a>
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
									<input id="name" name="name" title="Por favor ingrese un nombre" type="text" placeholder="Su nombre.." class="form-control" required autofocus>
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
										 <img src="captcha.php" class="img-thumbnail"></img>
										</div>
                                        <div class="col-md-6">
                                       <input id="name" name="codigo" title="Por favor ingrese codigo" type="text" placeholder="Captcha" class="form-control" required>
                                        </div>
                                       </div>
                                    </div>

                                     <div class="col-md-12 widget-left">
                                        <button type="submit" class="btn btn-primary btn-lg" name='enviar'>Enviar</button>
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
	}
}

?> 
</body> 
</html>