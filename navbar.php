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
                <li><a href="index.php">Inicio</a></li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">Profesionales<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="cuenta.php">Estado Previsional</a></li>
                      <li><a href="padron.php">Padrón de afiliados</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#formModal">Formularios</a></li>
                      <!--<li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Beneficios</a>
                            <ul class="dropdown-menu">
                                <li><a href="#" data-toggle="modal" data-target="#formModal">Formularios</a></li>   
                            </ul>
                        </li>--> 
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
                  <!--<li><a href="contacto.php" data-toggle="modal" data-target="#myModal">Contacto</a></li> para abrir con modal
                  
                  <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuario<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm" targett="#myModal">Login</a></li> 
                    </ul>
                </li>-->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Accesos Directos<span class="caret"></a>
                    <ul class="dropdown-menu" role="menu">
                    <li><a href="jurisprudencia.php">Jurisprudencia</a></li>
                    <li><a href="Noticias.php">Noticias</a></li>
                    <li><a href="archivos/memoria_2017.pdf">Memoria 2017</a></li>
                    <!--<li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li class="dropdown-submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">One more separated link</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                              </ul>
                            </li>-->
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
          <li><a onclick="window.open('archivos/solicitudDeInscripcion.pdf','','width=1100,height=900')" href="">Solicitud de Inscripción</a></li>
          <li><a href="formPrestamo.php" >Formulario de Solicitud de Préstamos</a></li>
          <li><a href="formNotebook.php" >Formulario de Compra de Notebooks</a></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>