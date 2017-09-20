<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Encuesta_model extends CI_Model {

		/**
		 * Verificar si ya esta el propietario en la BD
		 * @since  18/9/2017
		 */
		public function verifyPropietario($arrData) 
		{
				$this->db->where($arrData["column"], $arrData["value"]);
				$query = $this->db->get("usuario");

				if ($query->num_rows() >= 1) {
					return true;
				} else{ return false; }
		}
		
		/**
		 * Lista de encuestas
		 * @since 18/9/2017
		 */
		public function get_encuestas($arrDatos) 
		{
				$this->db->select();
				if (array_key_exists("idEstablecimiento", $arrDatos)) {
					$this->db->where('id_establecimiento', $arrDatos["idEstablecimiento"]);
				}
				
				$this->db->order_by('id_establecimiento', 'asc');
				$query = $this->db->get('form_establecimiento');

				if ($query->num_rows() > 0) {
					return $query->result_array();
				} else {
					return false;
				}
		}
		
		/**
		 * Add/Edit FORM ESTABLECIMIENTO
		 * @since 19/9/2017
		 */
		public function saveEstablecimiento() 
		{
				$idEstablecimiento = $this->input->post('hddId');
				
				$data = array(
					'nombre_propietario' => $this->input->post('nombre'),
					'direccion' => $this->input->post('address'),
					'telefono' => $this->input->post('telefono'),
					'razon_social' => $this->input->post('razonSocial'),
					'cedula' => $this->input->post('documento'),
					'comuna' => $this->input->post('comuna')
				);	

				//revisar si es para adicionar o editar
				if ($idEstablecimiento == '') {
					$data['fecha_registro'] = date("Y-m-d G:i:s");;
					$query = $this->db->insert('form_establecimiento', $data);
					$idEstablecimiento = $this->db->insert_id();
				} else {
					$this->db->where('id_establecimiento', $idEstablecimiento);
					$query = $this->db->update('form_establecimiento', $data);
				}
				if ($query) {
					return $idEstablecimiento;
				} else {
					return false;
				}
		}

	
	    
	}