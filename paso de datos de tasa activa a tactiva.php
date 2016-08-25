<html>
<head>
  <title></title>
</head>
<body>

  <h3>paso de datos de tasa activa a tactiva</h3>
  <?php 
    include 'conexion.php';

   ?>
  <form method="post" action="index2.php">
    <button type="submit" name="calcular" id="calcular">Pasar datos</button>
  </form>
   <?php 

   if (isset($calcular)) {
    $consulta="select * from TasaActiva";
    $query=mysql_query($consulta) or die ("no se puedo hacer la consulta");
    $filas= mysql_num_rows($query);
    print $filas;
    

    for ($i=0; $i < $filas; $i++) { 
      $fila=mysql_fetch_array($query);
      $inserto = 'insert into tactiva values ("'.$fila['hasta'].'","'.$fila['tasa'].'")';
      $queryinsert= mysql_query($inserto) or die ('no se pudo insertar dato');
      print "fecha: ".$fila['hasta']." , tasa: ".$fila['tasa']." <br>";
    }

   } 
   
    ?>
</body>
</html>