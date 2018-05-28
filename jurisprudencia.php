<?php
//session_start();
?>
<?php
include "conexion.php";

    //$consulta=mysql_query('select * from profesio1 order by nombrepro asc', $conexion) or die("No se encuentra profesionales" . mysql_errno());


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
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]
    <script src="assets/js/ie-emulation-modes-warning.js"></script>-->

  
    <link href="css/jquery-ui.css" rel="stylesheet">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" media="screen" />
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/jquery.min.js" type="text/javascript"></script>


  

    </head>
    <?php 

    include 'conexion.php';

  ?>
  <body>

<?php

include 'navbar.php';

?>

<div class="container" id="containerCuerpo">

        <div id="panel" class="panel panel-default">
        <div class="panel-heading">
            Profesionales
        </div>
        <div id="panel-cuerpo" class="panel-body" id="montos">

            <div class="col-md-4 col-sd-4">
                <label for="profesional">Buscar en Título</label>

                  <!--<input type="text" id="codigo" onChange="buscar();" placeholder="Buscar"/>-->
                                    
                <input id="titulo" name="titulo" type="text" placeholder="Ingrese palabra" class="form-control" value="" required autofocus/> <br>
                  
                  
            </div>

            <div class="col-md-4 col-sd-4">
                <label for="profesional">Buscar en Sumario</label>



                <input id="sumario" name="sumario" type="text" placeholder="Ingrese palabra" class="form-control" value=""/> <br>
                  
                  
            </div>

            <div class="col-md-4 col-sd-4">
                <label for="profesional">Buscar en Fallo</label>


                                    
                <input id="fallo" name="fallo" type="text" placeholder="Ingrese palabra" class="form-control" value="" /> <br>
                  
                  
            </div>



            <button style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-info  btn-lg" name="buscar" onClick="clearInput();">Buscar</button>
      </div>

    </div>


<!--<div id="imgLOAD" style="text-align:center;">
<b>Cargando...</b>
<img src="imagenes/loadingbar-grey.gif" />
</div>-->

<div id="panel_grilla" class="panel panel-default">

    <!--<div id="panel-cuerpo" class="panel-body" id="montos">-->
        
        <table id="grilla" class="table-vertical"> <!-- la Clase es table-vertical por el estilo para que sea responsive, sin bootstrap-->
            <thead>
            <tr>
            <th>Título</th>
            </tr>
            </thead>
        <tbody>
        </tbody>
        </table>
        
    <!--</div>-->
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
    
    function buscarProfesional(){

        var titulo=$("#titulo").val();
        var sumario=$("#sumario").val();
        var fallo=$("#fallo").val();
        var tipo="jurisprudencia";

    /*alert(titulo);
    alert(sumario);
    alert(fallo);
    alert(tipo);*/
    //if(/^([0-9])*$/.test(code)) // Aca hago cumplir mi patron de codigo a buscar, podes obviarlo. Es solo un if

        $.post('php/destinoAjax.php', {"campo1":titulo, "campo2":sumario, "campo3":fallo, "tipo":tipo},
        function(mensaje)
        {
            if(mensaje!="")
            {
                //$("#grilla tbody").html(mensaje);

                var array= eval(mensaje);

                $("#grilla tbody").html(array[0]);
                //$("#profesio").val("");
               // $('#localidad').val("");
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
                
                
            }
            else
                {
                    $("#mensaje").html("<br><strong style='color:rgba(247,145,0,0.72)'>"+titulo+" en "+sumario+" </strong> "+" no se encuentran en la base de datos.");
                    $("#sumario").val("");
                    $("#titulo").val("");
                    $("#fallo").val("");
                }
        $("#titulo").val("");
        $("#sumario").val("");
        $("#fallo").val("");
        
        });
    }

//BORRA LA TABLA Y LA REESCRIBE PARA VOLVERLA A LLENAR
 function clearInput(){

    var titulo=$("#titulo").val();
    var sumario=$("#sumario").val();
    var fallo=$("#fallo").val();
    
    var texto="<table id='grilla' class='table-vertical'><thead><tr><th>Título</th></tr></thead><tbody></tbody></table>";

    $('#panel_grilla').html(texto);


    if(titulo=="" && sumario=="" && fallo=="")
        alert("No hay datos para buscar");
    else
        buscarProfesional(); 

        
        
 }


</script>