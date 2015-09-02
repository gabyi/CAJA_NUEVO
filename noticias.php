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
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="marca" class="navbar-brand" href="index.php"><h4>Caja Forense de La Pampa</h4></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Inicio</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Institucional<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                        <li><a href="institucional.php#creacion">Creación y Objetivos</a></li>
                        <li><a href="institucional.php#autoridades">Autoridades</a></li>
                        <li><a href="institucional.php#normativa">Marco normativo y financiamiento</a></li>   
                        </ul>
                    </li>
                    <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Noticias<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">            
                    <li><a href="#descuentos">Beneficios Para Afiliados</a></li>
                    <li><a href="#taller_de_mediacion">Taller de Mediaci&oacute;n</a></li>
                    <li><a href="#TALLER_DE_COMEDIACION_FAMILIAR_A_DISTANCIA_PROGRAMA">Curso de Mediacion</a></li>
                    <li><a href="#normativa">Curso de Mediacion</a></li> 
                    <li><a href="#coordinadora">Coordinadora de cajas</a></li>      
                </ul>
                <li><a href="institucional.php#comision">Comisi&oacute;n de J&oacute;venes</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                </ul>
            </ul>
            </div>
           
        </div>
    </div>

    <section id="descuentos"  class="blanco" > <!--1-->
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
   
        <!--seccion 1-->
       <section id="taller_de_mediacion" class="azul"> <!--2-->
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
        <!--fin seccion 1-->

    <section id="TALLER_DE_COMEDIACION_FAMILIAR_A_DISTANCIA_PROGRAMA" class="blanco"> <!--3-->
        <div class="container-fluid">
           <div class="row text-center pad-top  min-height-cls" >
           
          
                <div class="col-md-6">
                    <h1>Curso de Mediacion</h1>

                    <br>
                        En este espacio va un breve texto sobre las fotos y si se quiere en <a href="archivos/BOLETIN_INFORMATIVO_42.pdf">link al pdf</a>
                </div>
                <div id="carousel-noticias" class="col-md-6">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="4 "></li>
                            </ol>

                             <!-- fotos for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="imagenes/fotos/1.jpg" alt="...">                               
                                </div>
                                <div class="item">
                                    <img src="imagenes/fotos/2.jpg" alt="...">
                                </div>
                                <div class="item">
                                    <img src="imagenes/fotos/3.jpg" alt="...">
                                </div>
                                <div class="item">
                                    <img src="imagenes/fotos/4.jpg" alt="...">
                                </div>
                                <div class="item">
                                    <img src="imagenes/fotos/5.jpg" alt="...">
                                </div>
                            </div>

                <!-- Controls -->
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

        <section id="normativa" > <!--4-->
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

        <section id="comision"  style="background-color:#ededed;" > <!--5-->
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
