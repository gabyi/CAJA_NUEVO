<!-- barra de titulo -->

  <nav class="navbar navbar-fixed-top navbar-default scrollclass" role="navigation" id="navphp">
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
              <ul id="navUl" class="nav navbar-nav">
                <li class="active"><a href="index.php">Inicio</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profesionales<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="cuenta.php">Estado Previsional</a></li>
                      <li><a href="profbrowser1.php">Padrón de afiliados</a></li>   
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
                  <!--<li><a href="boletines.php">Boletines Informativos</a></li>-->
                  <li><a href="contacto.php">Contacto</a></li>
                  <li><a href="http://www.cforense.org/oldsite/index.php">P&aacute;gina versi&oacute;n anterior</a></li>
                  <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuario<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm" targett="#myModal">Login</a></li> 
                    </ul>
                </li>-->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Novedades</a>
                    <ul class="dropdown-menu" role="menu">
                    <li><a href="noticias.php">Noticias</a></li> 
                    </ul>
                </li>
              </ul>
            </div><!-- /.nav-collapse -->

            <!--<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                  <div class="modal-title"><span class="glyphicon glyphicon-user"></span> Login </div>
                  </div>
                  <div class="modal-body">
                    <form action="">
                      <div class="form-group">
                        <input type="text" class="form-control" id="usuario" placeholder="Usuario">
                      </div>
                      <div class="form-goup">
                        <input type="text" class="form-control" id="pass" placeholder="Contraseña">
                      </div>                      
                    </form>
                  </div>
                  <div class="modal-footer">
                    <div class="col-sm-4 col-md-4">
                    <button id="boton-noticia" style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-primary btn-lg" name='enviar'>Ingresar</button>
                    </div>
                    <div class="col-sm-4 col-md-4">
                    <button id="boton-noticia" style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-primary btn-lg" name='enviar'>Registrarse</button>
                  </div>
                </div>
              </div>
             </div>-->


      </div><!-- /.container -->
   </nav><!-- /.navbar -->