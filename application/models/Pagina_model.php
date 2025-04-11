<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina_model extends CI_Model{

	function consultar_seccion($Id){
		$sql="exec pa_consultar_secciones @Id='".$Id."'";
		$query =$this->db->query($sql);
		if($query!=false){
			if($query->num_rows()>0){
				return $query->result_array();

			}else{
				return false;
			}

		}else{
			return false;
		}

	}

	function consultar_secciones(){
		$sql="exec pa_consultar_secciones_activas";
		$query=$this->db->query($sql);
		if($query!=false){
			if($query->num_rows()>0){
				return $query->result_array();
			}
		}else{
			return false;
		}
	}
	function consultar_secciones2(){
		$sql="exec pa_consultar_secciones_activas2";
		$query=$this->db->query($sql);
		if($query!=false){
			if($query->num_rows()>0){
				return $query->result_array();
			}
		}else{
			return false;
		}
	}

	function consultar_secciones_nav(){
		$sql="exec pa_consultar_secciones_navbar";
		$query=$this->db->query($sql);
		if($query!=false){
			if($query->num_rows()>0){
				return $query->result_array();
			}
		}else{
			return false;
		}
	}

	function consultar_servicios(){
		$sql="exec pa_consultar_servicios";
		$query=$this->db->query($sql);
		if($query!=false){
			if($query->num_rows()>0){
				return $query->result_array();
			}
		}else{
			return false;
		}
	}

	function consultar_carrusel(){
		$sql = "EXEC pa_consultar_carrusel";
		$query = $this->db->query($sql);
		if ($query != false) {
			if ($query->num_rows() > 0) {
				return $query->result_array();
			}
		}
		return false;
	}

	public function consultar_catalogos() {
		$sql = "EXEC pa_consultar_catalogos";
		$query = $this->db->query($sql);
		if ($query != false) {
			if ($query->num_rows() > 0) {
				return $query->result_array();
			}
		}
		return false;
	}
	public function obtener_quienes_somos() {
		$sql = "EXEC pa_obtener_quienes_somos";
		$query = $this->db->query($sql);
	
		if ($query !== false) {
			if ($query->num_rows() > 0) {
				return $query->row_array(); // Devuelve una fila
			}
		}
		return false;
	}
	public function consultar_valores() {
		$sql = "EXEC pa_consultar_valores";
		$query = $this->db->query($sql);
		if ($query != false) {
			if ($query->num_rows() > 0) {
				return $query->result_array();
			}
		}
		return false;
	}


	public function valores() {
		$sql = "EXEC pa_obtener_valores";
		$query = $this->db->query($sql);
		if ($query != false) {
			if ($query->num_rows() > 0) {
				return $query->result_array();
			}
		}
		return false;
	}


	public function consultar_contacto() {
        $sql = "EXEC pa_consultar_contacto";
        $query = $this->db->query($sql);
        
        if ($query != false) {
            if ($query->num_rows() > 0) {
                return $query->row_array(); // Devuelve la única fila
            }
        }
        return false;
    }


    public function consultar_redes_sociales() {
        $sql = "EXEC pa_consultar_redes_sociales";
        $query = $this->db->query($sql);
        if ($query !== false) {
            if ($query->num_rows() > 0) {
                return $query->result_array(); 
            }
        }
        return false;
    }
	public function consultar_titulo($id) {
		$sql = "EXEC pa_consultar_titulo @Id = ?";
		$query = $this->db->query($sql, array($id));
	
		if ($query !== false && $query->num_rows() > 0) {
			return $query->row_array(); // Devuelve una fila con el título
		}
		return false;
	}

	public function consultar_mujeres($id_subcategoria = NULL)
	{
		// Modificar la consulta SQL para pasar el id_subcategoria como parámetro
		$sql = "EXEC pa_consultar_mujer @id_subcategoria = ?";
		$query = $this->db->query($sql, array($id_subcategoria));
	
		if ($query != false) {
			if ($query->num_rows() > 0) {
				return $query->result_array(); 
			}
		}
		return false; 
	}

	public function consultar_subcategorias_M() {
		$sql = "SELECT Id, Subcategoria, id_catalogo FROM cat_subcategorias WHERE id_catalogo= 1 ORDER BY Subcategoria";
		$query = $this->db->query($sql);
	
		if ($query !== false) {
			return $query->result_array(); // Devuelve todas las subcategorías
		}
		return false; // Si la consulta falla
	}
	

	public function consultar_hombre($id_subcategoria = NULL){
		$sql = "EXEC pa_consultar_hombres @id_subcategoria = ?"; 
		$query = $this->db->query($sql, array($id_subcategoria));
		if ($query != false) {
			if ($query->num_rows() > 0) {
				return $query->result_array(); 
			}
		}
		return false; 
	}


	public function consultar_subcategorias_H() {
		$sql = "SELECT Id, Subcategoria, id_catalogo FROM cat_subcategorias WHERE id_catalogo= 2 ORDER BY Subcategoria";
		$query = $this->db->query($sql);
	
		if ($query !== false) {
			return $query->result_array(); // Devuelve todas las subcategorías
		}
		return false; // Si la consulta falla
	}

	public function consultar_rebajas(){
		$sql = "EXEC pa_consultar_rebajas"; 
		$query = $this->db->query($sql);
		if ($query != false) {
			if ($query->num_rows() > 0) {
				return $query->result_array(); 
			}
		}
		return false; 
	}
	public function consultar_detalle($id) {
		$sql = "EXEC pa_consultar_detalle_vestido @Id = ?";
		$query = $this->db->query($sql, array($id));
	
		if ($query !== false && $query->num_rows() > 0) {
			return $query->row_array(); 
		}
		return false;
	}

	public function consultar_detalle_hombre($id) {
		$sql = "EXEC pa_consultar_detalle_trajes @Id = ?";
		$query = $this->db->query($sql, array($id));
	
		if ($query !== false && $query->num_rows() > 0) {
			return $query->row_array(); 
		}
		return false;
	}

	public function registrar($correo, $contrasena) {
        $sql = "EXEC sp_insertar_usuario ?, ?";
        return $this->db->query($sql, array($correo, $contrasena));
    }

	

}