<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Quitar extends Quitarcache {

	public function __construct() {
		parent::__construct();
		//cargamos todo lo que necesitemos

		//llamamos a la funci�n del controlador SuperController removeCache()
		$this->removeCache();
	}

	//m�s funciones y m�todos
}
?>