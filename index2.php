<html>
<head>
  <title></title>
</head>
<body>

  <h3>paso de datos de tasa activa a tactiva</h3>
  <?php 
    include 'conxion.php';

   ?>
   iniciando
   <?php 
   $consulta="select * from TasaActiva";
   $query=mysql_query($consulta) or die ("no se puedo hacer la consulta");
   $filas= mysql_num_rows($query);

    for ($i=0; $i < $filas; $i++) { 
      
    }

    ?>
</body>
</html>