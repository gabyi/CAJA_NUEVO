<?php 

  
// Motrar todos los errores de PHP
error_reporting(E_ALL);
 

include('fpdf.php');

// Datos recibidos

$modelo=$_REQUEST['modelo'];
$efectivo=$_REQUEST['efectivo'];
$cuota=$_REQUEST['cuota'];
$opcionPago=$_REQUEST['opcionPago'];
$nomTit=$_REQUEST['nomTit'];
$tipoDni=$_REQUEST['tipoDni'];
$dniTit=$_REQUEST['dniTit'];
$domPart=$_REQUEST['domPart'];
$telPart=$_REQUEST['telPart'];
$localidad=$_REQUEST['localidad'];



if($opcionPago != "contado")
	{
		$enLetras= strtoupper(convertir($cuota));
		$pago="en 12 cuotas de $ ".$cuota;
		$pago.= "( ".$enLetras.") ";
		$totalCuotas= 12*$cuota;
	}else
		{
			$pago="en una cuota de $ ".$efectivo." (".strtoupper(convertir($efectivo)).")";
		}

/////////////////////////////////////////////////////////////////seteo los modelos/////////////////////////////////////////////////////////////////////////////////
if ($modelo=="i3")
	{
		$producto="Notebook Mod. CI3 - Intel Core I3 - 6200U Processor (3M Cache, 2.3 Ghz)";
	}else
		{
			if ($modelo=="i5") {
				$producto="Notebook Mod. C15 - Intel Core I5 - 6200U Processor (3M Cache, 2.3 Ghz)";
			} else {
				if ($modelo=="i7") {
					$producto="Notebook Mod. C17 - Intel Core I7 - 6200U Processor (4M Cache, 2.5 Ghz)";
				} else {
					if ($modelo=="carbon") {
						$producto="Notebook Mod. Xi CARBON  CI7 - Intel Core I7 - 7600U";
					} else {
						$producto="Notebook Mod. T470 S - C15 - Core I5 - 7200U";
					}
					
				}
				
			}
			
		}


/////////////////////////////////////////////////////////////////envio mail para el pedido ////////////////////////////////////////////////////////////////////////

/*if(isset($_POST['enviar']))
		{
			$asunto ="SOLICITUD DE NOTEBOOK - ".$nomTit;//$_REQUEST['asunto'];
			$mensaje ="NOMBRE Y APELLIDO: ".$nomTit;
			$mensaje .="\r\n MODELO: ".$producto; //$_REQUEST['message'];
			$mensaje .="\r\n OPCION DE PAGO: ".$opcionPago;
			

			$webmail="gabrielisabella@cforense.org ";
			$cabecera = "From: FORMULARIO NOTEBOOKS"; 

			mail($webmail, $asunto, $nomTit." dice: \r\n".$mensaje, $cabecera);
		}*/

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('logo.png',10,5,35,25);
$pdf->SetFont('Arial','BU',16);
// Movernos a la derecha
$pdf->Cell(60);
 // Título
$pdf->Cell(20,10,'SOLICITUD DE PRODUCTO');
// Salto de línea
$pdf->Ln(22);
$pdf->SetFont('Arial','',11);

$pdf->Cell(70);
$pdf->Cell(0,0,'   Santa Rosa,...........de..........................................de 20.......',0,1,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(10);
$pdf->MultiCell(0,6,utf8_decode('     Por medio del presente y a los fines de acceder al beneficio previsto en el Convenio de Vinculación logrado entre la Caja Forense y RIVERA HOGAR S.A., solicito un PRÉSTAMO por el monto y pagadero en las cuotas correspondientes al modelo de notebook Por medio del presente y a los fines de acceder al beneficio previsto en el Convenio de Vinculación logrado entre la Caja Forense y RIVERA HOGAR S.A., solicito un PRÉSTAMO por el monto y pagadero '.$pago.' correspondientes al producto: '));

$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
// Movernos a la derecha
$pdf->Cell(20);
 // Título
$pdf->Cell(20,10,$producto);

$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(15);
$pdf->MultiCell(0,6,utf8_decode('     Declaro conocer los términos de las disposiciones que rigen estos préstamos y las condiciones del Convenio referido, a las cuales me allano. Habiendo seleccionado el modelo y su correspondiente financiación, adhiero expresamente al sistema de débito directo en cuenta a fin de que se realicen los pagos mensuales acordados anteriormente –a excepción de que se haya optado por el pago al contado-, en cuyo supuesto, el pago lo haré a la cuenta directa de la empresa proveedora.-'));

$pdf->Ln(5);
$pdf->SetFont('Arial','BU',14);
// Movernos a la derecha
$pdf->Cell(80);
 // Título
$pdf->Cell(30,10,'Solicitante',0,1);

$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(10);
$pdf->MultiCell(0,6,utf8_decode('Apellido y nombre: '.strtoupper($nomTit).'
Doc. Identidad: '.$tipoDni.' Nº '.$dniTit.'
Domicilio: '.strtoupper($domPart).'.- Localidad: '.strtoupper($localidad).' 
T.E: '.$telPart.'.-'));

$pdf->Ln(10);
$pdf->MultiCell(0,6,utf8_decode('     Declaro bajo juramento que los datos consignados en esta solicitud y demás datos suministrados son correctos.
   Acompaño a la presente los requisitos que corresponden de acuerdo a la reglamentación de préstamos.
    Para todos los efectos constituyo domicilio especial, donde se practicarán las diligencias, gestiones y notificaciones, en el siguiente domicilio: '.strtoupper($domPart).'




                                                                 .........................................
                                                                        Firma  Solicitante'));

/////////////////////////////////////////////////////pagare///////////////////////////////////////////////
if($opcionPago != "contado")
	{

$pdf->AddPage();//
$pdf->Image('logo.png',10,5,35,25);
$pdf->SetFont('Arial','B',22);

// Movernos a la derecha
$pdf->Cell(50);
 // Título
$pdf->Cell(20,10,'CAJA FORENSE');
$pdf->SetFont('Arial','B',18);
// Movernos a la derecha

$pdf->Ln(8);
$pdf->Cell(59);
 // Título
$pdf->Cell(20,10,'DE LA PAMPA');
$pdf->SetFont('Arial','',8);
$pdf->Ln(5);
$pdf->Cell(48);
 // Título
$pdf->Cell(20,10,'25 DE MAYO 246 - T.E. 454212/454214-FAX 432787');
$pdf->SetFont('Arial','',8);
$pdf->Ln(3);
$pdf->Cell(48);
 // Título
$pdf->Cell(20,10,'6300 - SANTA ROSA - LA PAMPA');

$pdf->Ln(-10);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(145);
 // Título
$pdf->Cell(20,10,utf8_decode('Préstamo Nro. ..............'));

// Salto de línea
$pdf->Ln(26);
$pdf->SetFont('Arial','',11);

$pdf->Cell(70);
$pdf->Cell(0,0,'   Santa Rosa,...........de..........................................de 20.......',0,1,'C');

$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(25);
$pdf->MultiCell(0,6,utf8_decode('A LA VISTA PAGARE a la CAJA FORENSE DE LA PAMPA SIN PROTESTO (Art.50 Decreto Ley 5.965/63) la cantidad de '.strtoupper(convertir($totalCuotas)).' .- ($ '.number_format($totalCuotas,2).' .-) por igual valor recibido a mi entera satisfacción. La suma a pagar devengará intereses punitorios en caso de mora, aplicándose la tasa mix, incrementada en un 50%.-
Dejamos expresamente aclarado, en nuestro carácter de libradora, que de conformidad con lo dispuesto en el Art. 36 del Decreto Ley 5.965/63, ampliamos el plazo de presentación del presente hasta un máximo de cinco (5) años, a contar desde la fecha de libramiento indicada.-'));


$pdf->Ln(26);
$pdf->Cell(70);
 // Título
$pdf->Cell(20,10,'..............................................',0,1);
$pdf->Cell(80);
$pdf->Cell(10,10,'Firma del Librador',0,1);
}

$pdf->Output();


//////////////////////////////////////////////CONVIERTE PESOS EN LETRAS ////////////////////////////////////////////////////////////////////////////////////////////////

function unidad($numuero){
	switch ($numuero)
	{
		case 9:
		{
			$numu = "NUEVE";
			break;
		}
		case 8:
		{
			$numu = "OCHO";
			break;
		}
		case 7:
		{
			$numu = "SIETE";
			break;
		}		
		case 6:
		{
			$numu = "SEIS";
			break;
		}		
		case 5:
		{
			$numu = "CINCO";
			break;
		}		
		case 4:
		{
			$numu = "CUATRO";
			break;
		}		
		case 3:
		{
			$numu = "TRES";
			break;
		}		
		case 2:
		{
			$numu = "DOS";
			break;
		}		
		case 1:
		{
			$numu = "UN";
			break;
		}		
		case 0:
		{
			$numu = "";
			break;
		}		
	}
	return $numu;	
}

function decena($numdero){
	
		if ($numdero >= 90 && $numdero <= 99)
		{
			$numd = "NOVENTA ";
			if ($numdero > 90)
				$numd = $numd."Y ".(unidad($numdero - 90));
		}
		else if ($numdero >= 80 && $numdero <= 89)
		{
			$numd = "OCHENTA ";
			if ($numdero > 80)
				$numd = $numd."Y ".(unidad($numdero - 80));
		}
		else if ($numdero >= 70 && $numdero <= 79)
		{
			$numd = "SETENTA ";
			if ($numdero > 70)
				$numd = $numd."Y ".(unidad($numdero - 70));
		}
		else if ($numdero >= 60 && $numdero <= 69)
		{
			$numd = "SESENTA ";
			if ($numdero > 60)
				$numd = $numd."Y ".(unidad($numdero - 60));
		}
		else if ($numdero >= 50 && $numdero <= 59)
		{
			$numd = "CINCUENTA ";
			if ($numdero > 50)
				$numd = $numd."Y ".(unidad($numdero - 50));
		}
		else if ($numdero >= 40 && $numdero <= 49)
		{
			$numd = "CUARENTA ";
			if ($numdero > 40)
				$numd = $numd."Y ".(unidad($numdero - 40));
		}
		else if ($numdero >= 30 && $numdero <= 39)
		{
			$numd = "TREINTA ";
			if ($numdero > 30)
				$numd = $numd."Y ".(unidad($numdero - 30));
		}
		else if ($numdero >= 20 && $numdero <= 29)
		{
			if ($numdero == 20)
				$numd = "VEINTE ";
			else
				$numd = "VEINTI".(unidad($numdero - 20));
		}
		else if ($numdero >= 10 && $numdero <= 19)
		{
			switch ($numdero){
			case 10:
			{
				$numd = "DIEZ ";
				break;
			}
			case 11:
			{		 		
				$numd = "ONCE ";
				break;
			}
			case 12:
			{
				$numd = "DOCE ";
				break;
			}
			case 13:
			{
				$numd = "TRECE ";
				break;
			}
			case 14:
			{
				$numd = "CATORCE ";
				break;
			}
			case 15:
			{
				$numd = "QUINCE ";
				break;
			}
			case 16:
			{
				$numd = "DIECISEIS ";
				break;
			}
			case 17:
			{
				$numd = "DIECISIETE ";
				break;
			}
			case 18:
			{
				$numd = "DIECIOCHO ";
				break;
			}
			case 19:
			{
				$numd = "DIECINUEVE ";
				break;
			}
			}	
		}
		else
			$numd = unidad($numdero);
	return $numd;
}

	function centena($numc){
		if ($numc >= 100)
		{
			if ($numc >= 900 && $numc <= 999)
			{
				$numce = "NOVECIENTOS ";
				if ($numc > 900)
					$numce = $numce.(decena($numc - 900));
			}
			else if ($numc >= 800 && $numc <= 899)
			{
				$numce = "OCHOCIENTOS ";
				if ($numc > 800)
					$numce = $numce.(decena($numc - 800));
			}
			else if ($numc >= 700 && $numc <= 799)
			{
				$numce = "SETECIENTOS ";
				if ($numc > 700)
					$numce = $numce.(decena($numc - 700));
			}
			else if ($numc >= 600 && $numc <= 699)
			{
				$numce = "SEISCIENTOS ";
				if ($numc > 600)
					$numce = $numce.(decena($numc - 600));
			}
			else if ($numc >= 500 && $numc <= 599)
			{
				$numce = "QUINIENTOS ";
				if ($numc > 500)
					$numce = $numce.(decena($numc - 500));
			}
			else if ($numc >= 400 && $numc <= 499)
			{
				$numce = "CUATROCIENTOS ";
				if ($numc > 400)
					$numce = $numce.(decena($numc - 400));
			}
			else if ($numc >= 300 && $numc <= 399)
			{
				$numce = "TRESCIENTOS ";
				if ($numc > 300)
					$numce = $numce.(decena($numc - 300));
			}
			else if ($numc >= 200 && $numc <= 299)
			{
				$numce = "DOSCIENTOS ";
				if ($numc > 200)
					$numce = $numce.(decena($numc - 200));
			}
			else if ($numc >= 100 && $numc <= 199)
			{
				if ($numc == 100)
					$numce = "CIEN ";
				else
					$numce = "CIENTO ".(decena($numc - 100));
			}
		}
		else
			$numce = decena($numc);
		
		return $numce;	
}

	function miles($nummero){
		if ($nummero >= 1000 && $nummero < 2000){
			$numm = "MIL ".(centena($nummero%1000));
		}
		if ($nummero >= 2000 && $nummero <10000){
			$numm = unidad(Floor($nummero/1000))." MIL ".(centena($nummero%1000));
		}
		if ($nummero < 1000)
			$numm = centena($nummero);
		
		return $numm;
	}

	function decmiles($numdmero){
		if ($numdmero == 10000)
			$numde = "DIEZ MIL";
		if ($numdmero > 10000 && $numdmero <20000){
			$numde = decena(Floor($numdmero/1000))."MIL ".(centena($numdmero%1000));		
		}
		if ($numdmero >= 20000 && $numdmero <100000){
			$numde = decena(Floor($numdmero/1000))." MIL ".(miles($numdmero%1000));		
		}		
		if ($numdmero < 10000)
			$numde = miles($numdmero);
		
		return $numde;
	}		

	function cienmiles($numcmero){
		if ($numcmero == 100000)
			$num_letracm = "CIEN MIL";
		if ($numcmero >= 100000 && $numcmero <1000000){
			$num_letracm = centena(Floor($numcmero/1000))." MIL ".(centena($numcmero%1000));		
		}
		if ($numcmero < 100000)
			$num_letracm = decmiles($numcmero);
		return $num_letracm;
	}	
	
	function millon($nummiero){
		if ($nummiero >= 1000000 && $nummiero <2000000){
			$num_letramm = "UN MILLON ".(cienmiles($nummiero%1000000));
		}
		if ($nummiero >= 2000000 && $nummiero <10000000){
			$num_letramm = unidad(Floor($nummiero/1000000))." MILLONES ".(cienmiles($nummiero%1000000));
		}
		if ($nummiero < 1000000)
			$num_letramm = cienmiles($nummiero);
		
		return $num_letramm;
	}	

	function decmillon($numerodm){
		if ($numerodm == 10000000)
			$num_letradmm = "DIEZ MILLONES";
		if ($numerodm > 10000000 && $numerodm <20000000){
			$num_letradmm = decena(Floor($numerodm/1000000))."MILLONES ".(cienmiles($numerodm%1000000));		
		}
		if ($numerodm >= 20000000 && $numerodm <100000000){
			$num_letradmm = decena(Floor($numerodm/1000000))." MILLONES ".(millon($numerodm%1000000));		
		}
		if ($numerodm < 10000000)
			$num_letradmm = millon($numerodm);
		
		return $num_letradmm;
	}

	function cienmillon($numcmeros){
		if ($numcmeros == 100000000)
			$num_letracms = "CIEN MILLONES";
		if ($numcmeros >= 100000000 && $numcmeros <1000000000){
			$num_letracms = centena(Floor($numcmeros/1000000))." MILLONES ".(millon($numcmeros%1000000));		
		}
		if ($numcmeros < 100000000)
			$num_letracms = decmillon($numcmeros);
		return $num_letracms;
	}	

	function milmillon($nummierod){
		if ($nummierod >= 1000000000 && $nummierod <2000000000){
			$num_letrammd = "MIL ".(cienmillon($nummierod%1000000000));
		}
		if ($nummierod >= 2000000000 && $nummierod <10000000000){
			$num_letrammd = unidad(Floor($nummierod/1000000000))." MIL ".(cienmillon($nummierod%1000000000));
		}
		if ($nummierod < 1000000000)
			$num_letrammd = cienmillon($nummierod);
		
		return $num_letrammd;
	}	
			
		
function convertir($numero){

	$pesos= explode(".", $numero);

	$enteros= convertirPlata($pesos[0]);
	$decimales= convertirPlata($pesos[1]);

	return $enteros." PESOS CON ".$decimales." CENTAVOS";
}

funcTion convertirPlata($numero)
	{

		$numf = milmillon($numero);
		return $numf;
	}
?>