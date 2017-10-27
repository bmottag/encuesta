<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busqueda extends CI_Controller {
	
    public function __construct() {
        parent::__construct();
		$this->load->model("busqueda_model");
    }
	
	/**
	 * Search
     * @since 26/10/2017
	 */
    public function index() 
	{
			$data["view"] = "form_search";
			
			//Si envian los datos del filtro entonces lo direcciono a la lista respectiva con los datos de la consulta
			if($_POST)
			{				
				$arrParam = array(
					"idEstablecimiento" => $this->input->post('idEncuesta'),
					"nombre" => $this->input->post('nombre'),
					"documento" => $this->input->post('documento')
				);
				
				$data['info'] = $this->busqueda_model->get_establecimientos($arrParam);
				

				$data["view"] = "lista_establecimientos";
			}
			
			$this->load->view("layout", $data);
    }
	
	
	/**
	 * Lista de nombres de establecimientos
     * @since 26/10/2017
	 */
    public function nombreList() 
	{
        header("Content-Type: text/plain; charset=utf-8"); //Para evitar problemas de acentos
		
		
		//company list
		$arrParam = array(
			"nombre" => $this->input->post('nombre') 
		);
		$lista = $this->busqueda_model->get_establecimientos($arrParam);


		
		
        if ($lista) {

					
					
					echo json_encode(array('res' => 'full', 'data' => $lista));

				
        }else{
        	echo json_encode(array('res' => 'empty'));
        }
    }
	
	
	
	
	
	
	
	
	
	

	
}