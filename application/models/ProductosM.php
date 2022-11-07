<?php 
/**
  * 
  */
 class ProductosM extends CI_Model
 {
 	
 	/*function getProductos(){
 		$query = $this->db->get('Productos');
 		return $query->result();
 	}*/

  function getProductos(){
    $sql = "select * from Productos, Categoria where
    Productos.IdCategoria = Categoria.IdCategoria";
   
    $query = $this->db->query($sql);
    return $query->result();
  }

  function getCategorias(){
    $query = $this->db->get('Categoria');
    return $query->result();
  }

function getBusquedaProductos($termino){
    //$this->db->like('Nombre',$termino);
    //$query = $this->db->get('Productos');
    $sql = "select * from Productos, Categoria
    where 
    Productos.IdCategoria = Categoria.IdCategoria AND
    Nombre like '%$termino%' 
    or 
    Productos.IdCategoria = Categoria.IdCategoria AND
    Descripcion like '%$termino%' 
    ";

    echo $this->db->last_query();
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
        'Descripcion' => $this->input->post('Descripcion'),
        'IdCategoria' =>$this->input->post('IdCategoria')
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