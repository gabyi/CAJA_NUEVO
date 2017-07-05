<?php
//session_start();
?>
<?php
include "conexion.php";

    $consulta=mysql_query('select * from profesio1 order by nombrepro asc', $conexion) or die("No se encuentra profesionales" . mysql_errno());


  /*if($_SESSION['user']=="")  //lo puse asi para que si se accede desde 0 te manda al index si apretas enviar entra
  {
    include'redir.php';
  }else /*<!-- aca termina el if si no paso por el index*/
{

  
?>

<html lang="es">

    <head>
    
    <meta charset="UTF-8" lang="es">

    <?php 
        include 'head2.php';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="imagenes/logo.ico"/>



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

        <div id="panel" class="panel panel-default">
        <div class="panel-heading">
            Profesionales
        </div>
        <div id="panel-cuerpo" class="panel-body" id="montos">


                                    
                                    <div class="col-md-6 col-sd-6">
                    <label for="profesional">Nombre del Profesional</label>

                  <!--<input type="text" id="codigo" onChange="buscar();" placeholder="Buscar"/>-->
                                    
                  <input id="profesio" name="profesio" title="Por favor ingrese tipo de profesio"
                  type="text" placeholder="Ingrese profesio" class="form-control" list="profesionales" value="" required autofocus/> <br>
                  
                  
                                    </div>

                  <div class="col-md-6 col-sd-6">
                    <label for="profesional">Localidad</label>

                  <!--<input type="text" id="codigo" onChange="buscar();" placeholder="Buscar"/>-->
                  
                    <input id="localidad" name="localidad" title="Por favor ingrese localidad"
                    type="text" placeholder="Ingrese localidad" class="form-control" list="localidad" value=""/> <br>
                  
                  
                  </div>
      
      </div>

    </div>


<div id="imgLOAD" style="text-align:center;">
<b>Cargando...</b>
<img src="imagenes/loadingbar-grey.gif" />
</div>

    
        <div id="panel" class="panel panel-default">
        <div class="panel-heading">
            <h4>Profesionales</h4>
        </div>

    <div id="panel-cuerpo" class="panel-body" id="montos">
        
        <table id="grilla" class="table-vertical"> <!-- la Clase es table-vertical por el estilo para que sea responsive, sin bootstrap-->
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
                    echo ('<tr><td>'.$fila['nombrepro'].'</td><td>'.$fila['domiciprof'].'</td><td>'.$fila['teprof'].'</td><td>'.$fila['correoelec'].'</td><td>'.$fila['locaprof'].'</td></tr>');
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
document.getElementById("grilla_filter").style.display="none";
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

        oTable = $('#grilla').DataTable();

//busca desde text profesio en la columna de profesionales

        $('#profesio').on( 'keyup', function () {
            oTable
                .columns( 0 )
                .search( this.value )
                .draw();
        } );

//busca desde el text localidad en la columna de localidades

        $('#localidad').on( 'keyup', function () {
            oTable
                .columns( 4 )
                .search( this.value )
                .draw();
        } );

    } );
 


 
</script>


