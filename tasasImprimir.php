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
        Tesas
      </div>        
        
        <div id="panel-cuerpo" class="panel-body">
            <form name="form-sus" class="form-horizontal" method="post" action="" onsubmit="return validacion()">

<!-- =================================================================================================================================-->
                                <!-- Juicio input-->

                <div class="form-group">
                    <div class="col-sm-2 col-md-2 control-label" for="bg1">
                      <h4>Fecha desde</h4>
                    </div>
                    
                    <div class="col-sm-2 col-md-2">
                        <input type="text" id="month1" name="month1" class="monthPicker">                    
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 col-md-4 control-label" for="bp1">
                      <h4>Bienes Propios</h4>
                    </div>

                </div>


                <div class="form-group">
                  <div class="col-sm-12 col-md-12" style="text-align:center;">
                  <button style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-info  btn-lg" name="calcular1" onclick= "doSend()">Calcular de Sucesiones</button>
                  <!--<a href="montosJuicios.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Volver a Calculo de Juicios</button></a>-->
                                </div>
                </div>

                        </form>
        </div>
    </div>

<?php

  if(isset($_POST['calcular1']))
    {

      include 'php/sucesiones.php';
      include 'tabla1.php';
    
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

        onClose: function(dateText, inst) {  //cuando se cierra el datepicker
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
                

            }
    });

   $("#month1").datepicker("option", "maxDate", <?php
          $day   = date('d');
          $month = date('m');
          $year  = date('Y');
          print '"' . date("d/m/Y", (mktime(0, 0, 0, $month + 1, 1, $year) - 1)) . '"';?>); //toma el ultimo dia del mes actual

      $("#month2").datepicker("option", "maxDate", <?php
          $day   = date('d');
          $month = date('m');
          $year  = date('Y');
          print '"' . date("d/m/Y", (mktime(0, 0, 0, $month + 1, 1, $year) - 1)) . '"';?>); //toma el ultimo dia del mes actual


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