<?php
/*$conexion= mysql_connect("cfore2.veriomysql.com","cfore2_cfore2","O55ur+wodge") or die ("No se pudo conectar con el servidor");
$db= mysql_select_db("cfore2") or die ("No se puedo conectar a la base de Datos ".mysql_errno());*/
$conexion = mysqli_connect("cfore2.veriomysql.com", "cfore2_cfore2", "O55ur+wodge", "cfore2_cfore2");
if (!$conexion) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>