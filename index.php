<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php
 include 'head.php';


?>
  <body>
  	<?php
  		include 'navbar.php';

		  include 'logo.php';
	  ?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div  class="item active">
      <div id="texto-foto" class="col-sm-6 col-md-6">
        <h3>BENEFICIOS CON COMERCIOS LOCALES</h3>
        <p>Para más informacion sobre estos beneficios <a href="archivos/descuentos.jpg">ver imagen</a>.</p>
      </div>
      <div id="foto-foto" class="col-sm-6 col-md-6">
        <img class="img-thumbnail" src="archivos/descuentos.jpg" alt="Chania">
      </div>
    </div>

    <div class="item">
      <div id="texto-foto" class="col-sm-6 col-md-6">
        <h3>Taller de Mediaci&oacute;n</h3>
        <p>Para más informacion sobre este taller <a href="archivos/TALLER_DE_COMEDIACION_FAMILIAR_A_DISTANCIA_PROGRAMA.pdf">ver el programa</a>.</p>
      </div>
      <div id="foto-foto" class="col-sm-6 col-md-6">
        <img class="img-thumbnail" src="archivos/taller_de_mediacion.jpg" alt="Chania">
      </div>
    </div>

    <div class="item">

      <div id="texto-foto" class="col-sm-6 col-md-6">
        <h3>Ojo con el cuco</h3>
        <p>Texto de prueba para que mira Fiolela</p>
      </div>
      <div id="foto-foto" class="col-sm-6 col-md-6">
        <img class="img-thumbnail" src="imagenes/slider/tree.jpg" alt="Flower">
      </div>
    </div>

    <div class="item">
      <div id="texto-foto" class="col-sm-6 col-md-6">
        <h3>Chania</h3>
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
        <p>hola como estas, estas es un a preba para seaber como se comporta el div</p>
        <p>de una ventana.The atmosphere in Chania has a touch of Florence and Venice.</p>
      </div>
      <div id="foto-foto" class="col-sm-6 col-md-6">
        <img class="img-thumbnail" src="img_flower2.jpg" alt="No hay imagenes">
      </div>
    </div>
    </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div id="noticias" class="container-fluid">
    <div class="row" >
        
          <div class="col-sm-4 col-md4">
            <div id="panel-noticia" class="panel panel-default">
                <div id="panel-titulo-noticia" class="panel-heading" style="background: url(imagenes/logos/fondo_azul.png);">
                  <h3>Boletín Infotmativo N° 42</h3>
                </div>
                <div id="panel-cuerpo-noticia" class="panel-body">
                   <p>Tenemos el agrado de dirigirnos a Ud. a fin de remitirle adjunto el Boletín Informativo N° 42, 
                    en relación al taller de Comediación Familiar a Distancia que se dictó el día 11 de Junio en la 
                    sede del Colegio de Abogados y Procuradores de la provincia de La Pampa.</p>
                   <button id="boton-noticia" type='button' class='btn btn-info  btn-lg' name='' style="background: url(imagenes/logos/fondo_azul.png);" onClick="irA('BOLETIN_INFORMATIVO_42.pdf')">Ver Mas</button>
                </div>
            </div>
        </div>
 

        <div class="col-sm-4 col-md4">
            <div id="panel-noticia" class="panel panel-default">
                <div id="panel-titulo-noticia" class="panel-heading" style="background: url(imagenes/logos/fondo_azul.png);">
                  <h3>Boletín Infotmativo N° 41</h3>
                </div>
                <div id="panel-cuerpo-noticia" class="panel-body">
                   <p>Tenemos el agrado de dirigirnos a Ud. a fin de remitirle adjunto el Boletín Informativo N° 41, 
                    en relación con la charla de la Ley de Mediación Prejudicial Obligatoria realizada el día 12 de 
                    mayo próximo pasado y organizada por la Comisión de Jóvenes de Caja Forense junto con el Centro 
                    de Mediación de Santa Rosa y el Colegio de Abogados.</p>
                   <button id="boton-noticia" type='button' class='btn btn-info  btn-lg' name='' style="background: url(imagenes/logos/fondo_azul.png);" onClick="irA('BOLETIN_INFORMATIVO_41.pdf')">Ver Mas</button>
                </div>
            </div>
        </div>

          <div class="col-sm-4 col-md4">
            <div id="panel-noticia" class="panel panel-default">
                <div id="panel-titulo-noticia" class="panel-heading" style="background: url(imagenes/logos/fondo_azul.png);">
                  <h3>Boletín Infotmativo N° 40</h3>
                </div>
                <div id="panel-cuerpo-noticia" class="panel-body">
                   <p>Tenemos el agrado de dirigirnos a Ud. a fin de remitirle adjunto el Boletín Informativo N° 40, 
                    con información relacionada con el criterio adoptado por la DGR para la liquidación de la Tasa 
                    de Justicia en los juicios promovidos con Beneficio de Litigar sin Gastos.</p>
                   <button id="boton-noticia" type='button' class='btn btn-info  btn-lg' name='' style="background: url(imagenes/logos/fondo_azul.png);" onClick="irA('BOLETIN_INFORMATIVO_40.pdf')">Ver Mas</button>
                </div>
            </div>
        </div>

  </div>
</div>


      <!--
      <div class="col-sm-4 col-md4">
        <div class="thumbnails">
          <div class="thumbnail">
            <a class="noticias" href="#"><img data-src="holder.js/300x200" src="imagenes/slider/tree.jpg" alt="" style="width: 300px; height: 200px;">
            <div class="caption">
              <h3>Boletin Oficial Nº 30</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id quam facilisis, pellentesque ex non,
                congue urna.</p></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-4 col-md4">
        <div class="thumbnails">
          <div class="thumbnail">
            <a class="noticias" href="#"><img id="thumbnail-index" data-src="holder.js/300x200" src="imagenes/slider/tree.jpg" alt="" style="">
            <div class="caption">
              <h3>Boletin Oficial Nº 30</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id quam facilisis, pellentesque ex non,
                congue urna.</p></a>
            </div>
          </div>
        </div>
       </div>

      <div class="col-sm-4 col-md4">
        <div class="thumbnails">
          <div class="thumbnail">
            <a class="noticias" href="#"><img data-src="holder.js/300x200" src="imagenes/slider/tree.jpg" alt="" style="width: 300px; height: 200px;">
            <div class="caption">
              <h3>Boletin Oficial Nº 30</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id quam facilisis, pellentesque ex non,
                congue urna.</p></a>
            </div>
          </div>
        </div>
      </div>-->

		<?php
    include 'footer.php';
    include 'footer1.php';

   $user = "usuario";
   session_register ("user");
   //$_SESSION['var']=$var;
   /* para ver usuario
   print ("<P>Valor de la variable de sesión:$user</P>\n");
	*/

		?>

  </body>
  </html>

  <script type="text/javascript">

     function irA(direccion){

       window.location.href="archivos/"+direccion;
}

  </script>