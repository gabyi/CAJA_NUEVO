<?php

include('fpdf.php');


//titular
$nomTit=mb_strtoupper($_REQUEST['nomTit'],'utf-8');
$importe=$_REQUEST['monto'];
$tipoDniTit=$_REQUEST['tipoTit']; //L.E./L.C./D.N.I./C.I.
$numDniTit=$_REQUEST['dniTit'];
$domTit=mb_strtoupper($_REQUEST['domPart'],'utf-8');
$telTit=$_REQUEST['telPart'];
$dirEstudio=$_REQUEST['domEst'];
$telEstudio=$_REQUEST['telEst'];
$fechaCol=$_REQUEST['colegio'];
$tomo=$_REQUEST['tomo'];
$folio=$_REQUEST['folio'];
$estCivilTit=$_REQUEST['civil'];
$conyuTit=$_REQUEST['conyugeTit'];
$alias=$_REQUEST['alias'];
$cbu=$_REQUEST['cbu'];
$cuit= $_REQUEST['cuit'];
$banco=$_REQUEST['banco'];
$monotributo=$_REQUEST['mono'];
$categoria=$_REQUEST['categoria'];
//$impEnLetras=impo_lets($importe);
$impEnLetras=convertir($importe);
$debito=$_REQUEST['debito'];
$cuotas=$_REQUEST['cuotas'];
$medioPago=$_REQUEST['pago'];
//avalista
$nomAval=mb_strtoupper($_REQUEST['nomAval'],'utf-8');
$tipoDniAval=$_REQUEST['tipoAval'];
$numDniAval=$_REQUEST['dniAval'];
$actividad=$_REQUEST['actividad'];
$domAval=mb_strtoupper($_REQUEST['domAval'],'utf-8');
$telAval=$_REQUEST['telAval'];
$civilAval=$_REQUEST['civilAval'];
$conyuAval=$_REQUEST['conyugeAval'];



// Creación del objeto de la clase heredada
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('logo.png',10,5,35,25);
$pdf->SetFont('Arial','BU',16);
// Movernos a la derecha
$pdf->Cell(60);
 // Título
$pdf->Cell(20,10,'SOLICITUD DE PRESTAMO');
// Salto de línea
$pdf->Ln(20);
$pdf->SetFont('Arial','',11);

$pdf->Cell(70);
$pdf->Cell(0,0,'   Santa Rosa,...........de..........................................de 20.......',0,1,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(8);
$pdf->MultiCell(0,6,'     Solicito un préstamo de Pesos '.strtoupper($impEnLetras).' ($ '.number_format($importe, 2).') pagadero en '.$cuotas.' cuotas mensuales con aplicación de una tasa de interés de tipo variable, equivalente al 70% de la tasa que cobra el Banco de La Pampa en el segmento III de la línea de préstamos Credisueldos.
					     Declaro conocer los términos de las disposiciones que rigen estos préstamos, a las cuales me allano.
				    El señor '.$nomAval.' , que también firma la presente, se constituye en avalista de todas obligaciones que asuma.');
if($medioPago=="transferencia")
{
    $pdf->MultiCell(0,6,'     Solicito que el préstamo se efectivice a través de TRANSFERENCIA a la cuenta N° '.strtoupper($cbu).' del banco '.strtoupper($banco).' o al Alias '.strtoupper($alias).'.');
}else
{
    $pdf->MultiCell(0,6,'     Solicito que el préstamo se efectivice a través de CHEQUE.');
}
$pdf->Ln(6);
$pdf->SetFont('Arial','BU',16);
$pdf->Cell(80);
$pdf->Cell(20,10,'SOLICITANTE');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(8);
$pdf->MultiCell(0,6,'Apellido y nombre: '.$nomTit.'
Doc. Identidad: '.$tipoDniTit.' Nº '.$numDniTit.'
CUIT/CUIL: '.$cuit.'
Domicilio: '.strtoupper($domTit).' T.E: '.$telTit.'
Estudio: '.strtoupper($dirEstudio).'     T.E: '.$telEstudio.'
Inscripción Colegio de Abogados y Procuradores de la Provincia de La Pampa de 
fecha: '.$fechaCol.' Tº '.$tomo.' Fº '.$folio.'');
if($monotributo=="si")
{
    $pdf->MultiCell(0,6,'Monotributista: '.strtoupper($monotributo).' Categoria: '.strtoupper($categoria));
}
if ($estCivilTit=="casada/o" && $conyuTit!="")
    $pdf->MultiCell(0,6,'Estado Civil: '.strtoupper($estCivilTit).' Nombre del Cónyuge: '.strtoupper($conyuTit));
    else
        $pdf->MultiCell(0,6,'                                                                                    ');

$pdf->Ln(6);
$pdf->SetFont('Arial','BU',16);
$pdf->Cell(80);
$pdf->Cell(20,10,'AVALISTA');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(3);
$pdf->MultiCell(0,6,'
Apellido y nombre: '.$nomAval.'
Doc. Identidad: '.$tipoDniAval.' Nº '.$numDniAval.'
Domicilio: '.$domAval.'  T.E: '.$telAval.'
Actividad: '.strtoupper($actividad));

if ($civilAval=="casada/o" && $conyuAval!="") 
    $pdf->MultiCell(0,6,'Estado Civil: '.strtoupper($civilAval).' Nombre del Cónyuge: '.strtoupper($conyuAval));
    else
        $pdf->MultiCell(0,6,'                                                                                    ');

$pdf->MultiCell(0,6,'Declaro bajo juramento que los datos consignados en esta solicitud y demás informaciones suministradas son correctos.-
   Acompaño a la presente los requisitos que corresponden de acuerdo a la reglamentación de préstamos.-
    Para todos los efectos constituimos domicilios especiales donde se practicarán las diligencias, gestiones y notificaciones:
Solicitante: '.strtoupper($dirEstudio).'
Avalista: '.$domAval.'


                                        ..............................                               .................................
                                                Avalista                                                  Solicitante
');
$pdf->AddPage();//
$pdf->Image('logo.png',10,5,35,25);
$pdf->SetFont('Arial','BU',16);
// Movernos a la derecha
$pdf->Cell(75);
 // Título
$pdf->Cell(20,10,'REGLAMENTO');
$pdf->Ln(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(25);
$pdf->MultiCell(0,6,'ARTÍCULO 1º.- La Caja Forense otorgará préstamos personales destinados a los afiliados beneficiarios y jubilados de la Institución.-
ARTÍCULO 2º.- Establécese como monto de cada préstamo las sumas de PESOS CINCUENTA MIL ($ 50.000,00); PESOS CIEN MIL ($ 100.000,00) o CINCUENTA MIL ($ 150.000,00).- 
ARTÍCULO 3º.- Los préstamos se cancelarán mediante el sistema francés de amortización del capital en treinta y seis (36) cuotas mensuales y consecutivas, la primera de las cuales vencerá del uno (1) al (10) diez del segundo mes posterior al de la efectivización del mismo, y las restantes del uno (1) al (10) diez de cada mes siguiente. El vencimiento operará el primer día hábil siguiente, si el último día del plazo fuera inhábil.-
ARTICULO 4º.-  A los efectos del otorgamiento, tendrán prioridad las solicitudes de préstamos nuevos frente a las de renovaciones. A su vez, en los casos de renovaciones, será condición para acceder a la misma tener al menos amortizado el cincuenta por ciento (50 %) del capital objeto del préstamo que se pretende renovar.-  
ARTÍCULO 5º.- Los préstamos se concederán previa evaluación y aprobación por la Caja acerca de la capacidad económico financiera del solicitante, aptitud del avalista presentado y antecedentes de pago de préstamos anteriores, pudiéndose requerir la presentación de dos avalistas cuando el primer ofrecido no reúna condiciones de suficiente solvencia.  El/los avalista/s no podrá ser afiliado de la Caja ni cónyuge del afiliado. Se documentarán en un pagaré por el importe total del capital prestado, en el que indicará también la tasa de interés y que deberá ser suscripto por el deudor y su avalista.-
ARTÍCULO 6º.- Para acceder a los préstamos, será condición inexcusable no registrar deuda por concepto alguno con la Caja Forense, salvo que se hubieran concedido facilidades para el pago de las mismas.-
ARTÍCULO 7º.- Los interesados deberán presentar una solicitud de préstamo cuyo formulario le será facilitado por la Caja, las que se recepcionarán del uno (1) al quince (15) de cada mes y se efectivizarán el último día del mismo, siguiendo el orden de presentación de las mismas y de acuerdo con los fondos disponibles. Al momento de la presentación de la solicitud, se deberá acreditar la solvencia del avalista. No serán recepcionadas y, en su caso serán devueltas, las solicitudes que no cumplan con los requisitos enunciados en el presente.-
ARTÍCULO 8º.- La falta de pago en término de dos (2) cuotas consecutivas o tres (3) alternadas, podrá determinar la caducidad automática del préstamo y la obligación de su pago total y/o, en su caso, la inhabilitación para obtener otro préstamo por el plazo de dos (2) años, a contar de la cancelación del mismo.-
ANEXO RESOLUCION Nº  1157/2014.-
                                    

                                                                    ..................................
                                                                        Firma  Solicitante
');
$pdf->AddPage();//
$pdf->Image('logo.png',10,5,35,25);
$pdf->SetFont('Arial','BU',16);
// Movernos a la derecha
$pdf->Cell(50);
 // Título
$pdf->Cell(20,10,'USO INTERNO PERSONAL CAJA FORENSE');

$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(25);
$pdf->MultiCell(0,6,"1) LA SOLICITUD DE PRÉSTAMO  Nº ......... DEL AFILIADO INSCRIPTO EN LA CAJA BAJO EL CÓDIGO PROFESIONAL ........... SE FIRMÓ EN MI PRESENCIA


                           .........................................                        .......................................
                                    Firma Empleado                                     Sello Recepción


2)  APTITUD DEL AVALISTA PRESENTADO (Tachar lo que no corresponda)

APROBADO / NO APROBADO

Observación: ..........................................................................................................................................................................

                           ............................................                        .................................
                                  Firma Responsable                                           Sello

3)  EVALUACIÓN ECONÓMICA FINANCIERA DEL AFILIADO (DEUDAS EN LA INSTITUCIÓN E INFORME BANCO CENTRAL). ANTECEDENTES CREDITICIOS EN LA INSTITUCIÓN (Tachar lo que no corresponda)

APROBADO / NO APROBADO

Observación: ..........................................................................................................................................................................

                           ............................................                        .................................
                                  Firma Responsable                                           Sello

4)  TURNO DE OTORGAMIENTO:
MES DE ....................... AÑO .....................");
$pdf->AddPage();//
$pdf->Image('logo.png',10,5,35,25);
$pdf->SetFont('Arial','B',22);

// Movernos a la derecha
$pdf->Cell(50);
 // Título
$pdf->Cell(20,10,'CAJA FORENSE');
$pdf->SetFont('Arial','B',18);
// Movernos a la derecha

$pdf->Ln(6);
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
$pdf->Cell(20,10,'Préstamo Nro. ..............');

// Salto de línea
$pdf->Ln(26);
$pdf->SetFont('Arial','',11);

$pdf->Cell(70);
$pdf->Cell(0,0,'   Santa Rosa,...........de..........................................de 20.......',0,1,'C');

$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(25);
$pdf->MultiCell(0,6,'A LA VISTA PAGARE a la CAJA FORENSE DE LA PAMPA SIN PROTESTO (Art.50 Decreto Ley 5.965/63) la cantidad de '.strtoupper($impEnLetras).'.- ($ '.number_format($importe, 2).'.-) por igual valor recibido a mi entera satisfacción. La suma a pagar devengará intereses compensatorios, a tasa variable, equivalentes al 70 % de la tasa de interés que aplica el Banco de La Pampa S.E.M.en la línea de préstamos Credisueldo -Segmento III- y se incrementará en un 50% más en caso de retraso.
Dejamos expresamente aclarado, en nuestro carácter de libradora y avalista, respectivamente, que de conformidad con lo dispuesto en el Art. 36 del Decreto Ley 5.965/63, ampliamos el plazo de presentación del presente hasta un máximo de cinco (5) años, a contar desde la fecha de libramiento indicada.
Pagadero en 25 de Mayo nº 246 de la ciudad de Santa Rosa, Provincia de La Pampa.
    
                ............................................                                               ............................................
                         Firma del Librador                                                              Firma del Avalista');
$pdf->Ln(3);
$pdf->Cell(90,0,$nomTit,0,0,'C');
$pdf->Cell(0,0,$nomAval,0,0,'C');
$pdf->Ln(5);
$pdf->Cell(90,0,strtoupper($dirEstudio),0,0,'C');
$pdf->Cell(0,0,$domAval,0,0,'C');


if($debito=="debito")
    {//paginas debito automatico
    $pdf->AddPage();
    $pdf->image('form001.jpg',0,0,210,300);
    $pdf->AddPage();
    $pdf->image('form002.jpg',0,0,210,300);
    }

////////////////////////////////////////////////////////////////////////
$pdf->Output();



/*function impo_lets($importe) {
        $unid=array("", "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve", "diez", "once", "doce", "trece", "catorce", "quince", "dieciséis", "diecisiete", "dieciocho", "diecinueve", "veinte", "ventiun", "veintidos", "veintitres", "veinticuatro", "veinticinco", "veintiseis", "veintisiete", "veintiocho", "veintinueve", "treinta");
        $dece=array("cero", "dieci", "veinti", "treinta", "cuarenta", "cincuenta", "sesenta", "setenta", "ochenta", "noventa");
        $cente=array("cero", "ciento", "doscientos", "trescientos", "cuatrocientos", "quinientos", "seiscientos", "setecientos", "ochocientos", "novecientos");
        $mile="mil";
        $millo="millones";
        $millo1="millon";
        $resu="";
        $Enteros = floor($importe);
        for ($i=2, $j=strlen($Enteros); $i<=$j; $i++) $Digitos[$i] = floor(($importe / pow(10,($i-1)) )% 10);
        $Digitos[1]=floor(floor($importe) % 10);
        $Digitos[0]=(($importe-floor($importe))*100);
        if ($Enteros<31) {
            $resu = $unid[$Enteros] . " ";
        } else {
            for ($i=strlen($Enteros), $j=1; $i>=$j; $i--) {
                $nume=$Digitos[$i];
                switch ($i) {
                    case 0:
                        break;
                    case 1:
                        if ($Digitos[2]>2) $resu = $resu . $unid[$nume] . " ";
                        break;
                    case 2:
                        $unid[21]="veintiuno";
                        $dgg=($Digitos[2]*10)+$Digitos[1];
                        if ($nume<3) $resu = $resu . $unid[$dgg] . " ";  else {
                            $resu = $resu . $dece[$nume];
                            if ($Digitos[1]>0) $resu = $resu . " y ";
                        }
                        break;
                    case 3:
                        if ($nume>0) $resu = $resu . $cente[$nume] . " ";
                        break;
                    case 4:
                        if (($Digitos[5]>2) or ($Digitos[5]<1)) {
                            if ($nume>1) $resu = $resu . $unid[$nume] ;
                            if (($nume==1) and ($Digitos[5]>2)) $resu = $resu . " un ";
                            $resu = $resu . " mil ";
                        }
                        break;
                    case 5:
                        $dgg=($Digitos[5]*10)+$Digitos[4];
                        if (($nume<3) and ($dgg<>0)) $resu = $resu . $unid[$dgg] . " mil ";  else {
                            if ($dgg<>0) $resu = $resu . $dece[$nume];
                            if ($Digitos[4]>0) $resu = $resu . " y ";
                        }
                        break;
                    case 6:
                        if ($nume>0) $resu = $resu . $cente[$nume] . " ";
                        break;
                    case 7:
                        if (($Digitos[8]>2) or ($Digitos[8]<1)) {
                            if ($nume>1) $resu = $resu . $unid[$nume] ;
                            if (($nume==1) and ($Digitos[8]>2)) $resu = $resu . " un ";
                            if (($nume==1) and ($Digitos[8]==0)) $resu = $resu . " un millon "; else $resu = $resu . " millones ";
                        }
                        break;
                    case 8:
                        $dgg=($Digitos[8]*10)+$Digitos[7];
                        if (($nume<3) and ($dgg<>0)) $resu = $resu . $unid[$dgg] . " millones ";  else {
                            if ($dgg<>0) $resu = $resu . $dece[$nume];
                            if ($Digitos[7]>0) $resu = $resu . " y ";
                        }
                        break;
                    case 9:
                        if ($nume>0) $resu = $resu . $cente[$nume] . " ";
                        break;
                    default:
                        break;
                }
            }
        }
        if ($Digitos[0]>0) $resu = $resu . "con " . round($Digitos[0]) . " centavos";
        return $resu;
        }*/
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