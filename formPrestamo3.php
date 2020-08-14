<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="imagenes/logo.ico"/>


        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        
     
           <!-- fuentes -->
<link href="css/fuentes.css" rel="stylesheet">

<!--mi estilo -->
<link href="https://www.cforense.org/css/miestilo.css" rel="stylesheet">

<title>Formulario de Solicitud de Certificado de Admisibilidad</title>
  <body>

<div class="container">
	<div class="row">
		
		<div id="panel" class="login-panel panel panel-default">
		<div class="panel-heading">Formulario de Solicitud de Certificado de Admisibilidad</div>
				
			<div id="panel-cuerpo" class="panel-body">
				<div class="col-lg-12">
				<!--<form class="form-horizontal" action="php/pdf/pdfAdmisibilidad.php" method="post">-->
				<?php 
				if(isset($_POST['enviar'])) 
					{
						date_default_timezone_set('America/Argentina/Buenos_Aires');
						//Dia-Mes-Año Hora:Minutos:Segundos
						$fecha = date('Y-m-d H:i:s');
						//titular
						$nomTit=mb_strtoupper($_REQUEST['nomTit'],'utf-8');
						$importe=$_REQUEST['monto'];
						$tipoDniTit=$_REQUEST['tipoTit']; //L.E./L.C./D.N.I./C.I.
						$numDniTit=$_REQUEST['dniTit'];
						$domTit=mb_strtoupper($_REQUEST['domPart'],'utf-8');
						$telTit=$_REQUEST['telPart'];
						$mailProfesional=$_REQUEST['mailAfiliado'];
						$declaro=$_REQUEST['declaro'];
						$linea=$_REQUEST['linea'];
						//avalista
						$nomAval=mb_strtoupper($_REQUEST['nomAval'],'utf-8');
						$tipoDniAval=$_REQUEST['tipoAval'];
						$numDniAval=$_REQUEST['dniAval'];
						$actividad=$_REQUEST['actividad'];
						$domAval=mb_strtoupper($_REQUEST['domAval'],'utf-8');
						$telAval=$_REQUEST['telAval'];
						$mailGarante=$_REQUEST['mailGarante'];

						//PARA MAIL
						
						$para = $mailProfesional;


						// asunto
						$asunto = "Mensaje automatico del Formulario de Solicitud de Certificado de Admisibilidad";

						// compose message
						$mensaje = "
						<html>
						  <head>
						    <title>Formulario de Solicitud de Certificado de Admisibilidad</title>
						  </head>
						  <body>
						    <h1>Titulo en el cuerpo del mensaje</h1>
						    <p><a href=\"http://cforense.org/archivos/resolucionPrestamoBLP.pdf\">RESOLUCIÓN 1310 Y LA DOCUMENTACION A FIRMAR</a> Y LOS REQUISITOS A CUMPLIR ANTE <a href=\"http://cforense.org/archivos/prestamoParaProfesionales.pdf\"> EL BANCO DE LA PAMPA Y CAJA FORENSE</a>.</p>
						  </body>
						</html>
						";

						// To send HTML mail, the Content-type header must be set
						$encabezado = "MIME-Version: 1.0\r\n";
						$encabezado .= "Content-type: text/html; charset=utf-8\r\n";
						$encabezado .= "FROM: noreply@cforense.org";

					include 'conexion.php';
					$consulta= 'INSERT INTO prestamo (tipoDniProfesional,dniProfesional,nombreProfesional,direccionProfesional,telefonoProfesional,mailProfesional,nombreGarante,
						tipoDniGarante,dniGarante,direccionGarante,telefonoGarante,mailGarante,fechaSolicitud,linea,monto) VALUES ("'.$tipoDniTit.'","'.$numDniTit.'","'.$nomTit.'","'.$domTit.'","'.$telTit.'","'.$mailProfesional.'","'.$nomAval.'"
						,"'.$tipoDniAval.'","'.$numDniAval.'","'.$domAval.'","'.$telAval.'","'.$mailGarante.'","'.$fecha.'","'.$linea.'","'.$importe.'")';
				
						
					if(/*mysql_query($consulta,$conexion)&&*/mail($para, $asunto, $mensaje, $encabezado))
					{
						echo'<div class="alert alert-success" role="alert">En cuanto se procese su solicitud, nos contactaremos con Ud. vía correo electrónico.</div>';

					}else
					{
						echo'<div class="alert alert-danger" role="alert">SU SOLICITUD NO PUDO SER ENVIADA O EL MAIL A SU CASILLA NO FUE ENVIADO</div>';
					}
					//mysql_close($conexion);

					}else
					{
					?>
					<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<!--<form class="form-horizontal" action="" method="post">-->
					<div class="row">
						<div class="form-group">
								<div class="col-lg-2 col-lg-offset-2">
									<label>Linea</label>								
									<select class="form-control" name="linea" autofocus>
											<option value="1">1</option>
											<option value="2">2</option>
									</select>
								</div>
								<div class="col-lg-6">
									<label>Monto Préstamo</label>								
									<select class="form-control"  name="monto">
  										<option value="100000">100.000,00</option>
  										<option value="200000">200.000,00</option>
  										<option value="300000">300.000,00</option>
  										<option value="400000">400.000,00</option>
  										<option value="500000">500.000,00</option>
									</select>
								</div>
						</div>
					</div>					

					<br>

					<div class="row">
						<h3>Datos del Afiliado</h3>
					</div>
					<br>
						<div class="form-group">							
							<div class="row">
								<div class="col-md-12">
									<label>Nombre y Apellido</label>
							
									<input name="nomTit" type="text" placeholder="Nombre y Apellido" class="form-control" >
								</div>
							</div>							
						</div>

						<div class="form-group">						
							<div class="row">
								<div class="col-lg-6">
									<div class="row">
										<div class="col-lg-3">
											<label>Tipo DNI</label>								
											<select class="form-control" name="tipoTit">
		  										<option value="D.N.I.">D.N.I.</option>
		  										<option value="L.C.">L.C.</option>
		  										<option value="L.E.">L.E.</option>
		  										<option value="C.I.">C.I.</option>	
											</select>									
										</div>
										<div class="col-lg-9">
											<label>Número</label>
											<input name="dniTit" type="text" placeholder="Nº DNI" class="form-control" >
										</div>
									</div>									
								</div>
								<div class="col-lg-6">
									<div class="row">
										<div class="col-lg-8">
											<label>Domicilio</label>								
											<input name="domPart" title="" type="text" placeholder="domicilio" class="form-control" >		
										</div>
										<div class="col-lg-4">									
											<label>Teléfono</label>								
											<input name="telPart" title="" type="text" placeholder="telefono" class="form-control" >
										</div>
									</div>
								</div>
							</div>
						</div>					
							
						
						<div class="form-group">
							<div class="row">
								<div class="col-lg-6">
									<label>Mail</label>
									<input type="text" class="form-control" name="mailAfiliado" placeholder="mail" >
								</div>
								<div class="col-lg-6">
                                    <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name='declaro' >
                                    <label class="form-check-label">DECLARO CONOCER EL CONTENIDO DE LA <a href="http://cforense.org/archivos/resolucion1310PrestamoBLP.pdf">RESOLUCIÓN N° 1310</a> Y LOS REQUISITOS A CUMPLIR ANTE  <a href="http://cforense.org/archivos/prestamoParaProfesionales.pdf">LA CAJA FORENSE Y EL BANCO DE LA PAMPA</a>.</label>
                                    </div>
								</div>
							</div>
						</div>
							
						<br>
						<div class="row">
							<h3>Datos del Garante</h3>
							<h6>(no podrá ser el cónyuge y/o conviviente, ni afiliado a la Caja Forense)</h6>
						</div>
						<br>

						<div class="form-group">
							<div class="row">
								<div class="col-lg-12">
									<label >Nombre y Apellido</label>								
									<input name="nomAval" title="" type="text" placeholder="Nombre y Apellido" class="form-control" >	
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-lg-6">
									<div class="row">
										<div class="col-lg-3">
											<label>Tipo DNI</label>							
											<select class="form-control" name="tipoAval">
		  										<option value="D.N.I.">D.N.I.</option>
		  										<option value="L.C.">L.C.</option>
		  										<option value="L.E.">L.E.</option>
		  										<option value="C.I.">C.I.</option>	
											</select>								
										</div>
										<div class="col-lg-9">
											<label>Número</label>								
											<input name="dniAval" type="text" placeholder="Nº DNI" class="form-control" >				
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="row">
										<div class="col-lg-8">
											<label>Dirección</label>							
											<input name="domAval" title="" type="text" placeholder="" class="form-control" >
										</div>
										<div class="col-lg-4">
											<label>Teléfono</label>							
											<input name="telAval" title="" type="text" placeholder="" class="form-control" >
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-lg-6">
									<label>Mail</label>
									<input type="text" class="form-control" placeholder="mail" name="mailGarante" >
								</div>
							</div>
						</div>

						
						<br>
						<div class="form-group">
                  			<div class="col-sm-12 col-md-12" style="text-align:center;">
                  			<button style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-info  btn-lg" name="enviar" onclick= "">Enviar Solicitud</button>
						</div>
                </div>
				</form>
				<?php 
					}
				 ?>
			</div>
		</div>
		</div>
	</div>
</div>
</body>
</html>


