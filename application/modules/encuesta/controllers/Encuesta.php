<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encuesta extends MX_Controller {
	
    public function __construct() {
        parent::__construct();
        $this->load->model("encuesta_model");
		$this->load->library("validarsesion");
    }
	
	/**
	 * Lista de MANZANAS
     * @since 19/9/2017
	 */
	public function manzana()
	{
			$arrParam = array();
			$data['info'] = $this->encuesta_model->get_manzanas($arrParam);
			
			$data["view"] = 'manzana';
			$this->load->view("layout", $data);
	}
	
    /**
     * Cargo modal - formulario manzanas
     * @since 19/9/2017
     */
    public function cargarModalManzana() 
	{
			header("Content-Type: text/plain; charset=utf-8"); //Para evitar problemas de acentos
			
			$data['information'] = FALSE;
			$data["identificador"] = $this->input->post("identificador");	
			
			$this->load->model("general_model");
			$arrParam = array(
				"table" => "param_roles",
				"order" => "id_rol",
				"id" => "x"
			);
			$data['sector'] = $this->general_model->get_basic_search($arrParam);//listado sectores
			
			if ($data["identificador"] != 'x') {
				$this->load->model("general_model");
				$arrParam = array(
					"table" => "form_manzana",
					"order" => "id_manzana",
					"column" => "id_manzana",
					"id" => $data["identificador"]
				);
				$data['information'] = $this->general_model->get_basic_search($arrParam);
			}
			
			$this->load->view("manzana_modal", $data);
    }
	
	/**
	 * Update MANZANA
     * @since 19/9/2017
	 */
	public function save_manzana()
	{			
			header('Content-Type: application/json');
			$data = array();
			
			$identificador = $this->input->post('hddId');
			
			$msj = "Se adicionó la manzana con éxito.";
			if ($identificador != '') {
				$msj = "Se actualizó la manzana con éxito.";
			}

			if ($identificador = $this->encuesta_model->saveManzana()) {
				$data["result"] = true;
				$data["idRecord"] = $identificador;
				
				$this->session->set_flashdata('retornoExito', $msj);
			} else {
				$data["result"] = "error";
				$data["idRecord"] = "";
				
				$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Contactarse con el Administrador.');
			}

			echo json_encode($data);
    }

	/**
	 * establecimiento List
     * @since 18/9/2017
	 */
	public function establecimiento($idManzana)
	{
			$arrParam = array("idManzana" => $idManzana);
			$data['info'] = $this->encuesta_model->get_establecimientos($arrParam);
			
			$arrParam = array("idManzana" => $idManzana);
			$data['infoManzana'] = $this->encuesta_model->get_manzanas($arrParam);

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
			$data["idManzana"] = $this->input->post("idManzana");

			if ($data["idEstablecimiento"] != 'x') 
			{
				$arrParam = array(
					"idEstablecimiento" => $data["idEstablecimiento"]
				);
				$data['information'] = $this->encuesta_model->get_establecimientos($arrParam);
				
				$data["idManzana"] = $data['information'][0]['fk_id_manzana'];
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
			$idManzana  = $this->input->post('hddId');

			$msj = "Se adicionó un nuevo establecimiento.";
			if ($idEstablecimiento != '') {
				$msj = "Se actualizó el establecimiento con éxito.";
			}			


			if ($idEstablecimiento = $this->encuesta_model->saveEstablecimiento()) {
				$data["result"] = true;					
				$this->session->set_flashdata('retornoExito', $msj);
				$data["idRecord"] = $idManzana;
			} else {
				$data["result"] = "error";
				$data["idRecord"] = "";
				$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Contactarse con el administrador.');
			}

			echo json_encode($data);
    }
	
		

	
	
}