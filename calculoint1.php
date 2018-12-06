<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">

  <head>
    <?php
      include 'head2.php';
      include 'conexion.php';
    ?>
    <script src="js/cajascript.js" type="text/javascript"></script>
  <title>Calculo de Intereses</title>
  </head>

  <body>


<div class="container" id="containerCuerpo">



  <div id="" class="panel panel-default">
      <div class="panel-heading">
        C&aacute;lculo de intereses
      </div>

      <div id="" class="panel-body">
       <!--<form name="frmSample" class="form-horizontal" method="post" onSubmit="return ValidateForm()">-->

        <form id="formint" name="frmSample" class="form-horizontal" method="" action="">
     <!-- =================================================================================================================================-->
                <!-- Juicio input-->

                <div class="form-group">
                    <div class="col-md-2 col-sm-2 control-label" for="carat">
                      <h4>Car&aacute;tula</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">

                       <input type='text' class='form-control' id='carat' name='carat' placeholder='' value="">

                    </div>


                    <div class="col-sm-2 col-md-2 control-label" for="concep">
                      <h4>Concepto</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="concepto" name="concepto" placeholder="" value="">
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-md-2 col-sm-2 control-label" for="fechcalc">
                      <h4>Fecha Origen</h4>
                    </div>

                    <div class="col-sm-4 col-md-4">

                      <input class="form-control" id="vfdesde" name="vfdesde" placeholder="DD/MM/AAAA" type="text" value=<?php if (isset($_POST['calcular'])) {print '"' . $vfdesde . '"';}?>>  <!--FECHA PARA EL CALCULO ORIGEN-->

                    </div>

                    <div class="col-md-2 col-sm-2 control-label" for="fechcalc">
                      <h4>Fecha C&aacute;lculo</h4>
                    </div>

                    <div class="col-sm-4 col-md-4">

                     <input class="form-control" id="vfhasta" name="vfhasta" placeholder="DD/MM/AAAA" type="text" value=<?php print($fecha_actual=date("d/m/Y")); if (isset($_POST['calcular'])) {print '"' . $vfhasta . '"';}?>>  <!--FECHA PARA EL CALCULO FIN-->

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2 col-md-2 control-label" for="importe">
                      <h4>Importe</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="importe" name="importe" placeholder="" value="">
                    </div>


                    <div class="col-md-2 col-sm-2 control-label" for="fechcalc">
                      <h4>M&eacute;todo de C&aacute;lculo</h4>
                    </div>

                    <div class="col-sm-4 col-md-4">

                        <select name="tasa" class="form-control" id="tasalist" name="fechacalc" placeholder="" value="" onChange="mirarTasa();">
                            <option value="tmix" selected="selected">Tasa Mix</option>
                            <option value="tactiva">Activa BLP</option>
                            <option value="tpasiva">Pasiva BLP</option>
                            <option value="pactadasimple">Pactada Simple Mensual</option>
                            <option value="compuestaSimple">Interes Compuesta</option>
                            <option value="credisur">Tasa Credisur SRL c/ Sotelo</option>
                        </select>

                    </div>
                </div>

            </form>

            <div class="form-group">
              <div class="col-sm-12 col-md-12" style="text-align:center;">
                <!--<input type="button" style="background: url(imagenes/logos/fondo_azul.png);" class="btn btn-info  btn-lg" name="calcular" onClick="javascript:calcularTasa();" value="Calcular Intereses" />-->
                <input type="button" style="background: url(imagenes/logos/fondo_azul.png);" class="btn btn-info  btn-lg" name="calcular" id="calcular" onClick="verificaDatos();" value="Calcular Intereses" />
                  <!--<a href="montosJuicios.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Volver a Calculo de Juicios</button></a>-->
              </div>
            </div>

      </div>

  </div>

<!--<div id="mensaje"></div> // este es para verificar los datos que entrabas al ajax-->

  <div class="panel panel-default">
      <div class="panel-heading">
        Tabla de C&aacute;lculo de intereses
      </div>

      <div id="intereses" class="table-responsive">
       <!--<form name="frmSample" class="form-horizontal" method="post" onSubmit="return ValidateForm()">-->
        <table class="table" id="grilla">
          <thead>
            <th id="thint">Concepto</th>
            <th id="thint">Método</th>
            <th id="thint">Fecha Origen</th>
            <th id="thint">Fecha Cálculo</th>
            <th id="thint">Tasa</th>
            <th id="thint">Importe</th>
            <th id="thint">Intereses</th>
            <th id="thint">Total</th>
            <th id="thint">Eliminar</th>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <th id="thint">Totales</th><th id="thint"></th><th id="thint"></th><th id="thint"></th><th id="thint"></th><th id="totImporte"></th><th id="totInteres"></th><th id="total"></th><th></th>
          </tfoot>

        </table>
    </div>
    <div class="panel-footer">       
      <button id="boton-noticia" style="background: url(imagenes/logos/fondo_azul.png);" type='button' class='btn btn-info  btn-lg' name='calcular' onclick= 'return imprInt();'>Imprimir</button>       
    </div>
  </div>

</div>

</body>
  </html>
<script language = "Javascript">


$(function($){
$.datepicker.regional['es'] = {
closeText: 'Cerrar',
dateFormat: "dd/mm/yyyy",
prevText: '',
currentText: 'Hoy',
monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
weekHeader: 'Sm',
dateFormat: 'dd/mm/yy',
firstDay: 1,
isRTL: false,
showMonthAfterYear: false,
yearSuffix: '',
orientation: 'bottom auto',
};
$.datepicker.setDefaults($.datepicker.regional['es']);
});

    $("#vfdesde").mask("99/99/9999",{placeholder:"DD/MM/AAAA"});
    $("#vfhasta").mask("99/99/9999",{placeholder:"DD/MM/AAAA"});

    $("#vfdesde").datepicker({
        onSelect: function() {

          var minDate = $(this).datepicker('getDate');

          minDate.setDate(minDate.getDate()+1);

          $("#vfhasta").datepicker("option","minDate", minDate);
          $("#vfhasta").datepicker("option", "maxDate", <?php
          $day   = date('d');
          $month = date('m');
          $year  = date('Y');
          print '"' . date("d/m/Y", (mktime(0, 0, 0, $month + 1, 1, $year) - 1)) . '"';?>); //toma el ultimo dia del mes actual
          //$("#vfhasta").val('');
          //$("#vfhasta").prop('disabled', false);
        }
    });

    $("#vfhasta").datepicker({
      onSelect:function()
                {
                  var hoy=new Date(); //creo una nueva fecha
            //hoy.setMonth(hoy.getMonth()+1); //le seteo el mes y le sumo uno . Anda a fin de año, le suma un año y el mes
            var dia= hoy.getDate();
            var mes = hoy.getMonth();  
            var anio= hoy.getFullYear();
            var fecha_actual = String(dia+"/"+(mes+1)+"/"+anio);
                  //alert("selecciono el datepicker: " +fecha_actual);

                }
    });

    $('#borrar').click(function() {
      $("#vfdesde").val('');
      $("#vfhasta").val('');
    });

function verificaDatos()
  { 
    //saco los datos de los input
    var importe= document.getElementById("importe").value;   
    var tipoTasa= document.getElementById("tasalist").value;
    var fechaOrigen= document.getElementById("vfdesde").value;
    var fechaHasta= document.getElementById("vfhasta").value;

    //convierto a enteros los string
    var importe= parseInt(importe);
    var fechaOrigen= parseInt(fechaOrigen);

    //var fecha= verificoFechas();

    if(tipoTasa=="pactadasimple" || tipoTasa=="compuestaSimple")
    {
      var tasa= document.getElementById("tPactadasimple").value;
      var tasa= parseInt(tasa);
    }else
    {
      var tasa="";
    }
      
    //hago el control si esta la tasa y si no  para que no haga el calculo
    if(tasa.length!=0)
    {
      if(!isNaN(importe) && !isNaN(fechaOrigen) && !isNaN(tasa))
        {
          //calcularTasa();
          verificoFechas();
        }else
        {
          alert("Debe colocar valores en importe, tasa y en fecha de origen.");
        }
    }else
    {
     if(tasa.length=="")
      {
        if(!isNaN(importe) && !isNaN(fechaOrigen))
        {
          //calcularTasa();
          verificoFechas();
        }else
        {
          alert("Debe colocar valores en importe y en fecha de origen.");
        }
      }
    }
    
  }


  function verificoFechas()
  {
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //busco ultima fecha puesta en la base de datos
    <?php 
    $consulta="SELECT fecha FROM tmix order by fecha DESC";
    $query     = mysql_query($consulta) or die("no se puedo hacer la consulta fechas en calculoInt.php *297");
    $fila      = mysql_fetch_array($query);
    $fechaUltiTabla= $fila['fecha'];
    echo ("ultimoDia= '".$fechaUltiTabla."';");//imprimo ulimo dia de la tabla tmix
     ?>
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    f1=$('#vfdesde').val();
    f2=$('#vfhasta').val();
    
    aUltDia= ultimoDia.split('-');
    //alert("ultimo dia de la tabla: "+aUltDia);
    af1=f1.split('/');
    af2=f2.split('/');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //controla que las fechas sean correctas

    if ((af2.length==3) && (af2[3]<100) && (af2[3]>90))
        af2[3]+=1900;
      else 
        if ((af2.length==3) && (af2[3]<90))
          af2[3]+=2000;

    if ((f1.length!=10) ||(af1.length!=3) || (af1[0]<1) || (af1[0]>31) || (af1[1]<1) || (af1[1]>12) || (af1[2]<1991)) 
    {
      alert('Debe introducir una fecha válida');
      $('#vfdesde').focus();
      return false;
    }
    if ((f2.length!=10) || (af2.length!=3) || (af2[0]<1) || (af2[0]>31) || (af2[1]<1) || (af2[1]>12) || (af2[2]<1991)) 
    {
      alert('Debe introducir una fecha válida');
      $('#vfhasta').focus();
      return false;
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    ini=Date.UTC(af1[2],(af1[1]-1),af1[0]);
    ulti=Date.UTC(af2[2],(af2[1]-1),af2[0]);
    ultiDiaMes=Date.UTC(aUltDia[0],(aUltDia[1]-1),aUltDia[2]);

    if (ini>ulti) 
    {
      alert('La fecha de calculo no puede ser menor a la de origen');
      $('#vfdesde').focus();
    }else
    {
        if (ulti>ultiDiaMes)
      {
        alert('La fecha límite de calculo es: '+ aUltDia[2]+'/'+aUltDia[1]+'/'+aUltDia[0]);
        $('#vfhasta').focus();
      }else
      {
        calcularTasa();
      } 
    }
  

  }


  function verDetaJust(porcentajeMix, porcentajeCompensado, porcentajeSimple, importe, que) 
  {

    var fila=$(que).closest("tr"); 
    var concepto=fila.find("td:eq(0)").text(); // get current row 1st TD value
    var fechaOrigen=fila.find("td:eq(2)").text(); // get current row 3rd TD
    var fechaCalc=fila.find("td:eq(3)").text();
    var interes=fila.find("td:eq(4)").text(); 
    var importe=fila.find("td:eq(5)").text();

    window.open("calculoSotelo.php?&concepto="+concepto+"&fOrigen="+fechaOrigen+"&fCalc="+fechaCalc+"&mix="+porcentajeMix+"&compensado="+porcentajeCompensado+"&simple="+porcentajeSimple+"&importe="+importe, "tasaswin","toolbar=0,status=1,menubar=0,left=50,top=100,scrollbars=1,resizable=1,width=670,height=900");

  }

</script>
