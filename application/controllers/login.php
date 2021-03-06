<?php

class Login extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("pride/administrador");
	}
	
	public function index() {
		$this->load->view("header");
		$this->load->view("login");
		$this->load->view("footer");
	}

	public function ingresa() {
		$rfc = $this->input->post("rfc");
		$pass = md5($this->input->post("pass"));
		
		if($this->administrador->loginAdmin($rfc,$pass)){
			$datosSesion = $this->administrador->datosAdmin($rfc,$pass);
			$this->session->set_userdata($datosSesion);
			
			$this->load->view("header");
			$this->load->view("administrador/navegacion");
			$this->load->view("administrador/bienvenido");
			$this->load->view("footer");
		}else{
			$error = array("error" => "Datos incorrectos");
			$this->load->view("header");
			$this->load->view("login",$error);
			$this->load->view("footer");
		}	
	}
}

?>