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
		 * Lista de establecimientos
		 * @since 18/9/2017
		 */
		public function get_establecimientos($arrDatos) 
		{
				$this->db->select();
				if (array_key_exists("idEstablecimiento", $arrDatos)) {
					$this->db->where('id_establecimiento', $arrDatos["idEstablecimiento"]);
				}
				if (array_key_exists("idManzana", $arrDatos)) {
					$this->db->where('E.fk_id_manzana', $arrDatos["idManzana"]);
				}
				
				$this->db->order_by('id_establecimiento', 'asc');
				$query = $this->db->get('form_establecimiento E');

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
					'fk_id_manzana' => $this->input->post('hddIdManzana')
				);	

				//revisar si es para adicionar o editar
				if ($idEstablecimiento == '') {
					$data['fk_id_usuario'] = $this->session->id;
					$data['fecha_registro'] = date("Y-m-d G:i:s");
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
		
		/**
		 * Lista manzanas
		 * @since 19/9/2017
		 */
		public function get_manzanas($arrDatos) 
		{		
				$this->db->select();
				//$this->db->join('pruebas P', 'P.id_prueba = G.fk_id_prueba', 'INNER');
				if (array_key_exists("idManzana", $arrDatos)) {
					$this->db->where('M.id_manzana', $arrDatos["idManzana"]);
				}
				if (array_key_exists("idUsuario", $arrDatos)) {
					$this->db->where('M.fk_id_usuario', $arrDatos["idUsuario"]);
				}
				
				$this->db->order_by('barrio', 'asc');
				$query = $this->db->get('form_manzana M');

				if ($query->num_rows() > 0) {
					return $query->result_array();
				} else {
					return false;
				}
		}
		
		/**
		 * Add/Edit MANZANA
		 * @since 19/9/2017
		 */
		public function saveManzana() 
		{
				$identificador = $this->input->post('hddId');
				
				$data = array(
					'fk_id_sector' => $this->input->post('sector'),
					'fk_id_seccion' => $this->input->post('seccion'),
					'fk_id_manzana' => $this->input->post('manzana'),
					'fk_id_comuna' => $this->input->post('comuna'),
					'barrio' => $this->input->post('barrio')
				);
				
				//revisar si es para adicionar o editar
				if ($identificador == '') {
					$data['fk_id_usuario'] = $this->session->id;
					$data['fecha_creacion'] = date("Y-m-d G:i:s");
					$query = $this->db->insert('form_manzana', $data);
					$identificador = $this->db->insert_id();				
				} else {
					$this->db->where('id_manzana', $identificador);
					$query = $this->db->update('form_manzana', $data);
				}
				if ($query) {
					return $identificador;
				} else {
					return false;
				}
		}
		
		/**
		 * Info formulario administrativa
		 * @since 21/9/2017
		 */
		public function get_form_administrativa($arrDatos) 
		{
				$this->db->select();
				if (array_key_exists("idformulario", $arrDatos)) {
					$this->db->where('fk_id_formulario', $arrDatos["idformulario"]);
				}
				if (array_key_exists("idFormAdministrativa", $arrDatos)) {
					$this->db->where('A.id_administrativa', $arrDatos["idFormAdministrativa"]);
				}
				
				$query = $this->db->get('form_administrativa A');

				if ($query->num_rows() > 0) {
					return $query->row_array();
				} else {
					return false;
				}
		}
		
		/**
		 * Add form administrativa
		 * @since 21/9/2017
		 */
		public function add_form_administrativa() 
		{
			$idFormAdministrativa = $this->input->post('hddIdFormAdministrativa');
			
			$data = array(
				'fk_id_formulario' => $this->input->post('hddIdentificador'),
				'fk_id_usuario' => $this->session->userdata("id"),
				'visible' => $this->input->post('visible'),
				'aviso' => $this->input->post('aviso'),
				'matricula' => $this->input->post('matricula'),
				'porqueno' => $this->input->post('porqueno'),
				'estado_actual' => $this->input->post('estado_actual'),
				'establecimiento' => $this->input->post('establecimiento'),
				'tiempo' => $this->input->post('tiempo'),
				'rut' => $this->input->post('rut')
			);
			
			//revisar si es para adicionar o editar
			if ($idFormAdministrativa == '') {
				$data['fecha_registro'] = date("Y-m-d G:i:s");
				$query = $this->db->insert('form_administrativa', $data);				
			} else {
				$this->db->where('id_administrativa', $idFormAdministrativa);
				$query = $this->db->update('form_administrativa', $data);
			}
			
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

	
	    
	}