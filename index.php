<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="imagenes/logo.ico"/>

    <title>Caja Forense de La Pampa</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--mi estilo -->
    <link href="css/miestilo.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

     <!--Estos estan agregados para que minimece la barra movil-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--<link type="text/css" rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">-->

	<!--script para mover carrussel-->
    <script>
    $(document).ready(function(){
        $('.myCarousel').carousel()
    });
    </script>
    
    <style type="text/css">
      .footer {/* el estilo del div footer lo puse aca porque no le gusta imagen importada*/
          background: url(prueba1.gif);
          background-size: 70%;
          background-repeat: no-repeat;
          background-position: center;
          height:250px;

              }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<?php
  		include 'navbar.php';

		  include 'logo.php';
	?>

	<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-bottom:25px; margin-top:25px;">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div  class="item active">
      <img class="img-thumbnail" src="imagenes/slider/leaf.jpg" alt="Chania" style="width: 700px;height: 350px;">
      <div class="caption">
        <h3>Chania</h3>
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
      </div>
    </div>

    <div class="item">
      <img class="img-thumbnail" src="imagenes/slider/bridge.jpg" alt="Chania"style="width: 700px;height: 350px;">
      <div class="caption">
        <h3>Chania</h3>
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
      </div>
    </div>

    <div class="item">
      <img class="img-thumbnail" src="imagenes/slider/tree.jpg" alt="Flower"style="width: 700px;height: 350px;">
      <div class="caption">
        <h3>Chania</h3>
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
      </div>
    </div>

    <div class="item">
      <img class="img-thumbnail" src="img_flower2.jpg" alt="No hay imagenes"style="width: 700px;height: 350px;">
      <div class="caption">
        <h3>Chania</h3>
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
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

    <div class="row">
      <div class="thumbnails">
        <div class="col-sm-4 col-md4">
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

      <div class="thumbnails">
        <div class="col-sm-4 col-md4">
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

      <div class="thumbnails">
        <div class="col-sm-4 col-md4">
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

    </div>


		<?php
  include 'footer.php';

   $user = "usuario";
   session_register ("user");
   //$_SESSION['var']=$var;
   /* para ver usuario
   print ("<P>Valor de la variable de sesión:$user</P>\n");
	*/
   
		?>

  </body>
  </html>