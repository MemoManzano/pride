<?php
include_once("niveles.php");
?>
<link href="../style.css" rel="stylesheet" type="text/css"> 
  <?  
  if ($_SESSION["usuarioNivel"] <= NIVEL_ADMIN)
  {
  ?>
    <td  class="ligamenuleft1"><strong><img src="imagenes/iconos/soporte.gif" width="13" height="15"> <a href="ProfesorGUI.php">Profesores</a></strong></td> 
  </tr>
  <tr>
    <td  class="ligamenuleft1"><strong><img src="imagenes/iconos/contacto.gif" width="13" height="14"> <a href="ContactoGUI.php">Contacto</a></strong></td>
  </tr>
  <tr> 
    <td colspan="2" class="ligamenuleft1"><strong><img src="imagenes/iconos/llave.jpg" width="13" height="15"> 
      <a href="pwd_maestro.php">Acceso maestro</a></strong></td>
  </tr>
  <?
  } 
  ?>
  <tr> 
    <td colspan="2" class="ligamenuleft1"><strong><img src="imagenes/iconos/reportes.gif" width="13" height="15"> 
      <a href="reportes.php">Reportes</a></strong></td>
  </tr>