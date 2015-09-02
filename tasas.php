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

    <title>Tasas</title>
    <?php 
        include 'conexion.php';
     ?>

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
                            <th>Año</th>
                            <th>Enero</th>
                            <th>Febrero</th>                            
                            <th>Marzo</th>                            
                            <th>Abril</th>                                
                            <th>Mayo</th>
                            <th>Junio</th>
                            <th>Julio</th>
                            <th>Agosto</th>
                            <th>Septiembre</th>
                            <th>Octubre</th>
                            <th>Noviembre</th>
                            <th>Diciembre</th>
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
            
                                    print "<td class='tdmix'>".$fila[$j]."</td>";
                                   
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
                        <h2>Tasa Mix Mensual</h2>
                        <div class="col-md-9 col-md-offset-3">
                        <br>

                        <div class="table-responsive">
                            <table class="table-mix">
                                <tr>
                                <th>Año</th>
                                <th>Enero</th>
                                <th>Febrero</th>                            
                                <th>Marzo</th>                            
                                <th>Abril</th>                                
                                <th>Mayo</th>
                                <th>Junio</th>
                                <th>Julio</th>
                                <th>Agosto</th>
                                <th>Septiembre</th>
                                <th>Octubre</th>
                                <th>Noviembre</th>
                                <th>Diciembre</th>
                                </tr>                        
                        
                        <?php 

                            $consulta="select * from tmix";
                            $query= mysql_query($consulta) or die ("no se pudo realizar la consulta");
                            $numFil= mysql_num_rows($query);
                            $suma=0;

                            for ($i=0; $i < $numFil; $i++) { 
                                
                                $fila=mysql_fetch_array($query);    

                                    print"<tr class='trmix'>";
                                
                                    print "<th class='tdmix'>".date("d-m-Y",strtotime($fila[0]))."</th>";

                                    

                                for ($j=1; $j < 2; $j++) { 
                                    

                                    print "<td class='tdmix'>".$fila[$j]."</td>";
                                   
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
                                <th>Año</th>
                                <th>Enero</th>
                                <th>Febrero</th>                            
                                <th>Marzo</th>                            
                                <th>Abril</th>                                
                                <th>Mayo</th>
                                <th>Junio</th>
                                <th>Julio</th>
                                <th>Agosto</th>
                                <th>Septiembre</th>
                                <th>Octubre</th>
                                <th>Noviembre</th>
                                <th>Diciembre</th>
                                </tr>                        
                        
                        <?php 

                            $consulta="select * from tmix";
                            $query= mysql_query($consulta) or die ("no se pudo realizar la consulta");
                            $numFil= mysql_num_rows($query);
                            $suma=0;

                            for ($i=0; $i < $numFil; $i++) { 
                                
                                $fila=mysql_fetch_array($query); 

                                    $arraymes = array();
                                    
                                    list($dia, $mes, $año)=split('[/.-]',date("d-m-Y",strtotime($fila[0])));

                                    print"<tr class='trmix'>";
                                
                                    print "<th class='tdmix'>".$año."</th>";

                                    


                                
                                    
                                    /*
                                    print "<td class='tdmix'>".$fila[$j]."</td>";
                                    print"</tr>";*/
                                

                               
                            }

                         ?>
                        
                    </table>
                </div>


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
