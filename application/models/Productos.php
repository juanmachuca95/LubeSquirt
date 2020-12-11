<?php 

class Productos extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}


	function getProductos(){
		return $sql = $this->db->get('productos')->result();
	}


	function getProductosIDS($ids){
		$sql = array();
		if(is_array($ids) || is_object($ids)){
			foreach ($ids as $value) {
				$this->db->where('id_producto', $value);
				$sql[] = $this->db->get('productos')->row();
			}
			return $sql;	
		}
	}

	function getProductoId($id){
		$this->db->where('id_producto', $id);
		if($sql = $this->db->get('productos')){
			return $sql->row();
		}
		return false;
	}
	
}
?>