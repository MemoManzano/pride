<?php
//Solicita los datos para accesar al sistema
//Javier Alpizar, 15 Feb 08
//Puede recibir un parametro error 

header("Content-Type:text/html; charset=iso-8859-1");  //este encabezado sirve para q las funciones de aajx q traen acentos
			//funcionen bien, auque el header de la pagina html lo traia al parecer es necesario tambien desde php

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php $this->load->view("admin/templates/head");?>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/sha1.js"></script>
<script language="JavaScript">
<!--
function getlog()
		{

    	   	var usuario = document.form1.usuarioText.value;
	    	var pwd = document.form1.pwdText.value;
			
			pwd = pwd.toLowerCase();
			
			
			ipwd = hex_sha1(pwd);
			window.location = "LoginCtrl.php?usuario="+usuario+"&pwd="+ipwd;
			
		}

//-->
</script>
</head>
                <br>
                del Personal Acad�mico de Tiempo Completo</p>
          
       
          
          
          	<?php if(isset($mensaje)): ?>
          	
          	<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
              	<tbody><tr>
                	<td width="2%" class="renglorojo"><img src="<?php echo base_url("templates/admin");?>/imagenes/error.gif" width="30" height="30" align="absmiddle"></td>
                	<td width="98%" class="renglorojo" align="center"><?php echo  $mensaje;?> </td>
              	</tr>
            	</tbody></table>
          	
          	
     
     <?php endif;?>
     
     
<?php $this->load->view("admin/templates/footer");?>