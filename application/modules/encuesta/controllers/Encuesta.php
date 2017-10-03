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
			
			if ($data["identificador"] != 'x') {				
				$arrParam = array(
					"idManzana" => $data["identificador"]
				);
				$data['information'] = $this->encuesta_model->get_manzanas($arrParam);
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
			
			
			//busco informacion del formulario si existe
			$arrParam = array(
				"idFormulario" => $idFormulario
			);				
			$data['information_form1'] = $this->encuesta_model->get_form_administrativa($arrParam);
			$data['information_form2'] = $this->encuesta_model->get_form_actividad_economica($arrParam);
			$data['information_form3'] = $this->encuesta_model->get_form_criticos($arrParam);
			$data['information_form4'] = $this->encuesta_model->get_form_financiera($arrParam);
			$data['information_form5'] = $this->encuesta_model->get_form_servicios($arrParam);
			$data['information_form6'] = $this->encuesta_model->get_form_formalizacion($arrParam);

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
						
			if($this->encuesta_model->add_form_administrativa()) 
			{
				//redireccionamiento del formulario
				//si se termino la encuesta lo envio al formulario de control de lo contrario lo envio al siguiente formulario
				$estado_actual =  $this->input->post('estado_actual');
				$establecimiento = $this->input->post('establecimiento');
			
				$data["redireccionamiento"] = "form_control/" . $idFormulario;
				if($estado_actual == 1){
					$data["redireccionamiento"] = "form_actividad_economica/" . $idFormulario;
					if($establecimiento == 3 || $establecimiento == 4){
						$data["redireccionamiento"] = "form_control/" . $idFormulario;
					}
				}

				$data["result"] = true;
				$data["mensaje"] = "Se guardó la información con éxito.";
				$this->session->set_flashdata('retornoExito', 'Se guardó la información con éxito.');
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
			
			$arrParam = array(
				"idEstablecimiento" => $idFormulario
			);
			$data['information_establecimiento'] = $this->encuesta_model->get_establecimientos($arrParam);//informacion del establecimiento

			//busco informacion del formulario si existe
			$arrParam = array(
				"idFormulario" => $idFormulario
			);				
			$data['information'] = $this->encuesta_model->get_form_actividad_economica($arrParam);
			
			$data['information_form1'] = $this->encuesta_model->get_form_administrativa($arrParam);	

			$data['lista_actividad_economica'] = $this->encuesta_model->get_lista_actividad_economica();				

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
				$this->session->set_flashdata('retornoExito', 'Se guardó la información con éxito.');
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
				$this->session->set_flashdata('retornoExito', 'Se guardó la información con éxito.');
			} else {
				$data["result"] = "error";
				$data["mensaje"] = "Error!!! Contactarse con el administrador.";
				$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Contactarse con el administrador.');
			}

			echo json_encode($data);
    }
	
	/**
	 * Form financiera
     * @since 20/9/2017
	 */
	public function form_financiera($idFormulario)
	{
			$data['information'] = FALSE;
			
			//busco informacion del formulario si existe
			$arrParam = array(
				"idFormulario" => $idFormulario
			);				
			$data['information'] = $this->encuesta_model->get_form_financiera($arrParam);

			if ($data['information']) { 
				$data["idFormFinanciera"] = $data['information']['id_financiera'];
			}else{
				$data["idFormFinanciera"] = "";
			}

			$data["idFormulario"] = $idFormulario;
			$data["view"] = 'form_financiera';
			$this->load->view("layout", $data);
	}
	
	/**
	 * Guardar formulario financiera
     * @since 21/9/2017
	 */
	public function save_form_financiera()
	{			
			header('Content-Type: application/json');
			$data = array();
			
			$idFormulario = $this->input->post('hddIdentificador');
			$data["idFormulario"] = $idFormulario;

			if($this->encuesta_model->add_form_financiera()) 
			{
				$data["result"] = true;
				$data["mensaje"] = "Se guardó la información con éxito.";
				$this->session->set_flashdata('retornoExito', 'Se guardó la información con éxito.');
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

			//busco informacion del formulario si existe
			$arrParam = array(
				"idFormulario" => $idFormulario
			);				
			$data['information'] = $this->encuesta_model->get_form_servicios($arrParam);

			if ($data['information']) { 
				$data["idFormServicios"] = $data['information']['id_servicios'];
			}else{
				$data["idFormServicios"] = "";
			}
			
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

			if($this->encuesta_model->add_form_servicios()) 
			{
				$data["result"] = true;
				$data["mensaje"] = "Se guardó la información con éxito.";
				$this->session->set_flashdata('retornoExito', 'Se guardó la información con éxito.');
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

			$arrParam = array(
				"idEstablecimiento" => $idFormulario
			);
			$data['information_establecimiento'] = $this->encuesta_model->get_establecimientos($arrParam);//informacion del establecimiento
						
			//busco informacion del formulario si existe
			$arrParam = array(
				"idFormulario" => $idFormulario
			);				
			$data['information'] = $this->encuesta_model->get_form_formalizacion($arrParam);
						
			$data['information_form1'] = $this->encuesta_model->get_form_administrativa($arrParam);
			$data['information_form2'] = $this->encuesta_model->get_form_actividad_economica($arrParam);
			$data['information_form4'] = $this->encuesta_model->get_form_financiera($arrParam);

			if ($data['information']) { 
				$data["idFormFormalizacion"] = $data['information']['id_formalizacion'];
			}else{
				$data["idFormFormalizacion"] = "";
			}
			
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

			if($this->encuesta_model->add_form_formalizacion()) 
			{
				$data["result"] = true;
				$data["mensaje"] = "Se guardó la información con éxito.";
				$this->session->set_flashdata('retornoExito', 'Se guardó la información con éxito.');
			} else {
				$data["result"] = "error";
				$data["mensaje"] = "Error!!! Contactarse con el administrador.";
				$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Contactarse con el administrador.');
			}

			echo json_encode($data);
    }
	
	/**
	 * Lista de sectores por comuna
     * @since 22/9/2017
	 */
    public function sectorList()
	{
			header("Content-Type: text/plain; charset=utf-8"); //Para evitar problemas de acentos

			$arrParam['idComuna'] = $this->input->post('identificador');
			$lista = $this->encuesta_model->get_sector_by($arrParam);
		
			echo "<option value=''>Select...</option>";
			if ($lista) {
				foreach ($lista as $fila) {
					echo "<option value='" . $fila["idSector"] . "' >" . $fila["idSector"] . "</option>";
				}
			}
    }
	
	/**
	 * Lista de secciones por sector
     * @since 22/9/2017
	 */
    public function seccionList()
	{
			header("Content-Type: text/plain; charset=utf-8"); //Para evitar problemas de acentos

			$arrParam['idSector'] = $this->input->post('identificador');
			$arrParam['idComuna'] = $this->input->post('comuna');
			$lista = $this->encuesta_model->get_seccion_by($arrParam);
		
			echo "<option value=''>Select...</option>";
			if ($lista) {
				foreach ($lista as $fila) {
					echo "<option value='" . $fila["idSeccion"] . "' >" . $fila["idSeccion"] . "</option>";
				}
			}
    }

	/**
	 * Lista de manzanas por sector
     * @since 22/9/2017
	 */
    public function manzanaList()
	{
			header("Content-Type: text/plain; charset=utf-8"); //Para evitar problemas de acentos

			$arrParam['idSeccion'] = $this->input->post('identificador');
			$arrParam['idSector'] = $this->input->post('sector');
			$arrParam['idComuna'] = $this->input->post('comuna');
			$lista = $this->encuesta_model->get_manzana_by($arrParam);

			echo "<option value=''>Select...</option>";
			if ($lista) {
				foreach ($lista as $fila) {
					echo "<option value='" . $fila["idManzana"] . "' >" . $fila["idManzana"] . "</option>";
				}
			}
    }
	
	/**
	 * encuesta control
     * @since 28/9/2017
	 */
	public function form_control($idFormulario)
	{
			$arrParam = array("idFormulario" => $idFormulario);
			$data['info'] = $this->encuesta_model->get_control($arrParam);

			$data["idFormulario"] = $idFormulario;
			$data["view"] = 'control';
			$this->load->view("layout", $data);
	}
	
    /**
     * Cargo modal - encuesta control
     * @since 28/9/2017
     */
    public function cargarModalControl() 
	{
			header("Content-Type: text/plain; charset=utf-8"); //Para evitar problemas de acentos
			
			$data['information'] = FALSE;
			$data["idControl"] = $this->input->post("idControl");
			$data["idFormulario"] = $this->input->post("idFormulario");

			if ($data["idControl"] != 'x') 
			{
				$arrParam = array(
					"idControl" => $data["idControl"]
				);
				$data['information'] = $this->encuesta_model->get_control($arrParam);
				
				$data["idFormulario"] = $data['information'][0]['fk_id_formulario'];
			}
			
			$this->load->view("control_modal", $data);
    }
	
	/**
	 * Guardar control
     * @since 28/9/2017
	 */
	public function save_control()
	{			
			header('Content-Type: application/json');
			$data = array();
			
			$idControl = $this->input->post('hddId');
			$idFormulario  = $this->input->post('hddIdFormulario');

			$msj = "Se adicionó un nuevo registro de control.";
			if ($idControl != '') {
				$msj = "Se actualizó registro.";
			}			

			$data["idRecord"] = $idFormulario;
			if ($idControl = $this->encuesta_model->saveControl()) {
				$data["result"] = true;					
				$this->session->set_flashdata('retornoExito', $msj);
			} else {
				$data["result"] = "error";
				$this->session->set_flashdata('retornoError', '<strong>Error!!!</strong> Contactarse con el administrador.');
			}

			echo json_encode($data);
    }
	
	/**
	 * Lista de divisiones por actividad
     * @since 2/10/2017
	 */
    public function divisionList()
	{
			header("Content-Type: text/plain; charset=utf-8"); //Para evitar problemas de acentos

			$arrParam['idActividad'] = $this->input->post('identificador');
			$lista = $this->encuesta_model->get_division_by($arrParam);

			echo "<option value=''>Select...</option>";
			if ($lista) {
				foreach ($lista as $fila) {
					echo "<option value='" . $fila["ID"] . "' >" . $fila["DESCRIPCION"] . "</option>";
				}
			}
    }


	
	
}