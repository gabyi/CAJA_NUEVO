<!DOCTYPE html>
<html lang="en">

<?php

include 'head.php';
?>
<title>Formulario de Solicitud de Certificado de Admisibilidad</title>
  <body>

<div class="container">
	<div class="row">
		
		<div id="panel" class="login-panel panel panel-default">
		<div class="panel-heading">Formulario de Solicitud de Certificado de Admisibilidad</div>
				
			<div id="panel-cuerpo" class="panel-body">
				<div class="col-lg-12">
				<form class="form-horizontal" action="php/pdf/pdfAdmisibilidad.php" method="post">
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
                                    <input type="checkbox" class="form-check-input" name='declaro' required>
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
                  			<button style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-info  btn-lg" name="calcular1" onclick= "">Armar Solicitud</button>
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


