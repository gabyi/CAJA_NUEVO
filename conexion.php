<?php
$conexion= mysql_connect("www.cforense.org","cfore2","O55ur+wodge") or die ("No se pudo conectar con el servidor");
$db= mysql_select_db("cfore2") or die ("No se puedo conectar a la base de Datos ".mysql_errno());
?>