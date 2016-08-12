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


  if(!$_SESSION['user'])  //lo puse asi para que si se accede desde 0 abre el modal, despues no
  {
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#mimodal">
  Launch modal
</button>

<!-- Modal -->
<div class="modal fade" id="mimodal" role="dialog">
  <div class="modal-dialog" id="mimodalwindow">
    <div  class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Bienvenido a nuestra nueva página!</h4>
      </div>
      <div class="modal-body">
        <!--El siguiente link lo llevará al <a href="">tutorial de la pagina</a>.--> Ante cualquier recomendación
        dirigirse a contacto. Gracias.-
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php
  }
  ?>

<div class="container-fluid" id="carIndex">
<div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div  class="item active" >
      <div id="" class="row">
        <a href=""><img class="img-thumbnail" style="width:100%" src="imagenes/slider/mini/BENEFICIOS GENERAL300.jpg" alt="Chania"></a>
      </div>
    </div>

    <div  class="item">
      <div id="" class="row">
        <a href=""><img class="img-thumbnail" style="width:100%" src="imagenes/slider/mini/BENEFICIOS GENERAL fondo solidario300.jpg" alt="Chania"></a>
      </div>
    </div>

    <div  class="item">
      <div id="" class="row">
        <a onclick="window.open('archivos/1188-1200 BONO MEDIACIÓN Y BONO CONSULTA.pdf','','width=1100,height=900')" href=""><img class="img-thumbnail" style="width:100%" src="imagenes/slider/mini/BONO MEDIACION Y CONSULTA300.jpg" alt="Chania"></a>
      </div>
    </div>

    <div  class="item">
      <div id="" class="row">
        <a onclick="window.open('imagenes/slider/AFICHE COMERCIOS VIGENTE.jpg','','width=1100,height=900')" href=""><img class="img-thumbnail" style="width:100%" src="imagenes/slider/mini/FLYER COMERCIOS300.jpg" alt="Chania"></a>
      </div>
    </div>
<!--
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
-->

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

</div>

<div id="noticias" class="container-fluid">
    <div class="row" >
        
          <div class="col-sm-4 col-md4">
            <div id="panel-noticia" class="panel panel-default">
                <div id="panel-titulo-noticia" class="panel-heading" style="background: url(imagenes/logos/fondo_azul.png);">
                  <h3>Nuevos Haberes Previsionales</h3>
                </div>
                <div id="panel-cuerpo-noticia" class="panel-body">
                   <p>El 1° de septiembre próximo entrarán en vigencia los nuevos haberes previsionales establecidos
                    por el Directorio. El segundo aumento en el año para las jubilaciones y pensiones se implementará
                    mediante un subsidio no remunerativo a fin de morigerar su impacto en los aportes anuales.</p>
                   <button id="boton-noticia" type='button' class='btn btn-info  btn-lg' name='' style="background: url(imagenes/logos/fondo_azul.png);" onClick="irA('1198 INCREMENTO DE LOS HABERES PREVISIONALES - SUBSIDIO NO REMUNERATIVO 2016 - NORMATIVA.pdf')">Ver Mas</button>
                </div>
            </div>
        </div>
 

        <div class="col-sm-4 col-md4">
            <div id="panel-noticia" class="panel panel-default">
                <div id="panel-titulo-noticia" class="panel-heading" style="background: url(imagenes/logos/fondo_azul.png);">
                  <h3>Valor Técnico Actuarial</h3>
                </div>
                <div id="panel-cuerpo-noticia" class="panel-body">
                   <p>A partir del corriente mes se implementó un nuevo método de cálculo del Valor Técnico Actuarial,
                    con el objetivo de castigar la falta de solidaridad y desalentar la morosidad y fue desarrollado
                    en base al informe técnico titulado Factor de Actualización Actuarial elaborado por el Estudio de 
                    Actuarios Fastman y Asociados.</p>
                   <button id="boton-noticia" type='button' class='btn btn-info  btn-lg' name='' style="background: url(imagenes/logos/fondo_azul.png);" onClick="irA('1199 VALOR TÉCNICO ACTUARIAL - NORMATIVA.pdf')">Ver Mas</button>
                </div>
            </div>
        </div>

          <div class="col-sm-4 col-md4">
            <div id="panel-noticia" class="panel panel-default">
                <div id="panel-titulo-noticia" class="panel-heading" style="background: url(imagenes/logos/fondo_azul.png);">
                  <h3>Bono Consulta</h3>
                </div>
                <div id="panel-cuerpo-noticia" class="panel-body">
                   <p>Respondiendo a la solicitud de muchos afiliados y con la finalidad de facilitar su utilización,
                    se modificó el valor unitario del bono, habiéndoselo fijado en UN UMED, unidad de medida que
                    permitirá mantener su poder adquisitivo. Los nuevos talonarios de Bonos Consulta estarán a
                    disposición de los interesados a partir del 16 de agosto próximo.</p>
                   <button id="boton-noticia" type='button' class='btn btn-info  btn-lg' name='' style="background: url(imagenes/logos/fondo_azul.png);" onClick="irA('1200 BONO CONSULTA - MODIFICACIÓN DEL VALOR UNITARIO.pdf')">Ver Mas</button>
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

       window.open("archivos/"+direccion,"","width=1100,height=900");
}

    $(document).ready(function(){

        $("#mimodal").modal('show');

    });
  </script>