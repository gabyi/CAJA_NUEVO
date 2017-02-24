<?php
//Base de datos
$conexion= mysql_connect("179.43.127.242","cfore2","tomasWEB1@") or die ("No se pudo conectar con el servidor");
$db= mysql_select_db("cfore2_cfore2") or die ("No se puedo conectar a la base de Datos ".mysql_errno());
//mysql_query("SET NAMES 'utf8'");
date_default_timezone_set('UTC');

//fecha de la exportación
$fecha = date("d-m-Y");
$consulta= "SELECT * FROM tmix";
$resultado= mysql_query($consulta) or die ("No se puedo hacer la consulta en pàso 3 de consultadetasas.php");;

/** Incluir la libreria PHPExcel */
require_once 'PHPExcel.php';

// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades
$objPHPExcel->getProperties()
->setCreator("Cattivo")
->setLastModifiedBy("Cattivo")
->setTitle("Documento Excel de Prueba")
->setSubject("Documento Excel de Prueba")
->setDescription("Demostracion sobre como crear archivos de Excel desde PHP.")
->setKeywords("Excel Office 2007 openxml php")
->setCategory("Pruebas de Excel");


// Agregar Informacion
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'Fecha')
->setCellValue('B1', 'Indice');
//->setCellValue('C1', 'Acumulado')
//->setCellValue('A2', '10')
//->setCellValue('C2', '=sum(A2:B2)');

$row= mysql_fetch_array($resultado);

$count=2;
$vanterior=0;
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A'.$count, $row['fecha'])
->setCellValue('B'.$count, $row['indice']);


while ($row= mysql_fetch_array($resultado))
	{
		$count++;
		
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A'.$count, $row['fecha'])
		->setCellValue('B'.$count, $row['indice']);
	}

// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Tecnologia Simple');

// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);

// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="pruebaReal.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

?>

