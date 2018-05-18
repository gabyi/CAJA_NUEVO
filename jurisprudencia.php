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
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

  
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
                <label for="titulo">Título</label>

                  <!--<input type="text" id="codigo" onChange="buscar();" placeholder="Buscar"/>-->
                                    
                <input id="campo1" name="profesio" title="Ingrese profesional" onclick="clearInput();"
                type="text" placeholder="Busar en titulo" class="form-control" list="profesionales" value="" required autofocus/> <br>
                  
                  
            </div>

            <div class="col-md-4 col-sd-4">
                <label for="profesional">Sumario</label>
                  
                <input id="campo2" name="localidad" title="Ingrese localidad" onclick="clearInput();"
                type="text" placeholder="Buscar en sumario" class="form-control" list="localidad" value=""/> <br>
            </div>

               <div class="col-md-4 col-sd-4">
                <label for="profesional">Fallo</label>
                  
                <input id="campo3" name="localidad" title="Ingrese localidad" onclick="clearInput();"
                type="text" placeholder="Buscar en fallos" class="form-control" list="localidad" value=""/> <br>
            </div>

            <a href="php/muestraJuris.php?variable1=Gabriel">Mi enlace</a>

    </div>

<!--<div id="imgLOAD" style="text-align:center;">
<b>Cargando...</b>
<img src="imagenes/loadingbar-grey.gif" />
</div>-->

<div id="panel_grilla" class="panel panel-default">

        
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
        var campo1=$("#campo1").val();
        var campo2=$("#campo2").val();
        var campo3=$("#campo3").val();
        var tipo= "jurisprudencia";

    
           $.post('php/destinoAjax.php', {"nombre":campo1, "localidad":campo2, "campo3":campo3, "tipo":tipo},
        function(mensaje)
        {
            if(mensaje!="")
            {

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
                    $("#mensaje").html("<br><strong style='color:rgba(247,145,0,0.72)'>"+campo1+" en "+campo2+" </strong> "+" no se encuentran en la base de datos.");
                    $("#campo2").val("");
                    $("#campo1").focus(); 
                }
        });
    }

//BORRA LA TABLA Y LA REESCRIBE PARA VOLVERLA A LLENAR
 /*function clearInput(){
    
    var texto="<table id='grilla' class='table-vertical'><thead><tr><th>Nombre y Apellido</th><th>Dirección</th><th>Teléfono</th><th>Localidad</th></tr></thead><tbody></tbody></table>";

    $('#panel_grilla').html(texto);
 }

var profesionales = [
<?php

$consulta="select Titulo from cfjuri"; /*busca todo menos los que tenga suces
$result=mysql_query($consulta, $conexion);
$n= mysql_num_rows($result);
$i=0;


  for($i;$i<=$n;$i++)
  {
    $fila= mysql_fetch_array($result);
    if($fila["nombrepro"]!="")
    {

      print ('"'.$fila["nombrepro"].'",');
     }
  }
?>

];

var localidad = [
    <?php 
      $consulta="select locaprof  from profesio1 group by locaprof order by locaprof asc"; /*busca todo menos los que tenga suces
      $result=mysql_query($consulta, $conexion);
      $n= mysql_num_rows($result);
      $i=0;


      for($i;$i<=$n;$i++)
        {
          $fila= mysql_fetch_array($result);
          if($fila["locaprof"]!="")
        {

          print ('"'.$fila["locaprof"].'",');
          }
        }
    ?>
  ];

$( "#profesio" ).autocomplete({
  source: profesionales
});

$("#localidad").autocomplete({
  source: localidad
});


/*function paginar(tbl,cantidad) {
  $('#' + tbl).each(function() {
    var currentPage = 0;
    var numPerPage = (cantidad) ? cantidad : 15;
    var $table = $(this);
    $table.attr('curPa',currentPage);
    $table.attr('cantidad',numPerPage);
    $table.bind('repaginate', function() {
      currentPage=$(this).attr('curPa') * 1;
      $(this).find('tbody > tr').show().slice(0,(currentPage * numPerPage)).hide().end()
       .slice((((currentPage + 1) * numPerPage) )).hide().end();
      $(this).attr('curPa',currentPage);
    });
    var numRows = $table.find('tbody tr').length;
    var numPages = Math.ceil(numRows / numPerPage);
    var $pager = $('<div class="pager"></div>');
    for (var page = 0; page < numPages; page++) {
      $('<span class="page-number">' + (page + 1) + '</span>').bind('click', {'newPage': page}, function(event) {
         currentPage = event.data['newPage'];
         $table.attr('curPa',currentPage).trigger('repaginate');
         $(this).addClass('active').siblings().removeClass('active');
       }).appendTo($pager).addClass('clickable');
    }
    $pager.find('span.page-number:first').addClass('active');
    $pager.insertBefore($table);
    $table.trigger('repaginate');
  });
}
*/
</script>