<?php 
/**
  * 
  */
 class ProductosM extends CI_Model
 {
 	
 	function getProductos(){
 		$query = $this->db->get('Productos');
 		return $query->result();
 	}
function getBusquedaProductos($termino){
    //$this->db->like('Nombre',$termino);
    //$query = $this->db->get('Productos');


    $sql = "select * from Productos 
    where Nombre like '%$termino%' 
    or Descripcion like '%$termino%' ";
    $query = $this->db->query($sql);
    return $query->result();
  }

 	function getProducto($IdProducto){
 		$this->db->where('IdProducto',$IdProducto);
 		$query = $this->db->get('Productos');
 		return $query->result();
 	}

 	function deleteProducto($IdProducto){
 		$this->db->where('IdProducto', $IdProducto);
		$this->db->delete('Productos');
		return TRUE;
 	}

 	function insertProducto(){
 		$data = array(
        'Nombre' => $this->input->post('Nombre'),
        'Descripcion' => $this->input->post('Descripcion')

		);

		$this->db->insert('Productos', $data);
 	}

 	function updateProducto($IdProducto){
 		$data = array(
        'Nombre' => $this->input->post('Nombre'),
        'Descripcion' => $this->input->post('Descripcion')

		);
 		$this->db->where('IdProducto',$IdProducto);
		$this->db->update('Productos', $data);
 	}


 } ?>