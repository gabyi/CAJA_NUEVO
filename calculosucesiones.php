     <?php 
      include 'conexion.php';
      $materia=$_REQUEST ['juicio'];
      $monto= $bg1 + $bg2 + $bp1 + $bp2;
      $consulta= mysql_query("select * from ValoresCajaRentas where Materia = 'SUCESION AB-INTESTATO'") or die ("No se pudo realizar la consulta");


      $nfilas= mysql_num_rows($consulta);




      if ($oficio)
        {
          $sel = 1;
        }

      if ($sel == 1)
       {
        $vhonorarios = ($bg1 + ($bg2 / 3 * 2)) * 0.0693 + ($bp1 + ($bp2 / 3 * 2)) * 0.0924;

          if ($oficio)
            {
              $vhonorarios = $vhonorarios / 3;
            }
        }else
        {
          $vhonorarios = ($bg1 + ($bg2 / 3 * 2)) * 0.0495 + ($bp1 + ($bp2 / 3 * 2)) * 0.066;
        }


        if ($sel == 1)
        {
          $poder="Act&uacute;a con Poder";
        }else
         {
          $poder="Act&uacute;a por Derecho Propio";
        }


        if ($oficio)
          {
            $poder=$poder." y Oficio Ley 22.172";
          }

          //consulto la ultima fila de los minimos para sacar el valor actualizado

      $consultaMinimos= mysql_query("select * from minimos") or die ("No se puedo realizar consulta de minimos en sucesiones");

      $nfilas= mysql_num_rows($consultaMinimos);

      for($i=0;$nfilas>$i;$i++)
        {
          $filaMinimos= mysql_fetch_array($consultaMinimos);
        }

      $fila= mysql_fetch_array($consulta);
      $bono_ley= $filaMinimos ['bono_ley'];
      $caja_inicio_aporte= $filaMinimos ['caja_min_aporte'];
      $caja_inicio_cont= $filaMinimos ['caja_min_cont'];

      $sumaCForense= $caja_inicio_aporte + $caja_inicio_cont + $bono_ley;


      $rentas_inicio_general= $filaMinimos ['rentas_inicio_general'];



      //total de inicio

      $sumaInicio= $sumaCForense+$rentas_inicio_general;


      //Costo previo a inscribir

      $caja_fin_aportes= $vhonorarios * 0.15;
      $caja_fin_cont= $monto * 0.005;
      $tasaVariable=($bp1 + $bg1) * ($fila ['rentas_fin_tvariable'] / 100);

      //veo si los al inscribir bienes se necesita cambiar a minimos

        if($caja_fin_aportes < $filaMinimos ['caja_min_aporte']){
          $caja_fin_aportes= $filaMinimos ['caja_min_aporte'];
        }

        if ($caja_fin_cont < $filaMinimos ['caja_min_cont']) {
          $caja_fin_cont= $filaMinimos ['caja_min_cont'];
        }

        if($tasaVariable < $filaMinimos ['rentas_inicio_general']){
          $tasaVariable= $filaMinimos ['rentas_minimo'];
        }

    

    
      //haciendo las sumas de las tablas
      $sumaFinCajaForense= $caja_fin_aportes + $caja_fin_cont;

      if($oficio)
      
        $sumaFin= $caja_fin_aportes + $caja_fin_cont;
      
        else

        $sumaFin= $caja_fin_aportes + $caja_fin_cont + $tasaVariable;

      //casteando los numeros
      $caja_fin_aportes= number_format($caja_fin_aportes, 2);
      $caja_fin_cont= number_format($caja_fin_cont, 2);
      $monto=number_format($monto, 2);
      $vhonorarios=number_format($vhonorarios, 2);
      $tasaVariable=number_format($tasaVariable, 2);
      $sumaFinCajaForense=number_format($sumaFinCajaForense, 2);
      $sumaFin= number_format($sumaFin, 2);
      $sumaCForense= number_format($sumaCForense, 2);
      $sumaInicio= number_format($sumaInicio, 2);
?>