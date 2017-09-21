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
			$idManzana  = $this->input->post('hddIdManzana');

			$msj = "Se adicionó un nuevo establecimiento.";
			if ($idEstablecimiento != '') {
				$msj = "Se actualizó el establecimiento con éxito.";
			}			

			$data["idRecord"] = $idManzana;
			if ($idEstablecimiento = $this->encuesta_model->saveEstablecimiento()) {
				$data["result"] = true;					
				$this->session->set_flashdata('retornoExito', $msj);
			} else {
				$data["result"] = "error";
				$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Contactarse con el administrador.');
			}

			echo json_encode($data);
    }
	
	/**
	 * Vista con los enlaces a los capitulos del formulario
     * @since 20/9/2017
	 */
	public function form_home($idFormulario)
	{
			$arrParam = array(
				"idEstablecimiento" => $idFormulario
			);
			$data['information'] = $this->encuesta_model->get_establecimientos($arrParam);//informacion del establecimiento
		
			$data['idFormulario'] = $idFormulario;
			$data["view"] = 'home';
			$this->load->view("layout", $data);
	}
	
	/**
	 * Form administrativos
     * @since 20/9/2017
	 */
	public function form_administrativos($idFormulario)
	{
			$data['information'] = FALSE;
			
			//busco informacion del formulario si existe
			$arrParam = array(
				"idFormulario" => $idFormulario
			);				
			$data['information'] = $this->encuesta_model->get_form_administrativa($arrParam);

			if ($data['information']) { 
				$data["idFormAdministrativa"] = $data['information']['id_administrativa'];
			}else{
				$data["idFormAdministrativa"] = "";
			}

			$data["idFormulario"] = $idFormulario;
			$data["view"] = 'form_administrativo';
			$this->load->view("layout", $data);
	}
	
	/**
	 * Guardar formulario administrativa
     * @since 21/9/2017
	 */
	public function save_form_administrativa()
	{			
			header('Content-Type: application/json');
			$data = array();
			
			$idFormulario = $this->input->post('hddIdentificador');
			$data["idFormulario"] = $idFormulario;

			if($this->encuesta_model->add_form_administrativa()) 
			{
				$data["result"] = true;
				$data["mensaje"] = "Se guardó la información con éxito.";
				$this->session->set_flashdata('retornoExito', 'Se guardo la información con éxito.');
			} else {
				$data["result"] = "error";
				$data["mensaje"] = "Error!!! Contactarse con el administrador.";
				$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Contactarse con el administrador.');
			}

			echo json_encode($data);
    }
	
	/**
	 * Form Características Generales de la Actividad Económica						
     * @since 20/9/2017
	 */
	public function form_actividad_economica($idFormulario)
	{
			$data['information'] = FALSE;

			//busco informacion del formulario si existe
			$arrParam = array(
				"idFormulario" => $idFormulario
			);				
			$data['information'] = $this->encuesta_model->get_form_actividad_economica($arrParam);

			if ($data['information']) { 
				$data["idFormActividadEconomica"] = $data['information']['id_actividad_economica'];
			}else{
				$data["idFormActividadEconomica"] = "";
			}
			
			$data["idFormulario"] = $idFormulario;
			$data["view"] = 'form_actividad_economica';
			$this->load->view("layout", $data);	
	}

	/**
	 * Guardar formulario administrativa
     * @since 21/9/2017
	 */
	public function save_form_actividad_economica()
	{			
			header('Content-Type: application/json');
			$data = array();
			
			$idFormulario = $this->input->post('hddIdentificador');
			$data["idFormulario"] = $idFormulario;

			if($this->encuesta_model->add_form_actividad_economica()) 
			{
				$data["result"] = true;
				$data["mensaje"] = "Se guardó la información con éxito.";
				$this->session->set_flashdata('retornoExito', 'Se guardo la información con éxito.');
			} else {
				$data["result"] = "error";
				$data["mensaje"] = "Error!!! Contactarse con el administrador.";
				$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Contactarse con el administrador.');
			}

			echo json_encode($data);
    }

	/**
	 * Form Características Generales de la Actividad Económica						
     * @since 20/9/2017
	 */
	public function form_criticos($idFormulario)
	{
			$data['information'] = FALSE;
			$data['deshabilitar'] = '';
			
			//busco informacion del formulario si existe
			$arrParam = array(
				"idFormulario" => $idFormulario
			);				
			$data['information'] = $this->encuesta_model->get_form_criticos($arrParam);

			if ($data['information']) { 
				$data["idFormCriticos"] = $data['information']['id_criticos'];
			}else{
				$data["idFormCriticos"] = "";
			}

			$data["idFormulario"] = $idFormulario;
			$data["view"] = 'form_criticos';
			$this->load->view("layout", $data);	
	}
	
	/**
	 * Guardar formulario criticos
     * @since 21/9/2017
	 */
	public function save_form_criticos()
	{			
			header('Content-Type: application/json');
			$data = array();
			
			$idFormulario = $this->input->post('hddIdentificador');
			$data["idFormulario"] = $idFormulario;

			if($this->encuesta_model->add_form_criticos()) 
			{
				$data["result"] = true;
				$data["mensaje"] = "Se guardó la información con éxito.";
				$this->session->set_flashdata('retornoExito', 'Se guardo la información con éxito.');
			} else {
				$data["result"] = "error";
				$data["mensaje"] = "Error!!! Contactarse con el administrador.";
				$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Contactarse con el administrador.');
			}

			echo json_encode($data);
    }
	
	/**
	 * Form Información Financiera del Establecimiento				
     * @since 20/9/2017
	 */
	public function form_financiera($idFormulario)
	{
			$data['information'] = FALSE;
			$data['deshabilitar'] = '';
			
			
			//si envio el id, entonces busco la informacion 
			
	/*		
			if ($idFormulario != 'x') {
				
				$arrParam = array(
					"idNearMiss" => $id
				);				
				$data['information'] = $this->incidences_model->get_near_miss_by_idUser($arrParam);
				
				if (!$data['information']) { 
					show_error('ERROR!!! - You are in the wrong place.');	
				}
			}			
	*/
			$data["idFormulario"] = $idFormulario;
			$data["view"] = 'form_financiera';
			$this->load->view("layout", $data);
	}
	
	/**
	 * Guardar formulario administrativa
     * @since 21/9/2017
	 */
	public function save_form_financiera()
	{			
			header('Content-Type: application/json');
			$data = array();
			
			$idFormulario = $this->input->post('hddIdentificador');
			$data["idFormulario"] = $idFormulario;

			if($this->encuesta_model->add_form_actividad_economica()) 
			{
				$data["result"] = true;
				$data["mensaje"] = "Se guardó la información con éxito.";
				$this->session->set_flashdata('retornoExito', 'Se guardo la información con éxito.');
			} else {
				$data["result"] = "error";
				$data["mensaje"] = "Error!!! Contactarse con el administrador.";
				$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Contactarse con el administrador.');
			}

			echo json_encode($data);
    }
	
	/**
	 * Form Características Generales de la Actividad Económica						
     * @since 20/9/2017
	 */
	public function form_servicios($idFormulario)
	{
			$data['information'] = FALSE;
			$data['deshabilitar'] = '';
			
			
			//si envio el id, entonces busco la informacion 
			
	/*		
			if ($idFormulario != 'x') {
				
				$arrParam = array(
					"idNearMiss" => $id
				);				
				$data['information'] = $this->incidences_model->get_near_miss_by_idUser($arrParam);
				
				if (!$data['information']) { 
					show_error('ERROR!!! - You are in the wrong place.');	
				}
			}			
	*/
			$data["idFormulario"] = $idFormulario;
			$data["view"] = 'form_servicios';
			$this->load->view("layout", $data);
	}
	
	/**
	 * Guardar formulario administrativa
     * @since 21/9/2017
	 */
	public function save_form_servicios()
	{			
			header('Content-Type: application/json');
			$data = array();
			
			$idFormulario = $this->input->post('hddIdentificador');
			$data["idFormulario"] = $idFormulario;

			if($this->encuesta_model->add_form_actividad_economica()) 
			{
				$data["result"] = true;
				$data["mensaje"] = "Se guardó la información con éxito.";
				$this->session->set_flashdata('retornoExito', 'Se guardo la información con éxito.');
			} else {
				$data["result"] = "error";
				$data["mensaje"] = "Error!!! Contactarse con el administrador.";
				$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Contactarse con el administrador.');
			}

			echo json_encode($data);
    }
	
	/**
	 * Form Formalización Empresarial (solo se aplica a informales)							
     * @since 20/9/2017
	 */
	public function form_formalizacion($idFormulario)
	{
			$data['information'] = FALSE;
			$data['deshabilitar'] = '';
			
			
			//si envio el id, entonces busco la informacion 
			
	/*		
			if ($idFormulario != 'x') {
				
				$arrParam = array(
					"idNearMiss" => $id
				);				
				$data['information'] = $this->incidences_model->get_near_miss_by_idUser($arrParam);
				
				if (!$data['information']) { 
					show_error('ERROR!!! - You are in the wrong place.');	
				}
			}			
	*/
			$data["idFormulario"] = $idFormulario;
			$data["view"] = 'form_formalizacion';
			$this->load->view("layout", $data);
	}
	
	/**
	 * Guardar formulario administrativa
     * @since 21/9/2017
	 */
	public function save_form_formalizacion()
	{			
			header('Content-Type: application/json');
			$data = array();
			
			$idFormulario = $this->input->post('hddIdentificador');
			$data["idFormulario"] = $idFormulario;

			if($this->encuesta_model->add_form_actividad_economica()) 
			{
				$data["result"] = true;
				$data["mensaje"] = "Se guardó la información con éxito.";
				$this->session->set_flashdata('retornoExito', 'Se guardo la información con éxito.');
			} else {
				$data["result"] = "error";
				$data["mensaje"] = "Error!!! Contactarse con el administrador.";
				$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Contactarse con el administrador.');
			}

			echo json_encode($data);
    }
	
}