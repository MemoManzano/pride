<?php

class Evaluado_Model extends ActiveRecord\Model{
	
	static $table_name = "evaluado";
	
	function verificarEvaluado($idUsuario,$idPeriodo,$idComision) {
	
		$condiciones = array("conditions" => array("id_usuario = ? AND id_periodo = ? AND id_comision = ?",$idUsuario,$idPeriodo,$idComision));
		$evaluado = Evaluado_Model::first($condiciones);
	
		if (!isset($evaluado))
			return true;
		else
			return false;
	}
	
	function nuevoEvaluado($idUsuario,$idPeriodo,$idComision) {
		
		if($this->verificarEvaluado($idUsuario, $idPeriodo, $idComision)){
			$evaluado = new Evaluado_Model();
			
			$evaluado->id_usuario = $idUsuario;
			$evaluado->id_periodo = $idPeriodo;
			$evaluado->id_comision = $idComision;
			
			$evaluado->save();
			
			$respuesta = array("exito" => 1,
								"mensaje" => "Profesor guardado como evaluado"
			);
		}else 
			
			$respuesta = array("exito" => 0,
					"mensaje" => "Profesor anteriormente guardado como evaluado");
			
			echo json_encode($respuesta);
	}
	
	
	public function profesoresEvaluados($cadena){
		//$join = 'inner join evaluador e on (usuario.id=e.id_usuario)';
		$evaluados = Evaluado_Model::find_by_sql("SELECT u.id as id_usuario, u.rfc, CONCAT_WS(' ', u.nombre, u.apaterno, u.amaterno ) as nombre, e.id as id_evaluado
												FROM usuario u
												INNER JOIN evaluado e ON u.id = e.id_usuario
												WHERE e.id_periodo = ( 
												SELECT MAX( id ) 
												FROM periodo ) 
												AND (
												nombre LIKE  '%$cadena%'
												OR u.rfc LIKE  '%$cadena%'
												)");
		//$evaluadores = Usuario::all(array('joins' => $join));
	
	
		$arreglo = array();
		foreach ($evaluados as $evaluado) {
			$arreglo[] = array("idUsuario" => $evaluado->id_usuario,
					"rfc" => $evaluado->rfc,
					"nombre" => $evaluado->nombre,
					"idEvaluado" => $evaluado->id_evaluado,
			);
		}
		echo json_encode($arreglo);
	
	
	}
	public function evaluadoSinEvaluador(){
		$evaluados = Evaluado_Model::find_by_sql("select u.id, u.rfc, concat(u.nombre,' ',u.apaterno,' ',u.amaterno) as evaluado from usuario u where u.id in(select e.id_usuario from evaluado e left join evaluador b on e.id_usuario=b.id_usuario where b.id_usuario is null);");
	
	
		$arreglo = array();
		foreach ($evaluados as $evaluado) {
			$arreglo[] = array("id" => "$evaluado->id",
					"rfc" => "$evaluado->rfc",
					"evaluado" => "$evaluado->evaluado",
			);
		}
		echo json_encode($arreglo);
	}
	
	public function evaluadosAsignados($idEvaluado){
		//$join = 'inner join evaluador e on (usuario.id=e.id_usuario)';
		$evaluados = Evaluado_Model::find_by_sql("select concat(a.id) as id_evaluado, a.id_usuario, u.rfc, concat(u.nombre,' ',u.apaterno,' ',u.amaterno) as evaluado from evaluado a, usuario u where u.id=a.id_usuario and a.id in(select e.id_evaluado from evaluador_evaluado e inner join evaluado a on e.id_evaluado=a.id)");
		//$evaluadores = Usuario::all(array('joins' => $join));
	
	
		$arreglo = array();
		foreach ($evaluadores as $evaluador) {
			$arreglo[] = array("id_evaluador" => "$evaluador->id_evaluador",
					"id_usuario" => "$evaluador->id_usuario",
					"rfc" => "$evaluador->rfc",
					"evaluador" => "$evaluador->evaluador",
			);
		}
		echo json_encode($arreglo);
	}
	
	function desasignarEvaluadoDelPeriodo($idEvaluado){
	
		$evaluado = Evaluado_Model::first("$idEvaluado");
	
		$evaluado->delete();
	
		$respuesta["mensaje"] = "Evaluado eliminado del periodo";
	
		echo json_encode($respuesta);
	}

}

?>