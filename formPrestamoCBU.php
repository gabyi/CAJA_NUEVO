<!DOCTYPE html>
<html lang="en">

<?php

include 'head.php';
?>
<title>Formulario para préstamos</title>
  <body>

<div class="container" style='' id="containerCuerpo">
	<div class="row">
		<div id="panel" class="login-panel panel panel-default">
			<div class="panel-heading">Formulario de Préstamos Personales</div>
				
			<div id="panel-cuerpo" class="panel-body">
				<form class="form-horizontal" action="php/pdf/pdfPresCBU.php" method="post" onsubmit="return validar();">
					<div class="row" id="rowPres">
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
									<select class="form-control" id="pagoList" onChange="mirarTasa();" name="pago">
  										<option value="cheque" selected>Cheque</option>	
  										<option value="transferencia">Transferencia</option>
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
									<input id="nomTit" name="nomTit" title="Por favor ingrese un nombre" type="text" placeholder="Nombre y Apellido" class="form-control" required>
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
									<input id="dniTit" name="dniTit" title="" type="text" placeholder="Nº DNI 8 dígitos" class="form-control" >
								</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label" for="cuit">CUIT/CUIL</label>
								<div class="col-md-7">
									<input id="cuit" name="cuit" title="" type="text" class="form-control" required>
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
									<select class="form-control" name="civil" id="estCivilTit">
  										<option value="soltera/o">Soltera/o</option>
  										<option value="casada/o">Casada/o</option>
  										<option value="divorciada/o">Divorciada/o</option>	
  										<option value="viuda/o">Viuda/o</option>
									</select>
								</div>
								<label class="col-md-1 control-label" for="name">Cónyuge</label>
								<div class="col-md-4">
									<input id="conyugeTit" name="conyugeTit" title="" type="text" placeholder="" class="form-control" >
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
									<input id="nomAval" name="nomAval" title="" type="text" placeholder="Nombre y Apellido" class="form-control" required>
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
									<input id="dniAval" name="dniAval" title="" type="text" placeholder="N° DNI 8 dígitos" class="form-control" required>
								</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="name">Actividad</label>
								<div class="col-md-4">
									<input id="actAval" name="actividad" title="" type="text" placeholder="" class="form-control" >
								</div>

						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="name">Dirección</label>
								<div class="col-md-4">
									<input id="domAval" name="domAval" title="" type="text" placeholder="" class="form-control" required>
								</div>
								<label class="col-md-1 control-label" for="name">Teléfono</label>
								<div class="col-md-2">
									<input id="telAval" name="telAval" title="" type="text" placeholder="" class="form-control" required>
								</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label" for="name">E. civil</label>
								<div class="col-md-2">
									<select class="form-control" name="civilAval" id="civilAval">
  										<option value="soltera/o">Soltera/o</option>
  										<option value="casada/o">Casada/o</option>
  										<option value="divorciada/o">Divorciada/o</option>	
									</select>
								</div>
								<label class="col-md-1 control-label" for="name">Cónyuge</label>
								<div class="col-md-4">
									<input id="conyugeAval" name="conyugeAval" title="" type="text" placeholder="" class="form-control" >
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
</body>
</html>
<script type="text/javascript">
	
function mirarTasa()
  {
    var alias= "<div class='form-group' id='alias'><label class='col-md-2 control-label' for='alias'>Alias *</label><div class='col-sm-5 col-md-5'><input type='text' class='form-control'  name='alias' id='aliasCBU' placeholder='' value='' required></div></div>";
    var banco="<div class='form-group' id='banco'><label class='col-md-2 control-label' for='name'>Banco*</label><div class='col-md-4'><input id='bancoCBU' name='banco' type='text' class='form-control' required></div><label class='col-md-1 control-label' for='name'>CBU*</label><div class='col-md-4'><input id='cbu' name='cbu' type='text' class='form-control' required></div></div>";

   
  if($("#pagoList").val()=="transferencia")
  {
    $("#rowPres").append(alias);
    $("#rowPres").append(banco)
  }else
	  {	 
	    $("#alias").remove();
	    $("#banco").remove();
	  } 
  }

function validar()
	{
		var nombreTitular= document.getElementById("nomTit").value;
		var dniTitular= document.getElementById("dniTit").value;
		var cuit= document.getElementById("cuit").value;
		var conyugeTit= document.getElementById("conyugeTit").value;
		var nombreAval= document.getElementById("nomAval").value;
		var dniAval= document.getElementById("dniAval").value;
		var domAval= document.getElementById("domAval").value;
		var telAval= document.getElementById("telAval").value;
		var conyugeAval= document.getElementById("conyugeAval").value;

		if($("#pagoList").val()=="transferencia")
		{
			var alias, cbu, banco;
			alias= document.getElementById("aliasCBU").value;  
			cbu= document.getElementById("cbu").value;  
			banco= document.getElementById("bancoCBU").value; 

			if(alias==="" && cbu==="" && banco==="")
			{
				alert("Se tiene que completar el alias o CBU y Banco");
				$("#aliasCBU").focus();
				return false;
			}else
				{
					if(alias!=="")
						{
							if(banco!=="" && cbu!=="")
							{
								return true;
							}else
							{
								alert("El CBU o el Banco estan vacios");
								$("#bancoCBU").focus();
								return false;
							}
							
						}else
						{
							alert("El Alias está vacio");
							$("#aliasCBU").focus();
							return false;
						}
				}

		}

		if(nombreTitular!=="")
		{
			if(dniTitular!=="" && !isNaN(dniTitular) && dniTitular.length>=8)
			{
				if(cuit!=="" && cuit.length>=11)
				{
					if($("#estCivilTit").val()=="casada/o" && conyugeTit==="")
					{
						alert("El campo cónyuge del titular está vacio");
							$("#conyugeTit").focus();
							return false;
					}else
					{
						if(nombreAval!=="")
						{
							if(dniAval!=="" && !isNaN(dniAval) && dniAval.length>=8)
							{
								if(domAval!=="")
								{
									if(telAval!=="" && !isNaN(telAval))
									{
										if($("#civilAval").val()=="casada/o" && conyugeAval==="")
										{
											alert("El campo cónyuge del avalista está vacio");
											$("#conyugeAval").focus();
											return false;
										}else
										{
											return true;
										}
									}else
									{
										alert("El campo del teléfono del avalista esta vacio o no es un numero");
										$("#telAval").focus();
										return false;
									}
								}else
								{
									alert("El campo domicilio del Avalista esta vacio");
									$("#domAval").focus();
									return false;
								}
							}else
							{
								alert("El DNI del avalista esta vacio, no es numero o es menor a 8 dígitos");
								$("#dniAval").focus();
								return false;
							}
						}else
						{
							alert("El campo nombre del avalista esta vacio");
							$("#nomAval").focus();
							return false;
						}
					}
				}else
				{
					alert("El CUIT/CUIL esta vacio, o no tiene la longitud que corresponde");
					$("#cuit").focus();
					return false;
				}
			}else
			{
				alert("El campo DNI titular está vacio, no es un número o es menor a 8 dígitos");
				$("#dniTit").focus();
				return false;
			}
		}else
		{
			alert("El campo nombre del Titular está vacio");
			$("#nomTit").focus();
			return false
		}
	}

  
</script>

