<?php
session_start();

if($_SESSION['user']=="")
{
		include'redir.php';
}
else
	{
?>

<!DOCTYPE html>
<html lang="en">
  <?php
  	include 'head.php';

  	include 'conexion.php';

  ?>
  <body>

  </body>

  <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

		        <a class="navbar-brand" href="index.php">Caja Forense de La Pampa</a>

		</div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Inicio</a></li>
             <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Institucional <span class="caret"></span></a>
              	<ul class="dropdown-menu" role="menu">
              		<li><a href="#">Creacion y objetivos</a></li>
              		<!--<li class="divider"><li> Este se pone para hacer una linea divisoria entre los li-->
              		<li><a href="#">Autoridades</a></li>
              		<li><a href="#">Marco normativo y financiamiento</a></li>
              		<li><a href="#">Coordinadora de cajas</a></li>
             	</ul>
             </li>
			      <li class="active"><a href="montosJuicios.php">Costos de juicios</a></li>
                  <li><a href="contacto.php">Contacto</a></li>
          </ul>
        </div><!-- /.nav-collapse -->

       </div><!-- /.container -->
    </nav><!-- /.navbar -->
<?php
include 'logo.php';
?>

<div class="container " style="height: 380px; padding-top: 80px;">
	
	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">Costos de Juicios</h3>
  		</div>
  		<div class="panel-body" id="montos">
    		<form class="form-horizontal" action="contacto.php" method="post">
							
								<!-- Juicio input-->
								<div class="form-group">
									<label class="col-md-3 col-sm-3 control-label" for="juicio">Tipo de Juicio</label>
									<div class="col-md-4 col-sd-4">
									<input id="juicio" name="juicio" title="Por favor ingrese tipo de juicio" 
                  type="text" placeholder="Ingrese Juicio" class="form-control" list="juicios" required autofocus/>
                    <datalist id="juicios">
                      <?php

                          $consulta="select * from ValoresCajaRentas";
                          $result=mysql_query($consulta, $conexion);
                          $n= mysql_num_rows($result);
                          $i=0;

                          for($i;$i<=$n;$i++)
                          {
                            $fila= mysql_fetch_array($result);
                            print ('<option label="'.$fila["materia"].'" value="'.$fila["materia"].'"/>');
                          }

                      ?>
                    </datalist>
									</div>
								</div>

								<!-- Monto input-->
								<div class="form-group">
									<label class="col-md-3 col-sm-3 control-label" for="monto">Monto del Juicio</label>
									<div class="col-md-3 col-sm-3">
										<input id="monto" name="monto" title="Ingrese Monto" type="monto" placeholder="Monto" class="form-control" required>
									</div>
								</div>

            
                <input type="text" list="animales" id="caja"/>
                  <datalist id="animales">
                      <option label="Carnivoro" value="Perro" data-id="1"/>
                      <option label="Herbivoro" value="Caballo" data-id="2"/>
                      <option label="Carnivoro" value="Oso" data-id="3"/>
                      <option label="Carnivoro" value="Mapache" data-id="4"/>
                      <option label="Herbivoro" value="Reno" data-id="5"/>
                  </datalist>


							  <div class="form-horizontal">
                  <button type="submit" class="btn btn-info  btn-lg"name='calcular'>Calcular</button>
								</div>
 							
						</form>
  		</div>
	</div>
</div>						
<?php
include 'footer.php';
	}/*termina el else de que si no hay session disponible, o si no entro por el index */
?>

