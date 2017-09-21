<!-- barra de titulo -->

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
              <ul id="navUl" class="nav navbar-nav">
                <li><a href="index.php">Inicio</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profesionales<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="cuenta.php">Estado Previsional</a></li>
                      <li><a href="padron.php">Padrón de afiliados</a></li>
                      <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Beneficios</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-submenu">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Formularios</a>
                                  <ul class="dropdown-menu">
                                <li><a href="formPrestamo.php">Prestamos</a></li>
                            </ul>
                        </li>   
                            </ul>
                        </li>   
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
                  <!--<li><a href="noticias.php">Noticias</a></li>-->
                  <li><a href="contacto.php">Contacto</a></li>
                  <li><a href="http://www.cforense.org/oldsite/index.php">P&aacute;gina versi&oacute;n anterior</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Novedades<span class="caret"></a>
                    <ul class="dropdown-menu" role="menu">
                    <li><a href="noticias.php">Noticias</a></li> 
                    </ul>
                  </li>       
              </ul>
            </div><!-- /.nav-collapse -->

      </div><!-- /.container -->
   </nav><!-- /.navbar -->

   <!-- Modal formularios -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Formularios</h4>
      </div>
      <div class="modal-body">
        <ul>
          <li><a href="formPrestamo.php" >Formulario de Préstamos</a></li>
          <li><a href="#" >Formulario de Subsidios</a></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>