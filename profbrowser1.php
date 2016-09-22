<?php
session_start();
?>
<?php
include "conexion.php";

    $consulta=mysql_query("select *  from profesio1 order by nombrepro asc",$conexion) or die("No se encuentra profesionales" . mysql_errno());


  if($_SESSION['user']=="")  //lo puse asi para que si se accede desde 0 te manda al index si apretas enviar entra
  {
    include'redir.php';
  }else /*<!-- aca termina el if si no paso por el index*/
{

    include 'head2.php';
?>
    <head>
    <meta charset="UTF-8" lang="es">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="imagenes/logo.ico"/>



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- fuentes -->
    <link href="css/fuentes.css" rel="stylesheet">

    <!--mi estilo -->
    <link href="css/miestilo.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

  
    <link href="css/jquery-ui.css" rel="stylesheet">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" media="screen" />
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/cajascript.js" type="text/javascript"></script>

  

  

    </head>
    <?php 

    include 'conexion.php';

  ?>
  <body>

<?php

include 'navbarFooter.php';

?>

<div class="container" id="containerCuerpo">

<div id="imgLOAD" style="text-align:center;">
<b>Cargando...</b>
<img src="imagenes/loadingbar-grey.gif" />
</div>

  <div id="panel" class="panel panel-default">
        <div class="panel-heading">
            <h4>Profesionales</h4>
        </div>

    <div id="panel-cuerpo" class="panel-body" id="montos">
    <table id="grilla" class="table table-striped">
        <thead>
        <tr>
        <th>Nombre y Apellido</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Localidad</th>
        </tr>
        </thead>
<tbody>
<?php

   
    while($fila=mysql_fetch_array($consulta))   
    { 
       //Aca le das el formato a tu respuesta. En ste caso creas una fila con sus respectivas columnas
        print ('<tr><td>'.$fila['nombrepro'].'</td><td>'.$fila['domiciprof'].'</td><td>'.$fila['teprof'].'</td><td>'.$fila['correoelec'].'</td><td>'.$fila['locaprof'].'</td></tr>');
    }
    
?>
</tbody>
</table>
</div>
</div>
</div>

<?php

include 'footer.php';
include 'footer1.php';
    }/*termina el else de que si no hay session disponible, o si no entro por el index */

?>
</body>
</html>

<script type="text/javascript">



window.onload = detectarCarga;
function detectarCarga(){
document.getElementById("imgLOAD").style.display="none";
document.getElementById("panel").style.display="visible";
}



    $(document).ready(function() {
     
        $('#grilla').dataTable( {

            "lengthMenu": [5, 10, 15, 20, 25],  
     
            "language": {  
     
            "sProcessing":     "Procesando...",
     
            "sLengthMenu":     "Mostrar _MENU_ registros",
     
            "sZeroRecords":    "No se encontraron resultados",
     
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
     
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
     
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
     
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
     
            "sInfoPostFix":    "",
     
            "sSearch":         "Buscar:",
     
            "sUrl":            "",
     
            "sInfoThousands":  ",",
     
            "sLoadingRecords": "Cargando...",
     
            "oPaginate": {
     
                "sFirst":    "Primero",
     
                "sLast":     "Último",
     
                "sNext":     "Siguiente",
     
                "sPrevious": "Anterior"
     
            },
     
            "oAria": {
     
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
     
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
     
                }
     
        }
     
        
     
        } );
     
    } );
 
</script>
