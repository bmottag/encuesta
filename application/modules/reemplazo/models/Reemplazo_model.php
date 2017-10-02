<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reemplazo_model extends CI_Model {

	/**
	 * Lista reemplazos
	 * @since 1/10/2017
	 */
	public function get_reemplazos($arrDatos) 
	{		
			$userRol = $this->session->userdata("rol");
			$userID = $this->session->userdata("id");
	
			$this->db->select();

			if (array_key_exists("idReemplazo", $arrDatos)) {
				$this->db->where('R.id_reemplazo', $arrDatos["idReemplazo"]);
			}
			//FILTRO POR EL SUPERVISOR
			if($userRol==3) {					
				$this->db->where('R.fk_id_usuario', $userID);
			}
			
			$this->db->order_by('idReemplazo', 'asc');
			$query = $this->db->get('form_reemplazo R');

			if ($query->num_rows() > 0) {
				return $query->result_array();
			} else {
				return false;
			}
	}
	
	/**
	 * Add/Edit REEMPLAZO
	 * @since 1/10/2017
	 */
	public function saveReemplazo() 
	{
			$identificador = $this->input->post('hddId');
			
			$data = array(
				'fk_id_sector' => $this->input->post('sector'),
				'fk_id_seccion' => $this->input->post('seccion'),
				'fk_id_manzana' => $this->input->post('manzana'),
				'fk_id_comuna' => $this->input->post('comuna'),
				'id_reemplazado' => $this->input->post('reemplazado'),
				'id_reemplazante' => $this->input->post('reemplazante'),
			);
			
			//revisar si es para adicionar o editar
			if ($identificador == '') {
				$data['fk_id_usuario'] = $this->session->id;
				$data['fecha_creacion'] = date("Y-m-d G:i:s");
				$query = $this->db->insert('form_reemplazo', $data);
				$identificador = $this->db->insert_id();				
			} else {
				$this->db->where('id_reemplazo', $identificador);
				$query = $this->db->update('form_reemplazo', $data);
			}
			if ($query) {
				return $identificador;
			} else {
				return false;
			}
	}
}