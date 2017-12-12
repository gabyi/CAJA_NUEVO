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

if($opcionPago=="contado")
	{
		$enLetras= strtoupper(convertir($efectivo));
		$pago="en 12 cuotas de $ ".$cuota;
		$pago.= "( ".$enLetras.") ";
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
$pdf->Cell(20,10,'SOLICITUD DE NOTEBOOK');
// Salto de línea
$pdf->Ln(22);
$pdf->SetFont('Arial','',11);

$pdf->Cell(70);
$pdf->Cell(0,0,'   Santa Rosa,...........de..........................................de 20.......',0,1,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(10);
$pdf->MultiCell(0,6,utf8_decode('     Por medio del presente y a los fines de acceder al beneficio previsto en el Convenio de Vinculación logrado entre la Caja Forense y RIVERA HOGAR S.A., solicito un PRÉSTAMO por el monto y pagadero en las cuotas correspondientes al modelo de notebook Por medio del presente y a los fines de acceder al beneficio previsto en el Convenio de Vinculación logrado entre la Caja Forense y RIVERA HOGAR S.A., solicito un PRÉSTAMO por el monto y pagadero '.$efectivo.' correspondientes al producto: '.$producto));

$pdf->Output();


function basico($numero) {
$valor = array ("", "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve", "diez", "once", "doce", "trece", "catorce", "quince", "dieciséis", "diecisiete", "dieciocho", "diecinueve", "veinte", "ventiun", "veintidos", "veintitres", "veinticuatro", "veinticinco", "veintiseis", "veintisiete", "veintiocho", "veintinueve");
return $valor[$numero - 1];
}
 
function decenas($n) {
$decenas = array (30=>'treinta',40=>'cuarenta',50=>'cincuenta',60=>'sesenta',
70=>'setenta',80=>'ochenta',90=>'noventa');
if( $n <= 29) return basico($n);
$x = $n % 10;
if ( $x == 0 ) {
return $decenas[$n];
} else return $decenas[$n - $x].' y '. basico($x);
}
 
function centenas($n) {
$cientos = array (100 =>'cien',200 =>'doscientos',300=>'trecientos',
400=>'cuatrocientos', 500=>'quinientos',600=>'seiscientos',
700=>'setecientos',800=>'ochocientos', 900 =>'novecientos');
if( $n >= 100) {
if ( $n % 100 == 0 ) {
return $cientos[$n];
} else {
$u = (int) substr($n,0,1);
$d = (int) substr($n,1,2);
return (($u == 1)?'ciento':$cientos[$u*100]).' '.decenas($d);
}
} else return decenas($n);
}
 
function miles($n) {
if($n > 999) {
if( $n == 1000) {return 'mil';}
else {
$l = strlen($n);
$c = (int)substr($n,0,$l-3);
$x = (int)substr($n,-3);
if($c == 1) {$cadena = 'mil '.centenas($x);}
else if($x != 0) {$cadena = centenas($c).' mil '.centenas($x);}
else $cadena = centenas($c). ' mil';
return $cadena;
}
} else return centenas($n);
}
 
function millones($n) {
if($n == 1000000) {return 'un millón';}
else {
$l = strlen($n);
$c = (int)substr($n,0,$l-6);
$x = (int)substr($n,-6);
if($c == 1) {
$cadena = ' millón ';
} else {
$cadena = ' millones ';
}
return miles($c).$cadena.(($x > 0)?miles($x):'');
}
}
function convertir($n) {
switch (true) {
case ( $n >= 1 && $n <= 29) : return basico($n); break;
case ( $n >= 30 && $n < 100) : return decenas($n); break;
case ( $n >= 100 && $n < 1000) : return centenas($n); break;
case ($n >= 1000 && $n <= 999999): return miles($n); break;
case ($n >= 1000000): return millones($n);
}
}
?>