<?php
//Objetos para los estimulos
//Javier Alpizar, 25 Feb 08

require_once("phplib/Fechas.inc.php");

class ProgramaA
{
	public $Inicio,$Fin;
	
	public function __construct()
	{}
	
	public function FechaFinal()
	{
		if($this->Fin == "") //valores nulos
			$r = "vigente";
		else
			$r = Fechas::FechaEspCorta($this->Fin);
		return $r;
		
	}
}

class ProgramaPAIPA extends ProgramaA
{
	public $Nivel,$Consejo,$Id;
	
	public function __construct()
	{}
	
}

class ProgramaPRIDE extends ProgramaA
{
	public $Nivel,$Consejo,$Id;
	
	public function __construct()
	{}
	
}

class ProgramaPAPIIT extends ProgramaA
{
	public $Nivel;
	
	public function __construct()
	{}
	
}

class ProgramaPASD extends ProgramaA
{
	public $Nivel;
	
	public function __construct()
	{}
	
}

class ProgramaPASPA extends ProgramaA
{
	public $Nivel;
	
	public function __construct()
	{}
	
}

class ProgramaPEPASIG extends ProgramaA
{
	public $Nivel,$Id;
	
	public function __construct()
	{}
	
}



class ProgramaPAPIME extends ProgramaA
{
	public $Proyecto,$Responsable,$Colaboradores;
	
	public function __construct()
	{}
	
}


class ProgramaFOMDOC extends ProgramaA
{
	public $Nivel;
	
	public function __construct()
	{}
	
}


class ProgramaPAL extends ProgramaA
{
	public $Year;
	
	public function __construct()
	{}
	
}


class ProgramaPAIP extends ProgramaA
{
	public $Year;
	
	public function __construct()
	{}
	
}

class ProgramaPerpae extends ProgramaA
{
	public $Proyecto,$Responsable,$Colaboradores;
	
	public function __construct()
	{}
	
}

class ProgramaPun_Rdu extends ProgramaA
{
	public $Proyecto,$Responsable,$Colaboradores;
	
	public function __construct()
	{}
	
}


/*
class EstimuloUNAM extends EstimuloQuimica
{
	public $Consejo;
	
	public function __construct()
	{}
}

class EstimuloExterno extends EstimuloQuimica
{
	public $Tipo;
	
	public function __construct()
	{}
	
}
*/
//Como cada programa contiene datos diferentes y otros comunes, se define una interface con metodos para
//mostrar en pantalla y otros conforme se necesiten que todos los programas de la unam deben implementar
interface IProgramaUNAMGUI
{
	//Muestra el programa en pantalla
	public function Ver($reporte);
}

interface IProgramaFQGUI
{
	//Muestra el programa en pantalla
	public function Ver($reporte);
}

//La clase base para todos los programas de la UNAM, se hace abstracta para q cada programa especifico la
//implemente
//abstract class ProgramaUNAM implements IProgramaUNAM
//{
//	public $Finicio,$Ffin;
//	public function GUI();
//}

//Para que imprim un programa PAIPA
class ProgramaPaipaGUI implements IProgramaUNAMGUI
{
	public $Programas;  //un arreglo de objectos ProgramaPaipa
	
	
	public function __construct()
	{}
	
	public function Ver($reporte)
	{
		if (sizeof($this->Programas) == 0)
			return "";
			$reporte->EncabezadoAmarilloPeque("Programa de Apoyo a la Incorporaci�n del Personal Acad�mico de Tiempo Completo (PAIPA)");
			$dimensiones=array(100);
			$els = array();
			//El primer el. trae siempre los encabezados de las tablas
			$elsEncabezado = array("Nivel");
			foreach($this->Programas as $programa)
            { 
              	//$els[] = array($programa->Nivel,$programa->Consejo,Fechas::FechaEspCorta($programa->Inicio),$programa->FechaFinal());
              	$els[] = array($programa->Nivel);
            }
            $reporte->TablaCompuestaNormal($dimensiones,$elsEncabezado,$els);
			
	}
	
}


//Para que imprim un programa Pride
class ProgramaPrideGUI implements IProgramaUNAMGUI
{
	public $Programas;  //un arreglo de objectos ProgramaPaipa
	
	
	public function __construct()
	{}
	
	public function Ver($reporte)
	{
		if (sizeof($this->Programas) == 0)
			return "";
		$reporte->EncabezadoAmarilloPeque("Programa de Primas al Desempe�o del Personal Acad�mico de Tiempo Completo (PRIDE)");
		//$dimensiones=array(10,44,20,26);
		$dimensiones=array(90);
		$els = array();
		//El primer el. trae siempre los encabezados de las tablas
		//$elsEncabezado = array("Nivel","Consejo acad�mico de �rea","Fecha de Inicio","Fecha de t�rmino");
		$elsEncabezado = array("Nivel");
		foreach($this->Programas as $programa)
        { 
           	//$els[] = array($programa->Nivel,$programa->Consejo,Fechas::FechaEspCorta($programa->Inicio),$programa->FechaFinal());
           	$els[] = array($programa->Nivel);
        }
        $reporte->TablaCompuestaNormal($dimensiones,$elsEncabezado,$els);
			
	}
	
}

class ProgramaPapiitGUI implements IProgramaUNAMGUI
{
	public $Programas;  //un arreglo de objectos ProgramaPaipa
	
	
	public function __construct()
	{}
	
	public function Ver($reporte)
	{
		if (sizeof($this->Programas) == 0)
			return "";
		$reporte->EncabezadoAmarilloPeque("Programa de Apoyo a Proyectos de Investigaci�n e Innovaci�n Tecnol�gica (PAPIIT)");
		$dimensiones=array(100);
		$els = array();
		//El primer el. trae siempre los encabezados de las tablas
		//$elsEncabezado = array("Nivel","Fecha de Inicio","Fecha de t�rmino");
		$elsEncabezado = array(); //array("Nivel");
		foreach($this->Programas as $programa)
        { 
           	//$els[] = array($programa->Nivel,Fechas::FechaEspCorta($programa->Inicio),$programa->FechaFinal());
           	$els[] = array($programa->Nivel);
        }
        $reporte->TablaCompuestaNormal($dimensiones,$elsEncabezado,$els);
			
	}
	
}


class ProgramaPasdGUI implements IProgramaUNAMGUI
{
	public $Programas;  //un arreglo de objectos ProgramaPaipa
	
	
	public function __construct()
	{}
	
	public function Ver($reporte)
	{
		if (sizeof($this->Programas) == 0)
			return "";
		$reporte->EncabezadoAmarilloPeque("Programa de Actualizaci�n y Superaci�n Docente(PASD)");
		$dimensiones=array(70,15,15);
		$els = array();
		//El primer el. trae siempre los encabezados de las tablas
		$elsEncabezado = array("Nivel","Fecha de Inicio","Fecha de t�rmino");
		foreach($this->Programas as $programa)
        { 
           	$els[] = array($programa->Nivel,Fechas::FechaEspCorta($programa->Inicio),$programa->FechaFinal());
        }
        $reporte->TablaCompuestaNormal($dimensiones,$elsEncabezado,$els);
			
	}
	
}


class ProgramaPaspaGUI implements IProgramaUNAMGUI
{
	public $Programas;  //un arreglo de objectos ProgramaPaipa
	
	
	public function __construct()
	{}
	
	public function Ver($reporte)
	{
		if (sizeof($this->Programas) == 0)
			return "";
		$reporte->EncabezadoAmarilloPeque("Programa de Apoyos para la Superaci�n del Personal Acad�mico de la UNAM (PASPA)");
		$dimensiones=array(85,15);
		$els = array();
		//El primer el. trae siempre los encabezados de las tablas
		$elsEncabezado = array("Nivel","�rea","Disciplina");
		foreach($this->Programas as $programa)
        { 
           	//$els[] = array($programa->Nivel,Fechas::FechaEspCorta($programa->Inicio),$programa->FechaFinal());
           	$els[] = array($programa->Nivel,"");
        }
        $reporte->TablaCompuestaNormal($dimensiones,$elsEncabezado,$els);
			
	}
	
}

class ProgramaPepasigGUI implements IProgramaUNAMGUI
{
	public $Programas;  //un arreglo de objectos ProgramaPaipa
	
	
	public function __construct()
	{}
	
	public function Ver($reporte)
	{
		if (sizeof($this->Programas) == 0)
			return "";
		$reporte->EncabezadoAmarilloPeque("Programa de Est�mulos a la Productividad y al Rendimiento del Personal Acad�mico de Asignatura (PEPASIG)");
		//$dimensiones=array(10,64,26);
		$dimensiones=array(90);
		$els = array();
		//El primer el. trae siempre los encabezados de las tablas
		//$elsEncabezado = array("Nivel","Fecha de Inicio","Fecha de t�rmino");
		$elsEncabezado = array("Nivel");
		foreach($this->Programas as $programa)
        { 
           //$els[] = array($programa->Nivel,Fechas::FechaEspCorta($programa->Inicio),$programa->FechaFinal());
           $els[] = array($programa->Nivel);
        }
        $reporte->TablaCompuestaNormal($dimensiones,$elsEncabezado,$els);
			
	}
	
}


class ProgramaPapimeGUI implements IProgramaUNAMGUI
{
	public $Programas;  //un arreglo de objectos ProgramaPaipa
	
	
	public function __construct()
	{}
	
	public function Ver($reporte)
	{
		if (sizeof($this->Programas) == 0)
			return "";
		$reporte->EncabezadoAmarilloPeque("Programa de Apoyo a Proyectos para la Innovaci�n y Mejoramiento de la Ense�anza (PAPIME)");
		$dimensiones=array(80,20);
		$els = array();
		//El primer el. trae siempre los encabezados de las tablas
		//$elsEncabezado = array("Nombre del Proyecto","Responsable","Colaboradores","Fecha de Inicio","Fecha de t�rmino");
		$elsEncabezado = array("Nombre del Proyecto","Responsable");
		foreach($this->Programas as $programa)
        { 
           	//$els[] = array($programa->Proyecto,$programa->Responsable,$programa->Colaboradores,Fechas::FechaEspCorta($programa->Inicio),$programa->FechaFinal());
           	$els[] = array($programa->Proyecto,$programa->Responsable);
        }
        $reporte->TablaCompuestaNormal($dimensiones,$elsEncabezado,$els);
	
	}
	
}


class ProgramaFomdocGUI implements IProgramaUNAMGUI
{
	public $Programas;  //un arreglo de objectos ProgramaPaipa
	
	
	public function __construct()
	{}
	
	public function Ver($reporte)
	{
		if (sizeof($this->Programas) == 0)
			return "";
		$reporte->EncabezadoAmarilloPeque("Programa Fomento a la Docencia (FOMDOC)");
		$dimensiones=array(70,15,15);
		$els = array();
		//El primer el. trae siempre los encabezados de las tablas
		$elsEncabezado = array("Nivel","Fecha de Inicio","Fecha de t�rmino");
		foreach($this->Programas as $programa)
        { 
           	$els[] = array($programa->Nivel,Fechas::FechaEspCorta($programa->Inicio),$programa->FechaFinal());
        }
        $reporte->TablaCompuestaNormal($dimensiones,$elsEncabezado,$els);
	}
	
}


class ProgramaPalGUI implements IProgramaFQGUI
{
	public $Programas;  //un arreglo de objectos ProgramaPaipa
	
	
	public function __construct()
	{}
	
	public function Ver($reporte)
	{
		if (sizeof($this->Programas) == 0)
			return "";
		$reporte->EncabezadoAmarilloPeque("Programa de Apoyo a la Licenciatura (PAL)");
		$dimensiones=array(100);
		$els = array();
		//El primer el. trae siempre los encabezados de las tablas
		$elsEncabezado = array("A�o");
		foreach($this->Programas as $programa)
        { 
           	$els[] = array($programa->Year);
        }
        $reporte->TablaCompuesta($dimensiones,$elsEncabezado,$els);
        return "";
	?>
		<table width="100%" border="0" cellpadding="5" cellspacing="1">
              <tr valign="top"> 
                <td colspan="5" class="rengloamarillo"><font size="1">Programa de Apoyo a la Licenciatura (PAL)</font></td>
              </tr>
              <tr valign="top"> 
                <td width="54%" class="renglogris">Nivel</td>
                
                <td width="13%" class="renglogris">Fecha de inicio</td>
                <td width="19%" class="renglogris">Fecha de t&eacute;rmino</td>
                <td width="14%"><table width="95" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr> 
                      <!-- <td width="134" class="agregar"><a href="agregar_nivel_unam.php"><font color="#3B7F1B">Agregar 
                        nivel</font></a></td> -->
                    </tr>
                  </table></td>
              </tr>
              <? foreach($this->Programas as $programa) 
              {
              ?>
	              <tr valign="top"> 
    	            <td class="ligagrisch"><strong>
    	            	<img src="imagenes/flechaazul.gif" width="9" height="9">
    	            	<? echo $programa->Nivel;  ?></strong>
    	            </td>
    	            <!-- 
                	<td class="txtgris10"><? echo Fechas::FechaEspCorta($programa->Inicio); ?></td>
                	<td class="txtgris10"><? echo $programa->FechaFinal(); ?></td>
                	 -->
                	<td width="14%">
                		<table width="80" border="0" align="center" cellpadding="0" cellspacing="0">
                    	<tr> 
                      		<!-- <td width="134" class="modificar"><a href="agregar_nivel_unam.php"><font color="#FFFFFF">Modificar</font></a></td> -->
                    	</tr>
                  		</table>
                  		<table width="80" border="0" align="center" cellpadding="0" cellspacing="0">
                    	<tr> 
                      		<!--  <td width="134" class="eliminar"><a href="#"><font color="#df2407">Eliminar  
                        	</font></a></td> -->
                    	</tr>
                  		</table>
                  	</td>
              	 </tr>
              	<?
				} 
				?>
				<tr valign="top"> 
                	<td colspan="5"><img src="imagenes/lineagrisv.gif" width="100%" height="1" vspace="5"></td>
              	</tr>
              </table>	
	<?	
	}
	
}


class ProgramaPaipGUI implements IProgramaFQGUI
{
	public $Programas;  //un arreglo de objectos ProgramaPaipa
	
	
	public function __construct()
	{}
	
	public function Ver($reporte)
	{
		if (sizeof($this->Programas) == 0)
			return "";
		$reporte->EncabezadoAmarilloPeque("Programa de Apoyo a la Investigaci�n y Posgrado (PAIP)");
		$dimensiones=array(100);
		$els = array();
		//El primer el. trae siempre los encabezados de las tablas
		$elsEncabezado = array("A�o");
		foreach($this->Programas as $programa)
        { 
           	$els[] = array($programa->Year);
        }
        $reporte->TablaCompuesta($dimensiones,$elsEncabezado,$els);
        return "";
	?>
		<table width="100%" border="0" cellpadding="5" cellspacing="1">
              <tr valign="top"> 
                <td colspan="5" class="rengloamarillo"><font size="1">Programa de Apoyo a la Investigaci�n y al Posgrado (PAIP)</font></td>
              </tr>
              <tr valign="top"> 
                <td width="54%" class="renglogris">Nivel</td>
                
                <td width="13%" class="renglogris">Fecha de inicio</td>
                <td width="19%" class="renglogris">Fecha de t&eacute;rmino</td>
                <td width="14%"><table width="95" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr> 
                      <!-- <td width="134" class="agregar"><a href="agregar_nivel_unam.php"><font color="#3B7F1B">Agregar 
                        nivel</font></a></td> -->
                    </tr>
                  </table></td>
              </tr>
              <? foreach($this->Programas as $programa) 
              {
              ?>
	              <tr valign="top"> 
    	            <td class="ligagrisch"><strong>
    	            	<img src="imagenes/flechaazul.gif" width="9" height="9">
    	            	<? echo $programa->Nivel;  ?></strong>
    	            </td>
                	<td class="txtgris10"><? echo Fechas::FechaEspCorta($programa->Inicio); ?></td>
                	<td class="txtgris10"><? echo $programa->FechaFinal(); ?></td>
                	<td width="14%">
                		<table width="80" border="0" align="center" cellpadding="0" cellspacing="0">
                    	<tr> 
                      		<!-- <td width="134" class="modificar"><a href="agregar_nivel_unam.php"><font color="#FFFFFF">Modificar</font></a></td> -->
                    	</tr>
                  		</table>
                  		<table width="80" border="0" align="center" cellpadding="0" cellspacing="0">
                    	<tr> 
                      		<!-- <td width="134" class="eliminar"><a href="#"><font color="#df2407">Eliminar 
                        	</font></a></td>  -->
                    	</tr>
                  		</table>
                  	</td>
              	 </tr>
              	<?
				} 
				?>
				<tr valign="top"> 
                	<td colspan="5"><img src="imagenes/lineagrisv.gif" width="100%" height="1" vspace="5"></td>
              	</tr>
              </table>	
	<?	
	}
	
}


class ProgramaPerpaeGUI implements IProgramaUNAMGUI
{
	public $Programas;  //un arreglo de objectos ProgramaPaipa
	
	
	public function __construct()
	{}
	
	public function Ver($reporte)
	{
		if (sizeof($this->Programas) == 0)
			return "";
		$reporte->EncabezadoAmarilloPeque("Programa de Est�mulos y Reconocimientos al Personal Acad�mico Em�rito (PERPAE)");
		//$dimensiones=array(30,20,22,13,15);
		$dimensiones=array(85,15);
		$els = array();
		//El primer el. trae siempre los encabezados de las tablas
		//var_dump($this->Programas);
		//$elsEncabezado = array("Nombre del Reconocimiento","Tipo de reconocimiento","Instituci�n otorgante","Area","Fecha de t�rmino");
		$elsEncabezado = array("Nombre del Reconocimiento","Fecha de designaci�n");
		foreach($this->Programas as $programa)
        { 
           	$els[] = array($programa->Proyecto,$programa->FechaFinal());
        }
        $reporte->TablaCompuesta($dimensiones,$elsEncabezado,$els);
	
	}
	
}


class ProgramaPun_RduGUI implements IProgramaUNAMGUI
{
	public $Programas;  //un arreglo de objectos ProgramaPaipa
	
	
	public function __construct()
	{}
	
	public function Ver($reporte)
	{
		if (sizeof($this->Programas) == 0)
			return "";
		$reporte->EncabezadoAmarilloPeque("Reconocimiento Distinci�n Universidad Nacional para J�venes Acad�micos (RDUNJA) y Premio Universidad Nacional (PUN)");
		//$dimensiones=array(58,10,10,9,9);
		$dimensiones=array(87,9);
		$els = array();
		//El primer el. trae siempre los encabezados de las tablas
		foreach($this->Programas as $programa)
        { 
			//$elsEncabezado = array("Nombre del Reconocimiento","Tipo de conocimiento","Instituci�n otorgante","�rea","Fecha en que se otorg�");
			$elsEncabezado = array("Nombre del Reconocimiento","A�o");
           	$els[] = array($programa->Proyecto,$programa->FechaFinal);
        $reporte->TablaCompuesta($dimensiones,$elsEncabezado,$els);
        }
	
	}
	
}

/*
class PRIDE extends ProgramaUNAM implements IProgramaUNAM
{
	public $Nivel,$Consejo;
	
	public function __construct()
	{}
	
}


//class PEPASIG
class FOMDOC extends ProgramaUNAM implements IProgramaUNAM
{
	public $Nivel;
	
	public function __construct()
	{}
}


class PAPIME extends ProgramaUNAM implements IProgramaUNAM
{
	public $Proyecto,$Responsable,$Colaboradores;
	
	public function __construct()
	{}
}

*/
?>