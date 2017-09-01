<?php

require('php/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('imagenes\\logos\\logPres.jpg',20,8,20);
    // Arial bold 15
    $this->SetFont('Arial','BU',18);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(20,10,'SOLICITUD DE PRESTAMO');
    // Salto de línea
    $this->Ln(22);

    $this->SetFont('Arial','',12);

    $this->Cell(60);

    $this->Cell(0,0,'	Santa Rosa,...........de..........................................de 20.......',0,1,'C');

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'',0,0,'C');
}
}


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Cell(60);
$pdf->Ln(20);
$pdf->MultiCell(0,6,utf8_decode('     Solicito un préstamo de Pesos Cincuenta Mil ($ 25.000) pagadero en 24 cuotas mensuales con aplicación de una tasa de interés de tipo variable, equivalente al 65 % de la tasa que cobra el Banco de La Pampa en el segmento III de la línea de préstamos Credisueldos.
					
					Declaro conocer los términos de las disposiciones que rigen estos préstamos, a las cuales me allano.
					
					El señor ............................................................................ , que también firma la presente, se constituye en avalista de todas obligaciones que asuma.'));
$pdf->Ln(10);
$pdf->SetFont('Arial','BU',18);
$pdf->Cell(80);
$pdf->Cell(20,10,'SOLICITANTE');
$pdf->Ln(20);
$pdf->MultiCell(0,6,utf8_decode(''));
$pdf->Output();
?>
