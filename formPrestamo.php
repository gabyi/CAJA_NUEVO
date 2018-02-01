<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php

include 'head.php';
?>
<title>Formulario para préstamos</title>
  <body>
<?php
include 'navbar.php';
 ?>

<div class="container" style='' id="containerCuerpo">
	<div class="row">
		<div id="panel" class="login-panel panel panel-default">
			<div class="panel-heading">Formulario de Préstamo</div>
				
			<div id="panel-cuerpo" class="panel-body">
				<form class="form-horizontal" action="php/pdf/pdfPres.php" method="post">
					<div class="row">
						<div class="form-group">
							<label class="col-md-2 control-label" for="name">Monto Préstamo</label>
								<div class="col-md-3">
									<select class="form-control" autofocus name="monto">
  										<option value="50000">50.000,00</option>
  										<option value="100000">100.000,00</option>
  										<option value="150000">150.000,00</option>
									</select>
								</div>
								<label class="col-md-2 control-label" for="name">Cuotas</label>
								<div class="col-md-2">
									<select class="form-control" name="cuotas">
  										<option value="24">24</option>
  										<option value="36">36</option>
									</select>
								</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label" for="debito">Débito automático</label>
								<div class="col-md-1">
									<div class="checkbox" >
    									<input type="checkbox" name="debito" value="debito" aria-label="">
									</div>
								</div>
							<label class="col-md-2 control-label" for="name">Forma de pago</label>
								<div class="col-md-2">
									<select class="form-control" name="pago">
  										<option value="transferencia">Transferencia</option>
  										<option value="cheque">Cheque</option>	
									</select>
								</div>
						</div>

					</div>
					<br>
					<div class="row">
						<label class="" for="name">Titular del Préstamo</label>
					</div>
					<br>
						<div class="form-group">
							<label class="col-md-2 control-label" for="name">Nombre y Apellido</label>
								<div class="col-md-7">
									<input id="nomTit" name="nomTit" title="Por favor ingrese un nombre" type="text" placeholder="Nombre y Apellido" class="form-control" >
								</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="name">Tipo DNI</label>
								<div class="col-md-2">
									<select class="form-control" name="tipoTit">
  										<option value="D.N.I.">D.N.I.</option>
  										<option value="L.C.">L.C.</option>
  										<option value="L.E.">L.E.</option>
  										<option value="C.I.">C.I.</option>	
									</select>
								</div>
								<label class="col-md-1 control-label" for="dniTit">Número</label>
								<div class="col-md-3">
									<input id="dniTit" name="dniTit" title="" type="text" placeholder="Nº DNI" class="form-control" >
								</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="name">Domicilio</label>
								<div class="col-md-4">
									<input id="name" name="domPart" title="" type="text" placeholder="domicilio" class="form-control" >
								</div>
								<label class="col-md-1 control-label" for="name">Teléfono</label>
								<div class="col-md-2">
									<input id="name" name="telPart" title="" type="text" placeholder="telefono" class="form-control" >
								</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="name">Estudio</label>
								<div class="col-md-4">
									<input id="name" name="domEst" title="" type="text" placeholder="estudio" class="form-control" >
								</div>
								<label class="col-md-1 control-label" for="name">Teléfono</label>
								<div class="col-md-2">
									<input id="name" name="telEst" title="" type="text" placeholder="telefono" class="form-control" >
								</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Inscripcion al Colegio de abogados</label>
								<div class="col-md-2">
									<input id="name" name="colegio" title="" type="text" placeholder="" class="form-control" >
								</div>
								<label class="col-md-1 control-label" for="name">Tomo</label>
								<div class="col-md-1">
									<input id="name" name="tomo" title="" type="text" placeholder="" class="form-control" >
								</div>
								<label class="col-md-1 control-label" for="name">Folio</label>
								<div class="col-md-1">
									<input id="name" name="folio" title="" type="text" placeholder="" class="form-control" >
								</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="name">E. civil</label>
								<div class="col-md-2">
									<select class="form-control" name="civil">
  										<option value="soltera/o">Soltera/o</option>
  										<option value="casada/o">Casada/o</option>
  										<option value="divorciada/o">Divorciada/o</option>	
  										<option value="viuda/o">Viuda/o</option>
									</select>
								</div>
								<label class="col-md-1 control-label" for="name">Cónyuge</label>
								<div class="col-md-4">
									<input id="dniTit" name="conyugeTit" title="" type="text" placeholder="" class="form-control" >
								</div>
						</div>
							
						<br>
						<div class="row">
						<label class="" for="name">Avalista del Préstamo</label>
						</div>
						<br>

						<div class="form-group">
							<label class="col-md-2 control-label" for="name">Nombre y Apellido</label>
								<div class="col-md-7">
									<input id="nomTit" name="nomAval" title="" type="text" placeholder="Nombre y Apellido" class="form-control" >
								</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="name">Tipo DNI</label>
								<div class="col-md-2">
									<select class="form-control" name="tipoAval">
  										<option value="D.N.I.">D.N.I.</option>
  										<option value="L.C.">L.C.</option>
  										<option value="L.E.">L.E.</option>
  										<option value="C.I.">C.I.</option>	
									</select>
								</div>
								<label class="col-md-1 control-label" for="name">Número</label>
								<div class="col-md-3">
									<input id="dniTit" name="dniAval" title="" type="text" placeholder="Nº DNI" class="form-control">
								</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="name">Actividad</label>
								<div class="col-md-4">
									<input id="name" name="actividad" title="" type="text" placeholder="" class="form-control" >
								</div>

						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="name">Dirección</label>
								<div class="col-md-4">
									<input id="name" name="domAval" title="" type="text" placeholder="" class="form-control" >
								</div>
								<label class="col-md-1 control-label" for="name">Teléfono</label>
								<div class="col-md-2">
									<input id="name" name="telAval" title="" type="text" placeholder="" class="form-control" >
								</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="name">E. civil</label>
								<div class="col-md-2">
									<select class="form-control" name="civilAval">
  										<option value="soltera/o">Soltera/o</option>
  										<option value="casada/o">Casada/o</option>
  										<option value="divorciada/o">Divorciada/o</option>	
									</select>
								</div>
								<label class="col-md-1 control-label" for="name">Cónyuge</label>
								<div class="col-md-4">
									<input id="dniTit" name="conyugeAval" title="" type="text" placeholder="" class="form-control" >
								</div>
						</div>
						
						<br>
						<div class="form-group">
                  			<div class="col-sm-12 col-md-12" style="text-align:center;">
                  			<button style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-info  btn-lg" name="calcular1" onclick= "">Armar Solicitud</button>
                  <!--<a href="montosJuicios.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Volver a Calculo de Juicios</button></a>-->
						</div>
                </div>
				</form>
			</div>
		</div>
	</div>
</div>


  <?php
include 'footer.php';
include 'footer1.php';

$user = "usuario";
//session_register ("user");
$_SESSION['user'] = $user;
/* para ver usuario
print ("<P>Valor de la variable de sesión:$user</P>\n");
 */

?>

  </body>
  </html>

