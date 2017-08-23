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
    <?php 
        include 'conexion.php';
     ?>


<body data-spy="scroll" data-target=".navbar-fixed-top">
      <nav class="navbar navbar-fixed-top navbar-default scrollclass" role="navigation">
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
                    <li><a href="institucional.php#comision">Comisi&oacute;n de J&oacute;venes</a></li>
                    <li><a href="#descuentos">Noticias</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                </ul>
                </ul>
            </div>

        </div>
   </nav><!-- /.navbar -->

<!--===============================viejo navbar   
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tasas<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">            
                    <li><a href="#mensual">Tasa Mix Mensual</a></li>
                    <li><a href="#acumulada">Tasa Mix Acumulada</a></li>
                </ul>
                <li><a href="institucional.php#comision">Comisi&oacute;n de J&oacute;venes</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
            </div>
           
        </div>
    </div>
======================================================================================================================================-->

    <section id="mensual"  class="blanco" > <!--1-->
            <div class="container-fluid">
           <div class="row text-center pad-top  min-height-cls" >
            <div class="col-md-12">
                <h2>Tasa Mix Mensual</h2>
                <div class="col-md-9 col-md-offset-3">
                    <br>

                <div class="table-responsive">
                    <table class="table-mix">
                        <tr>
                            <th class="mesTmix">Año</th>
                            <th class="mesTmix">Enero</th>
                            <th class="mesTmix">Febrero</th>                            
                            <th class="mesTmix">Marzo</th>                            
                            <th class="mesTmix">Abril</th>                                
                            <th class="mesTmix">Mayo</th>
                            <th class="mesTmix">Junio</th>
                            <th class="mesTmix">Julio</th>
                            <th class="mesTmix">Agosto</th>
                            <th class="mesTmix">Septiembre</th>
                            <th class="mesTmix">Octubre</th>
                            <th class="mesTmix">Noviembre</th>
                            <th class="mesTmix">Diciembre</th>
                        </tr>                        
                        
                        <?php 

                        $consulta=" select * from TasaMix order by 'TmAn' desc";
                        $query= mysql_query($consulta) or die ("no se pudo realizar la consulta");
                        $numFil= mysql_num_rows($query);

                            for ($i=0; $i < $numFil; $i++) { 
                                $fila=mysql_fetch_array($query);    

                                    print"<tr class='trmix'>";
                                
                                    print "<th class='tdmix'>".$fila[0]."</th>";
 
                                for ($j=1; $j < 13; $j++) { 
            
                                    print "<td class='tdmix'>".number_format($fila[$j], 2)."</td>";
                                   
                                }

                                print"</tr>";
                            }

                         ?>
                        
                    </table>
                </div>


                </div>

            </div>
               
               </div>
        </div>
        </section>
   
        <!--seccion 1-->
       <section id="acumulada" class="azul"> <!--2-->
            <div class="container-fluid">
                <div class="row text-center pad-top  min-height-cls" >
                
                    <div class="col-md-12">
                        <h2>Tasa Mix Acumulada</h2>
                        <div class="col-md-9 col-md-offset-3">
                        <br>

                        <div class="table-responsive">
                            <table class="table-mix">
                                <tr>
                            <th class="mesTmix">Año</th>
                            <th class="mesTmix">Enero</th>
                            <th class="mesTmix">Febrero</th>                            
                            <th class="mesTmix">Marzo</th>                            
                            <th class="mesTmix">Abril</th>                                
                            <th class="mesTmix">Mayo</th>
                            <th class="mesTmix">Junio</th>
                            <th class="mesTmix">Julio</th>
                            <th class="mesTmix">Agosto</th>
                            <th class="mesTmix">Septiembre</th>
                            <th class="mesTmix">Octubre</th>
                            <th class="mesTmix">Noviembre</th>
                            <th class="mesTmix">Diciembre</th>
                                </tr>                        
                        
                        <?php 

                        $consulta=" select * from TasaMix";
                        $query= mysql_query($consulta) or die ("no se pudo realizar la consulta");
                        $numFil= mysql_num_rows($query);
                        $sumTasa=0;

                            for ($i=0; $i < $numFil; $i++) { 
                                $fila=mysql_fetch_array($query);    

                                    print"<tr class='trmix'>";
                                
                                    print "<th class='tdmix'>".$fila[0]."</th>";

                                for ($j=1; $j < 13; $j++) { 

                                    $sumTasa=$sumTasa + $fila[$j];

                                    if($fila[$j]==0)
                                        print "<td class='tdmix'>0.00</td>";
                                    else
                                        print "<td class='tdmix'>".number_format($sumTasa, 2)."</td>";
                                   
                                }

                                print"</tr>";
                            }

                         ?>
                        
                    </table>
                </div>


                </div>

            </div>
               
                   
                </div>
            </div>
       </section>
        <!--fin seccion 1-->

 

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
