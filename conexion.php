<?php
$conexion = mysqli_connect("179.43.116.126", "cfore2", "Ncujsd5236s") or die("No se pudo conectar con el servidor"); // para donweb
//$conexion = mysql_connect("179.43.127.242", "cfore2", "tomasWEB1@") or die("No se pudo conectar con el servidor"); // para tomasweb
$db       = mysql_select_db("cfore2_cfore2") or die("No se puedo conectar a la base de Datos " . mysql_errno());
mysql_query("SET NAMES 'utf8'");
/*$conexion = mysqli_connect("cfore2.veriomysql.com", "cfore2_cfore2", "O55ur+wodge", "cfore2_cfore2");
if (!$conexion) {
echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
exit;
}*/
