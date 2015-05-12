<? 
if (!$HTTP_POST_VARS){ 
?> 
<br> 

<form action="<? echo $PHP_SELF ?>" method=post> 
<body>
<div align="center">
  <p>&nbsp;</p>
  <table width="100%" border="0" bordercolor="#33CC66">
    <tr>
<td width="49%" nowrap="nowrap"><div align="center"><img src="../gaby/imagenes/logos/LOGO_curso.jpg" alt="Caja Forense" width="80%" height="25%" /></div></td>          </tr>
  </table>
 
  <p><h1 style="text-decoration: underline;">PROBABLE REEDICI&Oacute;N</h1></p>
  <p></p>
  <p><h2>CURSO INTEGRAL DE ACTUALIZACI&Oacute;N</h2></p>
  <p><h2>SOBRE EL NUEVO C&Oacute;DIGO CIVIL Y COMERCIAL</h2></p>
  <p><h2>POR LA FACULTAD DE CIENCIAS ECON&Oacute;MICAS Y JUR&Iacute;DICAS DE LA UNLPam</h2></p>
  
 <p>&nbsp;</p> <p>&nbsp;</p>

  <p><h2>FORMULARIO DE INSCRIPCI&Oacute;N DE POSTULANTES</h2></p>



  <label><strong>DATOS A COMPLETAR </strong><br />
    <br />
    <label>Apellido y Nombre:
      <input type="text" name="nombre" />
    </label>
    <p>
      <label>Localidad:                       
      <input type="text" name="localidad" />
      </label>
</p>
    <p>
      <label>Correo electr&oacute;nico :
      <input type="text" name="email" />
      </label>
</p>
    <p>
      <label>Telefono de Contacto:
      <input type="text" name="telefono" />
      </label>
</p>

<input name="submit" type=submit value="Enviar"> 
<br> 
<br> 
</form> 
<!--<a href="http://www.cforense.org/archivos/PROGRAMA_CURSO_NUEVO_CODIGO_CIVIL_Y_COMERCIAL.pdf"><h3>Programa
Completo</h3></a></p>
 -->
<? 
}else{ 
//Estoy recibiendo el formulario, compongo el cuerpo 
$cuerpo = "Formulario Pre-reserva recibido\r\n"; 
$cuerpo .= "Nombre: " . $HTTP_POST_VARS["nombre"] . "\r\n"; 
$cuerpo .= "Correo electronico: " . $HTTP_POST_VARS["email"] . "\r\n"; 
$cuerpo .= "Localidad: " . $HTTP_POST_VARS["localidad"] . "\r\n"; 
$cuerpo .= "Telefono: " . $HTTP_POST_VARS["telefono"] . "\r\n"; 


//mando el correo... 
mail("cursocodigocivilycomercial@cforense.org","Formulario reserva Curso codigo civil", $cuerpo, "from: ".$HTTP_POST_VARS["email"]."\r\n");

?>
  <table width="100%" border="0" bordercolor="#33CC66">
    <tr>
      <td width="49%" nowrap="nowrap"><div align="center"><img src="../gaby/imagenes/logos/LOGO_PAGINA_WEB_CENTRO.jpg" alt="Caja Forense" width="100%" height="20%" /></div></td>      
    </tr>
  </table>
<?

echo "<center><h2>El mensaje ha sido enviado correctamente, en breve recibir&aacute; una notificaci&oacute;n al correo electr&oacute;nico indicado.-</h2></center>"; 

} 
?> 
