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
    <!--<script src="js/cajascript.js" type="text/javascript"></script>-->

  

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
                  
                <input id="localidad" name="localidad" title="Por favor ingrese localidad"
                type="text" placeholder="Ingrese localidad" class="form-control" list="localidad" value=""/> <br>
            </div>

            <button style="background: url(imagenes/logos/fondo_azul.png);" type="submit"  onClick="Javascript:buscar();" class="btn btn-info  btn-lg" name="calcular">Buscar Profesional</button>
      </div>

    </div>


<!--<div id="imgLOAD" style="text-align:center;">
<b>Cargando...</b>
<img src="imagenes/loadingbar-grey.gif" />
</div>-->

<div id="panel" class="panel panel-default">

    <!--<div id="panel-cuerpo" class="panel-body" id="montos">-->
        
        <table id="grilla" class="table-vertical"> <!-- la Clase es table-vertical por el estilo para que sea responsive, sin bootstrap-->
            <thead>
            <tr>
            <th>Nombre y Apellido</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Localidad</th>
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



function buscar()
{
    
    var nombre=$("#profesio").val();
    var localidad=$("#localidad").val();
    
    //if(/^([0-9])*$/.test(code)) // Aca hago cumplir mi patron de codigo a buscar, podes obviarlo. Es solo un if
    //{
        $.post('php/destino1.php', {"nombre":nombre, "localidad":localidad},
        function(mensaje)
        {
            if(mensaje!="")
            {

                var array= eval(mensaje);

                $("#grilla tbody").html(array[0]);
                $("#pagination").html(array[1]);
                $("#profesio").val("");
        /*$("#localidad").val("");
                $("#grilla tbody").append(array[0]); estos se usan para concatenar a lo que ya habia
                $("#grilla1 tbody").append(array[1]); estos se utilizan para concatenar a los que ya habian
                $("#mensaje").html("");
                $("#profesio").focus();*/
                
            }
            else
                {
                    $("#mensaje").html("<br><strong style='color:rgba(247,145,0,0.72)'>"+nombre+" en "+localidad+" </strong> "+" no se encuentran en la base de datos.");
                    $("#localidad").val("");
                    $("#profesio").focus(); 
                }

        });
    /*}
    else
        {
            $("#mensaje").html("<strong style='color:rgba(247,145,0,0.72)'>"+code+"</strong>"+"  no es un codigo v&aacute;lido");
            $("#codigo").val("");
            $("#codigo").focus();
        }*/

}


$('#grilla').dataTable({
    "lengthMenu": [5, 10, 15, 20, 25],  
     
            "language": {  
     
            "oPaginate": {
     
                "sFirst":    "Primero",
     
                "sLast":     "Último",
     
                "sNext":     "Siguiente",
     
                "sPrevious": "Anterior"
     
            }
}}  );





 
</script>


