<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encuesta extends MX_Controller {
	
    public function __construct() {
        parent::__construct();
        $this->load->model("encuesta_model");
		$this->load->library("validarsesion");
    }
	
	/**
	 * establecimiento List
     * @since 18/9/2017
	 */
	public function establecimiento()
	{
			$userRol = $this->session->rol;
			if ($userRol != 1 ) { 
				show_error('ERROR!!! - You are in the wrong place.');	
			}

			$arrParam = array();
			$data['info'] = $this->encuesta_model->get_encuestas($arrParam);
			
			$data["view"] = 'establecimiento';
			$this->load->view("layout", $data);
	}
	
    /**
     * Cargo modal - formulario establecimiento
     * @since 18/9/2017
     */
    public function cargarModalEstablecimiento() 
	{
			header("Content-Type: text/plain; charset=utf-8"); //Para evitar problemas de acentos
			
			$data['information'] = FALSE;
			$data["idEstablecimiento"] = $this->input->post("idEstablecimiento");

			if ($data["idEstablecimiento"] != 'x') 
			{
				$arrParam = array(
					"idEstablecimiento" => $data["idEstablecimiento"]
				);
				$data['information'] = $this->encuesta_model->get_encuestas($arrParam);
			}
			
			$this->load->view("establecimiento_modal", $data);
    }
	
	/**
	 * Guardar establecimiento
     * @since 18/9/2017
	 */
	public function save_establecimiento()
	{			
			header('Content-Type: application/json');
			$data = array();
			
			$idEstablecimiento = $this->input->post('hddId');

			$msj = "Se adicionó un nuevo establecimiento.";
			if ($idEstablecimiento != '') {
				$msj = "Se actualizó el establecimiento con éxito.";
			}			

			$documento = $this->input->post('documento');

			$result_user = false;
			$clave = "";
			if ($idEstablecimiento == '') {
				//Verify if the user already exist by the user name
				$arrParam = array(
					"column" => "cedula",
					"value" => $documento
				);
				$result_user = $this->encuesta_model->verifyPropietario($arrParam);
				//$clave = $this->generar_clave();
				$clave = $this->input->post('documento');
			}

			if ($result_user) {
				$data["result"] = "error";
				$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Este número de documento ya existe en la base de datos.');
			} else {
					if ($idUsuario = $this->admin_model->saveUser($clave)) {
						$data["result"] = true;					
						$this->session->set_flashdata('retornoExito', $msj);
						
						//a los usuarios nuevos les envio correo con contraseña
						if($idEstablecimiento == '') {
							$this->email($idUsuario);
						}
					} else {
						$data["result"] = "error";					
						$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Contactarse con el administrador.');
					}
			}

			echo json_encode($data);
    }
	
		

	
	
}