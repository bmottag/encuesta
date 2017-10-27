<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Busqueda_model extends CI_Model {
	    
		/**
		 * Establecimientos
		 * @since 26/10/2017
		 */
		public function get_establecimientos($arrDatos) 
		{
				$userRol = $this->session->userdata("rol");
				$userID = $this->session->userdata("id");
				$nombre = '%' . $arrDatos["nombre"] . '%';
			
				$this->db->select('E.*, U.nombres_usuario, U.apellidos_usuario, CONCAT(K.nombres_usuario, " ", K.apellidos_usuario) jefe');
				$this->db->join('usuario U', 'U.id_usuario = E.fk_id_usuario', 'INNER');
				$this->db->join('usuario K', 'K.id_usuario = U.fk_id_jefe', 'LEFT');
				if (array_key_exists("idEstablecimiento", $arrDatos) && $arrDatos["idEstablecimiento"] != '') {
					$this->db->where('id_establecimiento', $arrDatos["idEstablecimiento"]);
				}
				if (array_key_exists("nombre", $arrDatos) && $arrDatos["nombre"] != '') {
					$this->db->where('nombre_propietario LIKE', $nombre);
				}
				if (array_key_exists("documento", $arrDatos) && $arrDatos["documento"] != '') {
					$this->db->where('cedula', $arrDatos["documento"]);
				}

				$this->db->where('E.estado != ', 2); //estado diferente a inactivo
				
				//FILTRO POR EL ENCUESTADOR
				if($userRol==3) {					
					$this->db->where('E.fk_id_usuario', $userID);
				}
				//FILTRO POR EL SUPERVISOR
				if($userRol==2) {					
					$this->db->where('U.fk_id_jefe', $userID);
				}				
				
				$this->db->order_by('id_establecimiento', 'asc');
				$query = $this->db->get('form_establecimiento E');

				if ($query->num_rows() > 0) {
					return $query->result_array();
				} else {
					return false;
				}
		}

		
		
		
	    
	}