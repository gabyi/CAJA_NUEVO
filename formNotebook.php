<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php

include 'head.php';
?>
<title>Formulario para compra de notebook</title>
  <body>
<?php
include 'navbar.php';
 ?>

<div class="container" style='' id="containerCuerpo">
	<div class="row">
		<div id="panel" class="login-panel panel panel-default">
			<div class="panel-heading">Formulario de Compra de Notebook</div>
				
			<div id="panel-cuerpo" class="panel-body">
				<form class="form-horizontal"  method="post" action="" id="formNotebook">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="row">
								<div class="col-md-12 col-lg-12">
									<div class="form-group">
										<label class="col-md-3 col-lg-3 col-lg-offset-1 control-label" for="modelo">Modelo de Notebook</label>
										<div class="col-md-6">
											<select class="form-control" autofocus name="modelo" id="modelo" onChange="mirarPrecio()">
  												<option value="i3" selected="selected">MOD. CI3 - Intel Core I3 – 6200U Processor (3M Cache, 2.3 Ghz)</option>
  												<option value="i5">Mod. C15 - Intel Core I5 - 6200U Processor (3M Cache, 2.3 Ghz)</option>
  												<option value="i7">Mod. C17 - Intel Core I7 - 6200U Processor (4M Cache, 2.5 Ghz)</option>
  												<option value="carbon">Mod. Xi CARBON  CI7 - Intel Core I7 – 7600U</option>
  												<option value="t470">Mod. T470 S - C15 - Core I5 - 7200U</option>
											</select>
										</div>
									</div>
								</div>
							</div>

						
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="form-inline">							
								<label class="control-label" for="ctdo">Precio Contado (-15%) $</label>
									<input type="text" id="efectivo" name="efectivo" value="9119.65" class="form-control" readonly>
									<input type="radio" class="form-control" name="opcionPago" value="contado" aria-label="" checked>

								<label class="col-lg-offset-1 control-label" for="cuotas">12 cuotas de $</label>
									<input type="text" id="cuota" name="cuota" value="894.08" class="form-control" readonly>	
									<input type="radio" id ="opcionPago" name="opcionPago" value="en 12 cuotas de " class="form-control" aria-label="">
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
									<select class="form-control" name="tipoDni">
  										<option value="D.N.I.">D.N.I.</option>
  										<option value="L.C.">L.C.</option>
  										<option value="L.E.">L.E.</option>
  										<option value="C.I.">C.I.</option>	
									</select>
								</div>
								<label class="col-md-1 control-label" for="dniTit">Número</label>
								<div class="col-md-4 col-lg-4">
									<input id="dniTit" name="dniTit" title="" type="text" placeholder="Nº DNI" class="form-control" >
								</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="domicilio">Domicilio</label>
								<div class="col-md-4">
									<input id="domicilio" name="domPart" title="" type="text" placeholder="domicilio" class="form-control" >
								</div>
								<label class="col-md-1 control-label" for="name">Teléfono</label>
								<div class="col-md-2">
									<input id="telefono" name="telPart" title="" type="text" placeholder="telefono" class="form-control" >
								</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 col-lg-2 control-label" for="localidad">Localidad</label>
								<div class="col-md-7 col-lg-7">
									<input id="localidad" name="localidad" title="" type="text" placeholder="localidad" class="form-control" >
								</div>
						</div>

						<div class="form-group">
                  			<div class="col-sm-12 col-md-12" style="text-align:center;">
                  				<button style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-info  btn-lg" name="enviar" onclick="enviarForm()">Enviar Solicitud</button>
							</div>
						</div>
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

<script language = "Javascript">
	
	function mirarPrecio()
  {
    
  	if ($("#modelo").val()=="i3") 
  		{
  			$("#efectivo").val("9119.65");
  			$("#cuota").val("894.08");
  		} else
  			{ if ($("#modelo").val()=="i5") 
  				{
  					$("#efectivo").val("11474.15");
  					$("#cuota").val("1124.92");
  				} else
  					{ if ($("#modelo").val()=="i7")
  						{
  							$("#efectivo").val("12689.65");
  							$("#cuota").val("1244.08");
  						} else
  							{ if ($("#modelo").val()=="carbon")
  								{
  									$("#efectivo").val("45083.15");
  									$("#cuota").val("4419.92");
  								} else
  									{
  										$("#efectivo").val("28032.15");
  										$("#cuota").val("2748.25");
  									};

  							};

  					};

  			};






  if($("#tasalist").val()=="pactadasimple")
  {
    $("#compuestaSimple").remove();
    $("#formint").append(pactadasimple);
  }else
    {
      if($("#tasalist").val()=="compuestaSimple")
    {
      $("#pactadasimple").remove();
      $("#formint").append(compuestaSimple);
    }else
      {
        $("#compuestaSimple").remove();
        $("#pactadasimple").remove();
      } 
  }
  
}

function enviarForm()
	{
		/*if($("#nomTit").val()!="" && $("#dniTit").val()!="" && $("#domicilio").val()!="" && $("#telefono").val()!="" && $("#localidad").val()!="")
			document.getElementById('formNotebook').action = "php/pdf/pdfNotebook.php";
		else
			alert ("SE DEBEN COMPLETAR TODOS LOS CAMPOS DEL FORMULARIO");*/
	
	document.getElementById('formNotebook').action = "php/pdf/pdfNotebook.php";
	}

</script>