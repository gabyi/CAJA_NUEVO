<?php
session_start();
?>
<?php



  if($_SESSION['user']=="" && !isset($calcular))  //lo puse asi para que si se accede desde 0 te manda al index si apretas enviar entra
  {
    include'redir.php';
  }else /*<!-- aca termina el if si no paso por el index*/
{
?>

<!DOCTYPE html>
<html lang="en">

  <head>
     <?php
      include 'head2.php';
      include 'conexion.php';
      ?>
      <!--mi estilo -->
    <link href="css/mestilocalculo.css" rel="stylesheet">

    <!--script para validar las fechas y los valores numericos-->

    <script scr="js/validar_interes.js" type="text/javascript"></script>

  <title>Presupuesto de Sucesiones</title>
  </head>

  <body>



  <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

		        <a id="marca" class="navbar-brand" href="index.php"><h4>Caja Forense de La Pampa</h4></a>

		</div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="institucional.php">Institucional</a></li>
            <li><a href="institucional.php#comision">Comisi&oacute;n de J&oacute;venes</a></li>
            <li><a href="contacto.php">Contacto</a></li>
          </ul>
        </div><!-- /.nav-collapse -->

       </div><!-- /.container -->
    </nav><!-- /.navbar -->
<?php
include 'logo.php';

?> <!-- php para las sucesiones-->

<div class="container" style="margin-top: 80px;">

	<div id="" class="panel panel-default">
  		<div class="panel-heading">
        C&aacute;lculo de intereses
      </div>   		
  		
  		<div id="" class="panel-body">
    		<form name="frmSample" class="form-horizontal" method="post" onSubmit="return ValidateForm()">

     <!-- =================================================================================================================================-->
								<!-- Juicio input-->

                <div class="form-group">
                    <div class="col-md-3 col-sm-3 control-label" for="carat">
                      <h4>Car&aacute;tula</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">
            
                       <input type='text' class='form-control' id='carat' name='carat' placeholder='' value=''>
                      
                    </div>

                    <div class="col-md-2 col-sm-2 control-label" for="fechcalc">
                      <h4>Fecha C&aacute;lculo</h4>
                    </div>

                    <div class="col-sm-3 col-md-3">

                      <input type="date" class="form-control" id="fachacalc" name="fechacalc" placeholder="dd/mm/aaaa" value="">

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3 col-md-3 control-label" for="concep">
                      <h4>Concepto</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="concep" name="concep" placeholder="" value="">
                    </div>


                    <div class="col-md-2 col-sm-2 control-label" for="fechcalc">
                      <h4>Fecha Origen</h4>
                    </div>

                    <div class="col-sm-3 col-md-3">

                      <input type="date" class="form-control" id="fechaorig" name="fechaorig" placeholder="dd/mm/aaaa" value="">

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3 col-md-3 control-label" for="importe">
                      <h4>Importe</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="importe" name="importe" placeholder="" value="">
                    </div>


                    <div class="col-md-2 col-sm-2 control-label" for="fechcalc">
                      <h4>M&eacute;todo de C&aacute;lculo</h4>
                    </div>

                    <div class="col-sm-3 col-md-3">                      

                        <select name="programa" class="form-control" id="tasalist" name="fechacalc" placeholder="" value="">    
                            <option value="mix" selected="selected">Tasa Mix</option>
                            <!--<option value="bna">Activa BNA</option>
                            <option value="blp">Activa BLP</option> -->
                        </select>

                    </div>
                </div>

							  <div class="form-group">
                  <div class="col-sm-12 col-md-12" style="text-align:center;">
                  <button style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-info  btn-lg" name="calcular1" onclick="control()">Calcular Intereses</button>
                  <!--<a href="montosJuicios.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Volver a Calculo de Juicios</button></a>-->
								  </div>
                </div>

						</form>
  		</div>
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

<script language = "Javascript">

/**
 * DHTML date validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/datevalidation.asp)
 */
// Declaring valid date character, minimum year and maximum year
var dtCh= "/";
var minYear=1900;
var maxYear=2100;

function isInteger(s){
  var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
  var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){   
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function daysInFebruary (year){
  // February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
  for (var i = 1; i <= n; i++) {
    this[i] = 31
    if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
    if (i==2) {this[i] = 29}
   } 
   return this
}

function isDate(dtStr){
  var daysInMonth = DaysArray(12)
  var pos1=dtStr.indexOf(dtCh)
  var pos2=dtStr.indexOf(dtCh,pos1+1)
  var strDay=dtStr.substring(0,pos1)
  var strMonth=dtStr.substring(pos1+1,pos2)
  var strYear=dtStr.substring(pos2+1)
  strYr=strYear
  if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
  if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
  for (var i = 1; i <= 3; i++) {
    if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
  }
  month=parseInt(strMonth)
  day=parseInt(strDay)
  year=parseInt(strYr)
  if (pos1==-1 || pos2==-1){
    alert("La fecha deberia ser del formato : dd/mm/yyyy")
    return false
  }
  if (strMonth.length<1 || month<1 || month>12){
    alert("Por favor ingrese un mes valido")
    return false
  }
  if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
    alert("Por favor ingrese un dia valido")
    return false
  }
  if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
    alert("El año debe ser entre "+minYear+" y "+maxYear)
    return false
  }
  if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
    alert("Por favor ingrese una fecha valida")
    return false
  }
return true
}

function ValidateForm(){
  var dt=document.frmSample.fechaorig
  if (isDate(dt.value)==false){
    dt.focus()
    return false
  }
    return true
    
 }

 function control(){
  if(ValidateForm())
  {
   document.all.item("form-sus").action="calculoint.php";
  }
 }

</script>