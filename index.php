<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php

 include 'head.php';
?>
  <body>

<!-- Modal Foto 
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#mimodal">
  Launch modal
</button>

  <div class="modal fade" id="mimodal">

    <div class="modal-dialog modal-lg" style="width: 1235px">      
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Bienvenido a nuestra nueva página!</h4>
        </div>
        
        <div class="modal-body">
          <img src="imagenes/slider/dia_abogado.jpg" alt="..." class="img-rounded" id="img-modal">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>

      </div>

    </div>
    

  </div>-->


<div class="modal fade" id="mimodal" role="dialog">
  <div class="modal-dialog" id="mimodalwindow">
    <div  class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Atención!</h4>
      </div>
      <div class="modal-body">
        Por cuestiones ajenas a la Institución, los módulos de cálculo no funcionan correctamente. Se está trabajando en solucionar el problema. Sepa disculpar los inconvenientes.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php
  include 'navbar.php';


  if(!$_SESSION['user'])  //lo puse asi para que si se accede desde 0 abre el modal, despues no
  {
?>


<!--Modal  
<div class="modal fade" id="mimodal" role="dialog">
  <div class="modal-dialog" id="mimodalwindow">
    <div  class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Bienvenido a nuestra nueva página!</h4>
      </div>
      <div class="modal-body">
        <img src="imagenes/slider/dia_abogado" alt="..." class="img-rounded">
        El siguiente link lo llevará al <a href="">tutorial de la pagina</a>.-- ""aca va cierre comentario===== Ante cualquier recomendación
        dirigirse a contacto. Gracias.-
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>-->

<!--Modal foto 
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#mimodal">
  Launch modal
</button>

  <div class="modal fade" id="mimodal">

    <div class="modal-dialog modal-lg" style="width: 840px">      
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Caminata Solidaria "Caminar Ayuda 2016".</h4>
        </div>
        
        <div class="modal-body">
          <img src="imagenes/slider/caminar_2016.jpg" alt="..." class="img-rounded" id="img-modal">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>

      </div>

    </div>
    

  </div>
-->

<?php
  }
  ?>

<div class="container-fluid" id="carIndex">
<div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides para los sliders las imagenes son de 1400x300 px-->
  <div class="carousel-inner" role="listbox">
    <div  class="item active" >
      <div id="" class="row">
        <a onclick="window.open('imagenes/slider/BENEFICIOS1.jpg','','width=1100,height=900')" href=""><img class="img-thumbnail" style="width:100%" src="imagenes/slider/BENEFICIOS1.jpg" alt="Chania"></a>
      </div>
    </div>

    <div  class="item">
      <div id="" class="row">
        <a onclick="window.open('imagenes/slider/BENEFICIOS2.jpg','','width=1100,height=900')" href=""><img class="img-thumbnail" style="width:100%" src="imagenes/slider/BENEFICIOS2.jpg" alt="Chania"></a>
      </div>
    </div>

    <div  class="item">
      <div id="" class="row">
        <a onclick="window.open('imagenes/slider/BENEFICIOS3.jpg','','width=1100,height=900')" href=""><img class="img-thumbnail" style="width:100%" src="imagenes/slider/BENEFICIOS3.jpg" alt="Chania"></a>
      </div>
    </div>

    <div  class="item">
      <div id="" class="row">
        <a onclick="window.open('archivos/1188-1200.pdf','','width=1100,height=900')" href=""><img class="img-thumbnail" style="width:100%" src="imagenes/slider/BENEFICIOS4.jpg" alt="Chania"></a>
      </div>
    </div>

    <div  class="item">
      <div id="" class="row">
        <a onclick="window.open('archivos/informes_riesgo.pdf','','width=1100,height=900')" href=""><img class="img-thumbnail" style="width:100%" src="imagenes/slider/BENEFICIOS5.jpg" alt="Chania"></a>
      </div>
    </div>

    <div  class="item">
      <div id="" class="row">
        <a onclick="window.open('imagenes/slider/comercios.jpg','','width=1100,height=900')" href=""><img class="img-thumbnail" style="width:100%" src="imagenes/slider/BENEFICIOS6.jpg" alt="Chania"></a>
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
        
          <!--<div class="col-sm-4 col-md4">
            <div id="panel-noticia" class="panel panel-default">
                <div id="panel-titulo-noticia" class="panel-heading" style="background: url(imagenes/logos/fondo_azul.png);">
                  <h3>Nuevos Haberes Previsionales</h3>
                </div>
                <div id="panel-cuerpo-noticia" class="panel-body">
                   <p>El 1° de septiembre próximo entrarán en vigencia los nuevos haberes previsionales establecidos
                    por el Directorio. El segundo aumento en el año para las jubilaciones y pensiones se implementará
                    mediante un subsidio no remunerativo a fin de morigerar su impacto en los aportes anuales.</p>
                   <button id="boton-noticia" type='button' class='btn btn-info  btn-lg' name='' style="background: url(imagenes/logos/fondo_azul.png);" onClick="irA('1198.pdf')">Ver Mas</button>
                </div>
            </div>
        </div>-->
        
        
         <div class="col-sm-4 col-md4">
            <div id="panel-noticia" class="panel panel-default">
                <div id="panel-titulo-noticia" class="panel-heading" style="background: url(imagenes/logos/fondo_azul.png);">
                  <h3>Coordinadora Regional de la Patagonia</h3>
                </div>
                <div id="panel-cuerpo-noticia" class="panel-body">
                   <p> Los días 6 y 7 de octubre se llevará a cabo el Encuentro Región Sur de Cajas de Previsión Social en la ciudad de Santa Rosa,
                    organizado por las tres Cajas de Profesionales de la Provincia.</p>
                   <button id="boton-noticia" type='button' class='btn btn-info  btn-lg' name='' style="background: url(imagenes/logos/fondo_azul.png);" onClick="irA('ProgRegPatagonica.pdf')">Ver Mas</button>
                </div>
            </div>
        </div>
        

        <div class="col-sm-4 col-md4">
            <div id="panel-noticia" class="panel panel-default">
                <div id="panel-titulo-noticia" class="panel-heading" style="background: url(imagenes/logos/fondo_azul.png);">
                  <h3>Subsidios – Nuevos montos</h3>
                </div>
                <div id="panel-cuerpo-noticia" class="panel-body">
                   <p>A partir del 1° de septiembre se incrementaron los montos de los Subsidios Solidarios. Los nuevos importes son:<br>
                      • Matrimonio:           $  6.200<br>
                      • Nacimiento o Adopción de Hijo:    $  6.200<br>
                      • Fallecimiento:          $ 17.000<br>
                      </p>
                   <button id="boton-noticia" type='button' class='btn btn-info  btn-lg' name='' style="background: url(imagenes/logos/fondo_azul.png);" onClick="irA('1204.pdf')">Ver Mas</button>
                </div>
            </div>
        </div>

          <div class="col-sm-4 col-md4">
            <div id="panel-noticia" class="panel panel-default">
                <div id="panel-titulo-noticia" class="panel-heading" style="background: url(imagenes/logos/fondo_azul.png);">
                  <h3>Contingencias de salud, graves e imprevistas</h3>
                </div>
                <div id="panel-cuerpo-noticia" class="panel-body">
                   <p>A partir del 1° de septiembre se establecieron los nuevos montos mínimos y máximos para la cobertura por Contingencias de salud, graves e imprevistas.
                      El monto mínimo a cubrir será de $ 5.000.
                      En el caso de contingencias que, si bien no ponen en riesgo la vida del beneficiario, le acarreen a éste una invalidez total y temporal, el 
                      monto máximo de la cobertura será de $ 75.000.
                      En los casos de contingencias graves e imprevistas que pongan en riesgo la vida del beneficiario, el monto máximo a cubrir será de $ 100.000.
                      </p>
                   <button id="boton-noticia" type='button' class='btn btn-info  btn-lg' name='' style="background: url(imagenes/logos/fondo_azul.png);" onClick="irA('1205.pdf')">Ver Mas</button>
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
  //session_register ("user");
  $_SESSION['user']=$user;
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