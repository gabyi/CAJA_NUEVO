<?php

$nombre       = $_REQUEST['nombre'];
$localidad    = $_REQUEST['localidad'];
$paginaActual = $_REQUEST['partida'];
$nroLotes     = 10;
$lista        = '';

include "../conexion.php";

//hago la consulta para saber cuantos elementos tiene
if ($localidad == "" || $nombre == "") {
    if ($localidad == "") {
        $consulta    = mysql_query("SELECT * FROM profesio1 WHERE nombrepro='" . $nombre . "';", $conexion) or die("No se encuentra producto: $buscar " . mysql_errno());
        $nroprofesio = mysql_num_rows($consulta);
    }

    if ($nombre == "") {
        $consulta    = mysql_query("SELECT * FROM profesio1 WHERE locaprof='" . $localidad . "';", $conexion) or die("No se encuentra producto: $buscar " . mysql_errno());
        $nroprofesio = mysql_num_rows($consulta);
    }
} else {

    if($localidad !="" && $nombre !="")
    {

    $consulta    = mysql_query("SELECT * FROM profesio1 WHERE nombrepro='" . $nombre . "' and locaprof='" . $localidad . "';", $conexion) or die("No se encuentra producto: $buscar " . mysql_errno());
    $nroprofesio = mysql_num_rows($consulta);
    }
}
//====================================================================================================================

$nroPaginas = ceil($nroprofesio / $nroLotes);

if ($paginaActual > 1) {
    $lista = $lista . '<li><a href="javascript:buscar(' . ($paginaActual - 1) . ');">Anterior</a></li>';
}
for ($i = 1; $i <= $nroPaginas; $i++) {
    if ($i == $paginaActual) {
        $lista = $lista . '<li class="active"><a href="javascript:buscar(' . $i . ');">' . $i . '</a></li>';
    } else {
        $lista = $lista . '<li><a href="javascript:buscar(' . $i . ');">' . $i . '</a></li>';
    }
}
if ($paginaActual < $nroPaginas) {
    $lista = $lista . '<li><a href="javascript:buscar(' . ($paginaActual + 1) . ');">Siguiente</a></li>';
}

if ($paginaActual <= 1) {
    $limit = 0;
} else {
    $limit = $nroLotes * ($paginaActual - 1);
}

// Hago de nuevo las consultas para paginar con el limite que impongo en nroLotes

if ($localidad != "") {
    $consulta    = mysql_query("SELECT * FROM profesio1 WHERE locaprof='" . $localidad . "' order by nombrepro asc LIMIT $limit, $nroLotes;", $conexion) or die("No se encuentra producto: $buscar " . mysql_errno());
    $nroprofesio = mysql_num_rows($consulta);
} else {
    $consulta    = mysql_query("SELECT * FROM profesio1 WHERE nombrepro='" . $nombre . "' LIMIT $limit, $nroLotes;;", $conexion) or die("No se encuentra producto: $buscar " . mysql_errno());
    $nroprofesio = mysql_num_rows($consulta);
}

while ($fila = mysql_fetch_array($consulta)) {
    //Aca le das el formato a tu respuesta. En ste caso creas una fila con sus respectivas columnas
    $cadena .= '<tr><td>' . $fila['nombrepro'] . '</td><td>' . $fila['domiciprof'] . '</td><td>' . $fila['teprof'] . '</td><td>' . $fila['correoelec'] . '</td><td>' . $fila['locaprof'] . '</td>';
}

if($nroprofesio!=0 && ($localidad!="" && $nombre!=""))
    $cadenas = "";
else
    $cadenas = array($cadena, $lista);

echo json_encode($cadenas);
//echo $lista;

