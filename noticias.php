<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

        <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" />


    <!--Estilos de fuentes-->
    <link href="css/fuentes.css" rel="stylesheet">

    <!--mi estilo -->
    <link href="css/miestilo.css" rel="stylesheet">

    <title>Noticias</title>

</head>
<body data-spy="scroll" data-target=".navbar-fixed-top">

    <div class="navbar navbar-fixed-top navbar-default scrollclass" >
        <div class="container">
            <div id="navLogo" class="navbar-header">
              <a id="" class="navbar-brand" href="index.php"><img id="logo" src="imagenes/logos/Logo12016.png" alt="Logo de Caja Forense"></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navPills">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navPills">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Inicio</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profesionales<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="cuenta.php">Estado Previsional</a></li>
                      <li><a href="padron.php">Padrón de afiliados</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Institucional<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="institucional.php#comision">Comisi&oacute;n de J&oacute;venes</a></li>
                      <li><a href="institucional.php#creacion">Creación y Objetivos</a></li>
                      <li><a href="institucional.php#autoridades">Autoridades</a></li>
                      <li><a href="institucional.php#normativa">Marco normativo y financiamiento</a></li> 
                      <li><a href="institucional.php#coordinadora">Coordinadora de Cajas</a></li>
                      <li><a href="archivos/LEY_1861.pdf" target="_blank">Ley 1861</a></li>  
                    </ul>
                </li>
                <li><a href="contacto.php">Contacto</a></li>
                  <li><a href="http://www.cforense.org/oldsite/index.php">P&aacute;gina versi&oacute;n anterior</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Novedades<span class="caret"></a>
                    <ul class="dropdown-menu" role="menu">
                    <li><a href="noticias.php">Noticias</a></li> 
                    </ul>
                </li>
                </ul>
            </div>

        </div>
    </div>

    <section id="descuentos" class="azul"> <!--3-->
        <div class="container-fluid">
           <div class="row text-center pad-top  min-height-cls" >


                <div class="col-md-6">
                    <h1>Más beneficios con comercios locales</h1>

                    <br>
                        Para continuar sumando beneficios a sus afiliados, la Caja Forense realizó convenios de descuentos con distintos comercios locales. 
                        DIARCO, VICTORIANA, POLO CLUB, GABIAND son algunas de las nuevas vinculaciones.</a>
                </div>
                <div id="carousel1" class="col-md-6">
                    <div id="carousel-noticias" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-noticias" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-noticias" data-slide-to="1"></li>
                                <li data-target="#carousel-noticias" data-slide-to="2"></li>
                            </ol>

                             <!-- fotos for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item">
                                    <img src="imagenes/slider/descuento_1.jpg" id="foto-carouselNoticia" alt="...">
                                </div>
                                <div class="item">
                                    <img src="imagenes/slider/descuento_2.jpg" id="foto-carouselNoticia" alt="...">
                                </div>
                                <div class="item active">
                                    <img src="imagenes/slider/promosagosto2017.jpg" id="foto-carouselNoticia" alt="..."> <!--tamño de las fotos de 6016x4000-->
                                </div>
                            </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-noticias" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-noticias" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
                </div>
            </div>

        </div>
    </section>

    <section id="mediacion" class="blanco"> <!--3-->
        <div class="container-fluid">
           <div class="row text-center pad-top  min-height-cls" >

                <div id="carousel2" class="col-md-6">
                    <div id="carousel-mediacion" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-mediacion" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-mediacion" data-slide-to="1"></li>
                                <li data-target="#carousel-mediacion" data-slide-to="2"></li>
                                <li data-target="#carousel-mediacion" data-slide-to="3"></li>
                                <li data-target="#carousel-mediacion" data-slide-to="4 "></li>
                            </ol>

                             <!-- fotos for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="imagenes/fotos/1.jpg" id="foto-carouselNoticia" alt="..."> <!--tamño de las fotos de 6016x4000-->
                                </div>
                                <div class="item">
                                    <img src="imagenes/fotos/2.jpg" id="foto-carouselNoticia" alt="...">
                                </div>
                                <div class="item">
                                    <img src="imagenes/fotos/3.jpg" id="foto-carouselNoticia" alt="...">
                                </div>
                                <div class="item">
                                    <img src="imagenes/fotos/4.jpg" id="foto-carouselNoticia" alt="...">
                                </div>
                                <div class="item">
                                    <img src="imagenes/fotos/5.jpg" id="foto-carouselNoticia" alt="...">
                                </div>
                            </div>


                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-mediacion" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-mediacion" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
                </div>

                <div class="col-md-6">
                    <h1>Curso de Mediacion</h1>

                    <br>
                    La Caja Forense de La Pampa, junto con el Centro de Mediación de Santa Rosa y el Colegio de Abogados, organizaron el 11 de Junio de 2016 un taller de 
                    capacitación continua de 10 horas para mediadores, titulado:"COMEDIACIÓN FAMILIAR A DISTANCIA" en la sede del Colegio de ésta ciudad.- <br>
                        Para ver mas <a href="archivos/BOLETIN_INFORMATIVO_42.pdf">link al pdf</a>
                </div>
            </div>

        </div>
    </section>

    <!--<section id="descuentos"  class="azul" > <!--1
            <div class="container-fluid">
           <div class="row text-center pad-top  min-height-cls" >
            <div class="col-md-12">
                <h2>Beneficios Para Afiliados</h2>
                <div class="col-md-6">
                    <br>
                    <h3>Descuentos en comercios Locales</h3>
                    <br>
                        Detalles de descuentos. Ver <a href="archivos/descuentos.jpg">ver imagen</a>.
                </div>
                <div id="foto-foto" class="col-md-6">
                    <div class="col-md-7 col-md-offset-3"><img class="img-thumbnail" src="archivos/descuentos.jpg" alt="foto"></div>

                </div>
            </div>

               </div>
        </div>
        </section>

        <!--seccion 1
       <section id="taller_de_mediacion" class="blanco"> <!--2
            <div class="container-fluid">
           <div class="row text-center pad-top  min-height-cls" >
            <div id="foto-foto" class="col-md-6">
                <div class="col-md-7 col-md-offset-3"><img class="img-thumbnail" src="archivos/taller_de_mediacion.jpg" alt="foto"></div>

            </div>
            <div class="col-md-6">
                <h1>Taller de Mediaci&oacute;n</h1>

                    <br>
                       <p>Para m&aacute;s informaci&oacute;n sobre este taller <a href="archivos/TALLER_DE_COMEDIACION_FAMILIAR_A_DISTANCIA_PROGRAMA.pdf">ver el programa</a>.</p>

            </div>

            </div>
        </div>
       </section>
        <!--fin seccion 1

    <section id="TALLER_DE_COMEDIACION_FAMILIAR_A_DISTANCIA_PROGRAMA" class="azul"> <!--3
        <div class="container-fluid">
           <div class="row text-center pad-top  min-height-cls" >


                <div class="col-md-6">
                    <h1>Curso de Mediacion</h1>

                    <br>
                        En este espacio va un breve texto sobre las fotos y si se quiere en <a href="archivos/BOLETIN_INFORMATIVO_42.pdf">link al pdf</a>
                </div>
                <div id="carousel-noticias" class="col-md-6">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators 
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="4 "></li>
                            </ol>

                             <!-- fotos for slides 
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="imagenes/fotos/1.JPG" id="foto-carouselNoticia" alt="..."> <!--tamño de las fotos de 6016x4000
                                </div>
                                <div class="item">
                                    <img src="imagenes/fotos/2.jpg" id="foto-carouselNoticia" alt="...">
                                </div>
                                <div class="item">
                                    <img src="imagenes/fotos/3.JPG" id="foto-carouselNoticia" alt="...">
                                </div>
                                <div class="item">
                                    <img src="imagenes/fotos/4.jpg" id="foto-carouselNoticia" alt="...">
                                </div>
                                <div class="item">
                                    <img src="imagenes/fotos/5.jpg" id="foto-carouselNoticia" alt="...">
                                </div>
                            </div>

                <!-- Controls 
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
                </div>
            </div>

        </div>
    </section>

        <section id="normativa" class="blanco"> <!--4
            <div class="container-fluid">
           <div class="row text-center pad-top  min-height-cls" >
            <div class="col-md-12">

                <h2>titulo 3</h2>

                    <br>
                    <h3>Algo 3</h3>
                    <br>
                        Mas texto

            </div>

               </div>
        </div>
        </section>

        <section id="comision"  class="azul"> <!--5
            <div class="container-fluid">
           <div class="row text-center pad-top  min-height-cls" >
            <div class="col-md-12">
                <h2>Comisi&oacute;n de J&oacute;venes</h2>
                <div class="col-md-9">
                    <br>
                    <h3>Marco Normativo</h3>
                    <br>
                        Texto de Comision de jovenes
                </div>
                <div class="col-md-6">
                    algo por alla
                </div>
            </div>

               </div>
        </div>
        </section>

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="js/bootstrap.js"></script>
     <!-- EASING SCROLL SCRIPTS PLUGIN  -->
    <script src="js/jquery.easing.min.js"></script>
    <script>
         <!-- CUSTOM SCROLL SCRIPT FUNCTION FOR NAVBAR  -->
        $(function () {
            $('.scrollclass a').bind('click', function (event) { //just pass scrollclass in design and start scrolling
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top
                }, 1000, 'easeInOutQuad');
                event.preventDefault();
            });
        });
       //ADD REMOVE PADDING CLASS ON SCROLL
        $(window).scroll(function () {
            if ($(".navbar").offset().top >40) {
                $(".navbar-fixed-top").addClass("navbar-pad-original");
            } else {
                $(".navbar-fixed-top").removeClass("navbar-pad-original");
            }
        });
    </script>

</body>
<?php
include 'footer.php';
include 'footer1.php';
?>

</html>
