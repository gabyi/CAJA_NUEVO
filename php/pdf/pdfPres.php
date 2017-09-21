<?php

include('fpdf.php');


//titular
$nomTit=$_REQUEST['nomTit'];
$importe=$_REQUEST['monto'];
$tipoDniTit=$_REQUEST['tipoTit']; //L.E./L.C./D.N.I./C.I.
$numDniTit=$_REQUEST['dniTit'];
$domTit=$_REQUEST['domPart'];
$telTit=$_REQUEST['telPart'];
$dirEstudio=$_REQUEST['domEst'];
$telEstudio=$_REQUEST['telEst'];
$fechaCol=$_REQUEST['colegio'];
$tomo=$_REQUEST['tomo'];
$folio=$_REQUEST['folio'];
$estCivilTit=$_REQUEST['civil'];
$conyuTit=$_REQUEST['conyugeTit'];
$impEnLetras=impo_lets($importe);
$debito=$_REQUEST['debito'];
$medioPago="transferencia";
$cuotas=$_REQUEST['cuotas'];
$medioPago=$_REQUEST['pago'];
//avalista
$nomAval=$_REQUEST['nomAval'];
$tipoDniAval=$_REQUEST['tipoAval'];
$numDniAval=$_REQUEST['dniAval'];
$actividad=$_REQUEST['actividad'];
$domAval=$_REQUEST['domAval'];
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
$pdf->Ln(22);
$pdf->SetFont('Arial','',11);

$pdf->Cell(70);
$pdf->Cell(0,0,'   Santa Rosa,...........de..........................................de 20.......',0,1,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(10);
$pdf->MultiCell(0,6,utf8_decode('     Solicito un préstamo de Pesos '.strtoupper($impEnLetras).' ($ '.number_format($importe, 2).') pagadero en '.$cuotas.' cuotas mensuales con aplicación de una tasa de interés de tipo variable, equivalente al 65% de la tasa que cobra el Banco de La Pampa en el segmento III de la línea de préstamos Credisueldos.
					     Declaro conocer los términos de las disposiciones que rigen estos préstamos, a las cuales me allano.
				    El señor '.strtoupper($nomAval).' , que también firma la presente, se constituye en avalista de todas obligaciones que asuma.'));
$pdf->MultiCell(0,6,utf8_decode('     Solicito que el préstamo se efectivice a través de '.$medioPago.'.'));
$pdf->Ln(8);
$pdf->SetFont('Arial','BU',16);
$pdf->Cell(80);
$pdf->Cell(20,10,'SOLICITANTE');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(10);
$pdf->MultiCell(0,6,utf8_decode('Apellido y nombre: '.strtoupper($nomTit).'
Doc. Identidad: '.$tipoDniTit.' Nº '.$numDniTit.'
Domicilio: '.strtoupper($domTit).' T.E: '.$telTit.'
Estudio: '.strtoupper($dirEstudio).'     T.E: '.$telEstudio.'
Inscripción Colegio de Abogados y Procuradores de la Provincia de La Pampa de 
fecha: '.$fechaCol.' Tº '.$tomo.' Fº '.$folio));
if ($estCivilTit=="casada/o" && $conyuTit!="")
    $pdf->MultiCell(0,6,utf8_decode('Estado Civil: '.strtoupper($estCivilTit).' Nombre del Cónyuge: '.strtoupper($conyuTit)));
    else
        $pdf->MultiCell(0,6,utf8_decode('                                                                                    '));

$pdf->Ln(8);
$pdf->SetFont('Arial','BU',16);
$pdf->Cell(85);
$pdf->Cell(20,10,'AVALISTA');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(8);
$pdf->MultiCell(0,6,utf8_decode('
Apellido y nombre: '.$nomAval.'
Doc. Identidad: '.$tipoDniAval.' Nº '.$numDniAval.'
Domicilio: '.strtoupper($domAval).'  T.E: '.$telAval.'
Actividad: '.strtoupper($actividad)));

if ($civilAval=="casada/o" && $conyuAval!="") 
    $pdf->MultiCell(0,6,utf8_decode('Estado Civil: '.strtoupper($civilAval).' Nombre del Cónyuge: '.strtoupper($conyuAval)));
    else
        $pdf->MultiCell(0,6,utf8_decode('                                                                                    '));

$pdf->MultiCell(0,6,utf8_decode('Declaro bajo juramento que los datos consignados en esta solicitud y demás informaciones suministradas son correctos.-
   Acompaño a la presente los requisitos que corresponden de acuerdo a la reglamentación de préstamos.-
    Para todos los efectos constituimos domicilios especiales donde se practicarán las diligencias, gestiones y notificaciones:
Solicitante: '.strtoupper($nomTit).'
Avalista: '.strtoupper($nomAval).'



                                        ..............................                               .................................
                                                Avalista                                                  Solicitante
'));
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
$pdf->MultiCell(0,6,utf8_decode('ARTÍCULO 1º.- La Caja Forense otorgará préstamos personales destinados a los afiliados beneficiarios y jubilados de la Institución.-
ARTÍCULO 2º.- Establécese como monto de cada préstamo las sumas de PESOS VEINTICINCO MIL ($ 25.000,00); CINCUENTA MIL ($ 50.000,00) o PESOS CIEN MIL ($ 100.000,00).- 
ARTÍCULO 3º.- Los préstamos se cancelarán mediante el sistema francés de amortización del capital en treinta y seis (36) cuotas mensuales y consecutivas, la primera de las cuales vencerá del uno (1) al (10) diez del segundo mes posterior al de la efectivización del mismo, y las restantes del uno (1) al (10) diez de cada mes siguiente. El vencimiento operará el primer día hábil siguiente, si el último día del plazo fuera inhábil.-
ARTICULO 4º.-  A los efectos del otorgamiento, tendrán prioridad las solicitudes de préstamos nuevos frente a las de renovaciones. A su vez, en los casos de renovaciones, será condición para acceder a la misma tener al menos amortizado el cincuenta por ciento (50 %) del capital objeto del préstamo que se pretende renovar.-  
ARTÍCULO 5º.- Los préstamos se concederán previa evaluación y aprobación por la Caja acerca de la capacidad económico financiera del solicitante, aptitud del avalista presentado y antecedentes de pago de préstamos anteriores, pudiéndose requerir la presentación de dos avalistas cuando el primer ofrecido no reúna condiciones de suficiente solvencia.  El/los avalista/s no podrá ser afiliado de la Caja ni cónyuge del afiliado. Se documentarán en un pagaré por el importe total del capital prestado, en el que indicará también la tasa de interés y que deberá ser suscripto por el deudor y su avalista.-
ARTÍCULO 6º.- Para acceder a los préstamos, será condición inexcusable no registrar deuda por concepto alguno con la Caja Forense, salvo que se hubieran concedido facilidades para el pago de las mismas.-
ARTÍCULO 7º.- Los interesados deberán presentar una solicitud de préstamo cuyo formulario le será facilitado por la Caja, las que se recepcionarán del uno (1) al quince (15) de cada mes y se efectivizarán el último día del mismo, siguiendo el orden de presentación de las mismas y de acuerdo con los fondos disponibles. Al momento de la presentación de la solicitud, se deberá acreditar la solvencia del avalista. No serán recepcionadas y, en su caso serán devueltas, las solicitudes que no cumplan con los requisitos enunciados en el presente.-
ARTÍCULO 8º.- La falta de pago en término de dos (2) cuotas consecutivas o tres (3) alternadas, podrá determinar la caducidad automática del préstamo y la obligación de su pago total y/o, en su caso, la inhabilitación para obtener otro préstamo por el plazo de dos (2) años, a contar de la cancelación del mismo.-
ANEXO RESOLUCION Nº  1157/2014.-
                                    

                                                                    ..................................
                                                                        Firma  Solicitante
'));
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
$pdf->MultiCell(0,6,utf8_decode("1) LA SOLICITUD DE PRÉSTAMO  Nº ......... DEL AFILIADO INSCRIPTO EN LA CAJA BAJO EL CÓDIGO PROFESIONAL ........... SE FIRMÓ EN MI PRESENCIA


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
MES DE ....................... AÑO ....................."));
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

$pdf->SetFont('Arial','',11);
$pdf->Cell(60);
$pdf->Ln(40);
$pdf->MultiCell(0,6,utf8_decode('A LA VISTA PAGARE a la CAJA FORENSE DE LA PAMPA SIN PROTESTO (Art.50 Decreto Ley 5.965/63) la cantidad de '.strtoupper($impEnLetras).'.- ($ '.number_format($importe, 2).'.-) por igual valor recibido a mi entera satisfacción. La suma a pagar devengará intereses compensatorios, a tasa variable, equivalentes al 80 % de la tasa de interés que aplica el Banco de La Pampa S.E.M.en la línea de préstamos Credisueldo -Segmento III- y se incrementará en un 50% más en caso de retraso. A la fecha, la tasa de interés de origen del presente es del 33% anual (TNA), la que se incrementa a 49.5% en caso de retraso.
Dejamos expresamente aclarado, en nuestro carácter de libradora y avalista, respectivamente, que de conformidad con lo dispuesto en el Art. 36 del Decreto Ley 5.965/63, ampliamos el plazo de presentación del presente hasta un máximo de cinco (5) años, a contar desde la fecha de libramiento indicada.
Pagadero en 25 de Mayo nº 246 de la ciudad de Santa Rosa, Provincia de La Pampa.

    
                           ............................................                        ............................................
                                  Firma del Librador                                        Firma del Avalista
                                  Librador:                                                      Librador:

                                  Domicilio:                                                     Domicilio:
'));

if($debito=="debito")
    {//paginas debito automatico
    $pdf->AddPage();
    $pdf->image('form001.jpg',0,0,210,300);
    $pdf->AddPage();
    $pdf->image('form002.jpg',0,0,210,300);
    }

////////////////////////////////////////////////////////////////////////
$pdf->Output();



function impo_lets($importe) {
        $unid=array("", "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve", "diez", "once", "doce", "trece", "catorce", "quince", "dieciséis", "diecisiete", "dieciocho", "diecinueve", "veinte", "ventiun", "veintidos", "veintitres", "veinticuatro", "veinticinco", "veintiseis", "veintisiete", "veintiocho", "veintinueve", "treinta");
        $dece=array("cero", "dieci", "veinti", "treinta", "cuarenta", "cincuenta", "sesenta", "setenta", "ochenta", "noventa");
        $cente=array("cero", "cien", "doscientos", "trescientos", "cuatrocientos", "quinientos", "seiscientos", "setecientos", "ochocientos", "novecientos");
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
        }
?>