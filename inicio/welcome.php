<?php
//Pantalla de inicio
//Javier Alpizar, 16 Feb 07
//x=1
include_once("SessionOk.php");
include_once("lib/AvisosDALC.php");
include_once("phplib/Fechas.inc.php");

$avisos = AvisosDALC::ObtenAvisos($_SESSION["profesorId"],0,4);
//$avisosGenerales = AvisosDALC::Generales(2);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
</head>
      </table>
      <table width="95%" border="0" align="center" >  
        	<td width="64%" valign="top">
        		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
        			<?
        			//imprime los avisos personales
        			$lineaGris = "";
        			foreach($avisos as $aviso)
        			{
        				$resumen = $aviso->Contenido; //ObtenResumen($aviso->Contenido);
        				echo $lineaGris;
        				echo "<tr>
        						<td valign='top' class='backgris'><span class='txtrojo11'>Aviso</span>
        							<span class='txtcafe11'>- ".Fechas::FechaEspLarga($aviso->Fecha)."</span><br> 
        							<span class='ligaazul14'><a href='AvisoGUIProfesor.php?id=".$aviso->Id."'>".$aviso->Titulo."</a></span><br>".
        							$resumen.
        						"</td>
        					  </tr>";
        				$lineaGris = '<tr> 
          								<td valign="top" class="lineagrish"><img src="imagenes/lineagrisv.gif" width="100%" height="1" vspace="5"></td>
        						  </tr>';
        				
        			}
        			
        			 ?>
        			
            	</table>
            </td>	
          		<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
              <!--  
              -->

//Para obtener 50 palabras o las disponibles menores
function obtenResumen($resumen)
{
	$arr = explode(" ",$resumen);
	$palabras = min(50,count($arr));
	$resNuevo = array_slice($arr,0,$palabras);
	$resumen = implode($resNuevo," ");
	return $resumen;
}
?>