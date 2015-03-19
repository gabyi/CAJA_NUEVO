<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php
 include'head.php';
?>
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