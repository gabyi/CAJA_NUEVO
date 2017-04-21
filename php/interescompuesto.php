<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Calculo compuesto</title>
</head>
<body>
	<form action="interescompuesto.php" method="post">
		<select name="saltos" id="saltos">
			<option value="15" selected="selected">15</option>
        	<option value="30">30</option>
        	<option value="60">60</option>
        	<option value="90">90</option>
		</select>
		
		<select name="tipoTasa" id="saltos">
			<option value="intCapitalizacion" selected="selected">Interes Capitalizacion</option>
			<option value="mensCompuesto">Interes  Mensual Compuesto</option>
		</select>

		<input type="text" name="importe" id="importe" placeholder="importe" required>
		<input type="text" name="tasa" id="tasa" placeholder="tasa" required>
		<input type="text" name="dias" id="dias0" placeholder="cant de dias0 de computo" required>
		<input type="text" name="dias" id="dias1" placeholder="cant de dias1 de computo" required>
		<input type="submit" name="boton" id="boton" value="boton de calculo">
	</form> 

	<?php 
date_default_timezone_set('UTC');
	if(isset($_POST['boton'] ) && $_POST['tipoTasa']=="intCapitalizacion")
	{
	
	$saltos=$_POST['saltos'];
	$tasa=$_POST['tasa']/100;
	$importe=$_POST['importe'];
	$dias1=$_POST['dias1'];
	$dias0=$_POST['dias0'];

	$difSegundos= $dias1-$dias0;
    $dias=intval($difSegundos/60/60/24);

    echo "Esta es la diferencia en dias que esta implementada: ".$dias."===============<br>";


	/*tengo que saber la cantidad de dias los cuales los tengo que dividir por los saltos,
	pero que pasa cuando la division no da exacta??
	quizas tenga que sacar la cuenta exacta, y el */

	//Le resto un dia por el dia de gracia que tiene como pago

	$dias--;

	//Calculo la cantidad de saltos que tiene que dar la funcion (cantidad de veces que se computa el interes) para K.(1+i)^n 

	$n= $dias/$saltos;


	//saco el resto para saber si hay dias en el medio

	$reston=$dias%$saltos;
	if($reston<0)
        $reston=$reston*(-1);

	//Tengo que sacar los dias que quedan en el medio
	$tasa0=(1+$tasa)**$n; // es la tasa final
	if($reston!=0)
	$tasa1=($tasa/$reston);

	$final1=$importe*$tasa0;

    //$final1 es el saldo + interes  

	$final1=round($final1,2);
	

	//saco el calculo de los dias que quedan en medio y lo sumo 

	$final2= $importe*$tasa1;

	$tasaTotal=$tasa0+$tasa1;

	$final=$final1+$final2;

	echo "los Saltos son:".$saltos."<br>";
	echo "el resto de los dias: ".$reston."<br>";
	echo "Tasa Final :".$tasaTotal."<br>";
	echo "El importe :".$importe."<br>";
	

	echo "La tasa es :".$final;

	}

	if (isset($_POST['boton']) && $_POST['tipoTasa']== "mensCompuesto") 
	{
		echo "Mensual Compuesto";
	}

$fecha="2000-11-28";
$segundos=strtotime($fecha) - strtotime('now');
$diferencia_dias=intval($segundos/60/60/24);
echo "La cantidad de días entre el ".$fecha." y hoy es <b>".$diferencia_dias."</b>";
	 ?>


</body>
</html>
