<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

        <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" />


    <!--Estilos de fuentes-->
    <link href="css/fuentes.css" rel="stylesheet">

    <!--mi estilo -->
    <link href="css/miestilo.css" rel="stylesheet">

    <title>Tasas</title>

    <?php 
        include 'conexion.php';
        include 'head2.php';
        include 'navbar.php';
     ?>
</head>

<?php
include 'navbar.php';

?> <!-- php para las sucesiones-->

<div class="container" id="containerCuerpo">

    <div id="panel" class="panel panel-default">
        <div class="panel-heading">
        Tasas
      </div>        
        
        <div id="panel-cuerpo" class="panel-body">
            <form name="form-sus" class="form-horizontal" method="post" action="" onsubmit="return validacion()">

<!-- =================================================================================================================================-->
                                <!-- Juicio input-->

                <div class="form-group">
                    <div class="col-sm-6 col-md-6" for="month1">
                      <h4>Fecha desde</h4>
                    
                        <input type="text" id="month1" name="month1" class="monthPicker">                    
                    </div>

                    <div class="col-sm-6 col-md-6 " for="bmonth2">
                      <h4>Fecha hasta</h4>
               
                        <input type="text" id="month2" name="month2" class="monthPicker">                    
                    </div>
                </div>
                


                <div class="form-group">
                  <div class="row" style="text-align:center;">
                    <button style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-info  btn-lg" name="descarga" onclick= "">Descargar</button>
                  <!--<a href="montosJuicios.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Volver a Calculo de Juicios</button></a>-->
                  </div>
                </div>

            </form>
        </div>
    </div>

<?php

  if(isset($_POST['descarga']))
    {

      $fechaDesde= $_REQUEST['month1'];
      $fechaHasta= $_REQUEST['month2'];
      
      ?>
  <div id="panel" class="panel panel-default">
    <div id="panel-cuerpo" class="panel-body">

     <div class="table-responsive">
        <table class="table">
          <tr>
            <th>Fecha</th>
            <th>%</th>
          </tr>                        
          <tr>
            <td>31/05/2018</td>
            <td>1.92</td>
          </tr>
        </table>
      </div>
    
    </div>
  </div>

      <?php     
    } 
    

echo "</div>";

 

echo ("</div>");

include 'footer.php';
include 'footer1.php';
  
?>
  </body>
  </html>
<script language = "Javascript">

$(document).ready(function()
{   
    $(".monthPicker").datepicker({

        dateFormat: 'MM-yy',
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,

        onClose: function() {  //cuando se cierra el datepicker
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).val($.datepicker.formatDate('MM-yy', new Date(year, month, 1)));
            
            var hoy=new Date(); //creo una nueva fecha
            //hoy.setMonth(hoy.getMonth()+1); //le seteo el mes y le sumo uno . Anda a fin de año, le suma un año y el mes
            var mes = hoy.getMonth();  
            var anio= hoy.getFullYear();
            var fecha_actual = String((mes+1)+"-"+anio);

            if(new Date(year, month) >= hoy)
            {
                alert("La fecha ingresada en fecha hasta debe ser menor o igual al mes: "+ fecha_actual);
                $(this).val("");
            }
              
            if($("#month1").val()!="" && $("#month2").val()!="") 
              alert("el mes de desde esta vacio");

          }
    });



$.datepicker.regional['es'] = 
  {
    closeText: 'Listo',
    currentText: 'Hoy', 
    prevText: 'Previo', 
    nextText: 'Próximo',  
    monthNames: ['01','02','03','04','05','06',
    '07','08','09','10','11','12'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
    'Jul','Ago','Sep','Oct','Nov','Dic'], 
    initStatus: 'Selecciona la fecha', isRTL: false,
    orientation: 'bottom auto'};
    $.datepicker.setDefaults($.datepicker.regional['es']);
 
    $(".monthPicker").focus(function () {
    $(".ui-datepicker-calendar").hide();
    $("#ui-datepicker-div").position({
        my: "center top",
        at: "center bottom",
        of: $(this)
            });
        });
  });



</script>