<?php

include('fpdf.php');

//Se define el timezone que sea necesario
date_default_timezone_set('America/Argentina/Buenos_Aires');

//Dia-Mes-Año Hora:Minutos:Segundos
$fecha = date('d-m-Y H:i:s');
//titular
$nomTit=mb_strtoupper($_REQUEST['nomTit'],'utf-8');
$importe=$_REQUEST['monto'];
$tipoDniTit=$_REQUEST['tipoTit']; //L.E./L.C./D.N.I./C.I.
$numDniTit=$_REQUEST['dniTit'];
$domTit=mb_strtoupper($_REQUEST['domPart'],'utf-8');
$telTit=$_REQUEST['telPart'];
$mail=$_REQUEST['mailAfiliado'];
$declaro=$_REQUEST['declaro'];
//$impEnLetras=impo_lets($importe);
$impEnLetras=convertir($importe);
$linea=$_REQUEST['linea'];
//avalista
$nomAval=mb_strtoupper($_REQUEST['nomAval'],'utf-8');
$tipoDniAval=$_REQUEST['tipoAval'];
$numDniAval=$_REQUEST['dniAval'];
$actividad=$_REQUEST['actividad'];
$domAval=mb_strtoupper($_REQUEST['domAval'],'utf-8');
$telAval=$_REQUEST['telAval'];
$mailGarante=$_REQUEST['mailGarante'];



// Creación del objeto de la clase heredada
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('logoCaja.png',10,5,27,34);
$pdf->SetFont('Arial','BU',16);
// Movernos a la derecha
$pdf->Cell(30);
 // Título
$pdf->Cell(10,10,'Formulario de Solicitud de Certificado de Admisibilidad');
// Salto de línea
$pdf->Ln(20);
$pdf->SetFont('Arial','',11);

$pdf->Cell(65);
$pdf->Cell(0,0,'   Santa Rosa, '.fechaCastellano($fecha).' a las '.date("H:i:s"),0,1,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(10);

$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,6,'DATOS DEL AFILIADO:');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(8);
$pdf->MultiCell(0,6,'Apellido y nombre: '.$nomTit.'
Doc. Identidad: '.$tipoDniTit.' Nº '.$numDniTit.'
Domicilio: '.strtoupper($domTit).' T.E: '.$telTit.'
Mail: '.$mail);

if (!$declaro)
{
    $pdf->Ln(6);
    $pdf->SetFont('Arial','B',11);
    $pdf->MultiCell(0,6,'Declaro bajo juramento conocer el contenido de la Resolución N° 1310 y los requisitos a cumplirante la Caja Forense y el Banco de La Pampa.');
}
    
  $pdf->Ln(6);

$pdf->SetFont('Arial','BU',12);
$pdf->MultiCell(0,6,'Condiciones generales exigidas por la Caja Forense:');
$pdf->Ln(3);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,6,'- Ser afiliado a la Caja con una antigüedad mínima de un (1) año.');
$pdf->MultiCell(0,6,'- Revestir la condición de afiliado beneficiario de acuerdo con los dispuesto en el artículo 5° de la');
$pdf->MultiCell(0,6,'   ley 1.861.');
$pdf->MultiCell(0,6,'- No registrar deuda por ningún concepto con la Caja al momento de la presentación de la solicitud.');
$pdf->MultiCell(0,6,'- Contar con una evaluación crediticia apta, de acuerdo con el historial de cumplimiento con los préstamos');
$pdf->MultiCell(0,6,'    que le hubieran sido otorgados por la Caja con anterioridad.');

  $pdf->Ln(6);

$pdf->SetFont('Arial','BU',12);
$pdf->MultiCell(0,6,'Condiciones generales exigidas por el Banco de La Pampa SEM (a título enunciativo):');
$pdf->Ln(3);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,6,'- Registrar abierta a su nombre una cuenta corriente comercial o PyME.');
$pdf->MultiCell(0,6,'- Adherir al sistema "e-Banking".');
$pdf->MultiCell(0,6,'- Encontrarse en situación 1, 2 o 3, de acuerdo a lo establecido en la normativa emitida por el BCRA sobre');
$pdf->MultiCell(0,6,'   clasificación de deudores.');
$pdf->MultiCell(0,6,'- Presentar certificado vigente que acredite la condición MiPyME emitido por el Ministerio de Desarrollo');
$pdf->MultiCell(0,6,'   Productivo de la Nación.');
$pdf->MultiCell(0,6,'- Conformidad del afiliado por ante la Dirección General de Rentas de la Provincia de La Pampa a fin ');
$pdf->MultiCell(0,6,'   de que el BLP S.E.M. pueda obtener información obrante en esa Dirección.');

//proxima pagina
$pdf->AddPage();//
$pdf->Image('logoCaja.png',10,5,27,34);
$pdf->SetFont('Arial','BU',16);
// Movernos a la derecha
$pdf->Cell(30);
 // Título
$pdf->Cell(10,10,'Formulario de Solicitud de Certificado de Admisibilidad');
// Salto de línea
$pdf->Ln(30);
//datos avalista
$pdf->SetFont('Arial','BU',12);

$pdf->Cell(0,6,'DATOS DEL GARANTE:');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(3);
$pdf->MultiCell(0,6,'
Apellido y nombre: '.$nomAval.'
Doc. Identidad: '.$tipoDniAval.' Nº '.$numDniAval.'
Domicilio: '.$domAval.'  T.E: '.$telAval.'
Mail: '.$mailGarante);

//datos avalista
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(10,10,'LÍNEA CREDITICIA ELEGIDA:');

$pdf->SetFont('Arial','U',11);
$pdf->Cell(60);
$pdf->Ln(12);

if($linea=="1")
   {
    $pdf->MultiCell(0,6,'Linea 1');
   }  

if($linea=="2")
{
    $pdf->MultiCell(0,6,'Linea 2');
}


$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,6,'- Monto solicitado: Pesos '.strtoupper($impEnLetras).' ($ '.number_format($importe, 2).').'); 

 $pdf->Ln(6);
    $pdf->SetFont('Arial','B',11);
    $pdf->MultiCell(0,6,'Recepcionada esta solicitud, se le enviará un correo electrónico con el texto de la Resolución de Directorio indicando el número de orden que le corresponde y la documentación que debe presentar dentro de los siguientes diez (10) días corridos. ');

//proxima pagina
$pdf->AddPage();//
$pdf->Image('logoCaja.png',10,5,27,34);
$pdf->SetFont('Arial','BU',16);
// Movernos a la derecha
$pdf->Cell(30);
 // Título
$pdf->Cell(10,10,'Formulario de Solicitud de Certificado de Admisibilidad');
// Salto de línea
$pdf->Ln(30);
//datos avalista
$pdf->SetFont('Arial','BU',12);

$pdf->Multicell(0,6,'Sin perjuicio de ello, se adelantan seguidamente las condiciones que debe reunir');
$pdf->Multicell(0,6,'el Garante para la eventual expedición del Certificado de Admisibilidad:');
$pdf->Ln(3);
$pdf->SetFont('Arial','',11);
$pdf->Multicell(0,6,'- Deberá aprobar la evaluación de la aptitud financiera y económica, pudiéndose requerir la presentación de otro avalista cuando el primero ofrecido no reúna condiciones de suficiente solvencia.');
$pdf->Multicell(0,6,'- Deberá contar con al menos una propiedad inmueble registrada a su nombre y que no se encuentre con afectación a vivienda (artículo 244 Código Civil y Comercial) ni otra limitación en su titularidad, cuya valuación fiscal supere el importe a garantizar, con más sus intereses, impuestos y gastos.');
$pdf->Multicell(0,6,'- Podrá suplantarse la garantía del punto anterior presentando en forma conjunta : la titularidad de un vehículo cuya valuación en la Dirección Nacional de Registro del Automotor y Créditos Prendarios (DRNPA) supere el importe a prestar en relación con la deuda garantizada más sus intereses, impuestos y gastos; y un recibo de sueldo en relación de dependencia con más de dos años de antigüedad en la institución empleadora, no registrando embargos en sus haberes de ningún tipo, y que el veinte por ciento (20%) del mismo cubra la cuota mensual del préstamo solicitado.');
$pdf->Multicell(0,6,'- Deberá aprobar la evaluación de la aptitud financiera y económica, pudiéndose requerir la presentación de otro avalista cuando el primero ofrecido no reúna condiciones de suficiente solvencia.');
$pdf->Multicell(0,6,'- Deberá contar con al menos una propiedad inmueble registrada a su nombre y que no se encuentre con afectación a vivienda (artículo 244 Código Civil y Comercial) ni otra limitación en su titularidad, cuya valuación fiscal supere el importe a garantizar, con más sus intereses, impuestos y gastos');
$pdf->Ln(3);
$pdf->SetFont('Arial','BU',12);
$pdf->Multicell(0,6,'Además de la garantía del punto anterior: ');
$pdf->Ln(3);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,6,'- Se deberá acreditar  la titularidad de un vehículo cuya valuación en la Dirección Nacional de Registro del Automotor y Créditos Prendarios (DRNPA) supere el importe a prestar en relación con la deuda garantizada más sus intereses, impuestos y gastos; o un recibo de sueldo en relación de dependencia con más de dos años de antigüedad en la institución empleadora, no registrando embargos en sus haberes de ningún tipo, y que el veinte por ciento (20%) del mismo cubra la cuota mensual del préstamo solicitado.');














$pdf->MultiCell(0,6,'


                                        ..............................                               .................................
                                                Avalista                                                  Solicitante
');




////////////////////////////////////////////////////////////////////////
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


function fechaCastellano ($fecha) {
  $fecha = substr($fecha, 0, 10);
  $numeroDia = date('d', strtotime($fecha));
  $dia = date('l', strtotime($fecha));
  $mes = date('F', strtotime($fecha));
  $anio = date('Y', strtotime($fecha));
  $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
  $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
  return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
  }
?>