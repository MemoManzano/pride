<?php
//El DALC para presentaciones multimedia, menu 5
//Javier Alpizar, 18 Abr 08

include_once("phplib/DbFactory.inc.php");



class MultimediaDALC
{ 

	public static function ObtenPresentaciones($profesorId,$inicio=NULL,$fin=NULL)
	{
		$oDb = DbFactory::ObtenDb();
		$query = "select id,nombre,fecha from multimedia
		where profesorId=$profesorId ";
		if ($inicio != NULL )
		{
			$fechas = " and fecha >= '$inicio' and fecha <= '$fin'";
			$query .= $fechas;
		}
		$query.= " order by fecha desc";
		//echo $query;
		$oDb->query($query);
		$arr = array();
		
		while ($rs = $oDb->getRecord("C"))
		{
			$arr[] = $rs;
		}
		//$arr[] = array("id"=>1,"nombre"=>"ev1","fecha"=>"2001-01-01");
		return $arr;
		
	}
	
	public static function ObtenPresentacion($id)
	{
		$oDb = DbFactory::ObtenDb();
		$query = "select id,nombre,fecha  
		from multimedia
		where id = $id";
		//echo $query;
		$oDb->query($query);
		$rs = $oDb->getRecord("C");
		return $rs;
	
	}
	
	
}