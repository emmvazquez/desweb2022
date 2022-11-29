<?php  
/**
 * 
 */
class ProductosC extends CI_Controller
{
	function __construct() {
	       parent::__construct();
	       if(!$this->session->userdata('Logeado')){
	       	redirect(base_url());
	       }
	}


	public function show(){
		$this->load->model('ProductosM');
		$data['productos'] = $this->ProductosM->getProductos();
		$this->load->view('headers/head.php');
		$this->load->view('headers/menu.php');


		$this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');

                $this->form_validation->set_rules('Termino', 'Termino', 'required');

                if ($this->form_validation->run() == FALSE)
                {

			$this->load->view('productos/listaProductos.php',$data);

                }
                else
                {
                	   $data['productos'] = $this->ProductosM->getBusquedaProductos($this->input->post('Termino'));
                        $this->load->view('productos/listaProductos.php',$data);
                }

                $this->load->view('headers/footer.php');
		
	}

	public function detalleProducto($IdProducto){
		$this->load->model('ProductosM');
		$data['producto'] = $this->ProductosM->getProducto($IdProducto);


		$this->load->view('headers/head.php');
		$this->load->view('headers/menu.php');
		$this->load->view('productos/detalleProducto.php',$data);
		$this->load->view('headers/footer.php');
	}

	public function borrarProducto($IdProducto){
		if($this->session->userdata('Perfil')==1){
	       	$this->load->model('ProductosM');
			if($this->ProductosM->deleteProducto($IdProducto)){
				redirect(base_url('index.php/ProductosC/show'),'refresh');
			}
	       }
		

	}


	public function insertProducto(){
		$this->load->model('ProductosM');
		$data['categorias'] = $this->ProductosM->getCategorias();
		$this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');
                $this->form_validation->set_rules('Nombre', 'Nombre', 'required');
                if ($this->form_validation->run() == FALSE)
                {		
                		$this->load->view('headers/head.php');
						$this->load->view('headers/menu.php');
                        $this->load->view('productos/insertProducto',$data);
                        $this->load->view('headers/footer.php');
                }
                else
                {
                       $this->ProductosM->insertProducto();
                       redirect(base_url('index.php/ProductosC/show'),'refresh');
                }
	}


		public function insertImagen($IdProducto){
			 $this->load->model('ProductosM');
			 $data['imagenes'] = $this->ProductosM->getImagenesPorProducto($IdProducto);
		  $this->load->library('form_validation');
                $this->form_validation->set_rules('subir', 'subir', 'required');
                $data['IdProducto'] = $IdProducto;
                if ($this->form_validation->run() == FALSE)
                {
                	   $this->load->view('headers/head.php');
			   $this->load->view('headers/menu.php');
                        $this->load->view('productos/insertImagenProducto',$data);
                        $this->load->view('headers/footer.php');
                }
                else
	                {
	                $file_name = $IdProducto.'-'.md5(date('d-m-Y-h-mm-s'));

			  $config['upload_path']          = './uploads/';
	                $config['allowed_types']        = 'png|jpeg|jpg';
	                $config['max_size']             = 10000;
	                $config['max_width']            = 10024;
	                $config['max_height']           = 4768;
	                $config['file_name'] = $file_name;
	                $this->upload->initialize($config);
	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('imagen'))
	                {
	                	
	                        $error = array('error' => $this->upload->display_errors());

	                        print_r($error);
	                }
	                else
	                {
	                       
	                $this->ProductosM->insertImagen($IdProducto,$file_name.$this->upload->data('file_ext'));
	                         redirect(base_url('index.php/ProductosC/insertImagen/'.$IdProducto),'refresh');
	                }
                       //
                }






		  





		/*$this->load->model('ProductosM');
		$data['categorias'] = $this->ProductosM->getCategorias();
		$this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');
                $this->form_validation->set_rules('Nombre', 'Nombre', 'required');
                if ($this->form_validation->run() == FALSE)
                {		
                		$this->load->view('headers/head.php');
						$this->load->view('headers/menu.php');
                        $this->load->view('productos/insertProducto',$data);
                        $this->load->view('headers/footer.php');
                }
                else
                {
                       $this->ProductosM->insertProducto();
                       redirect(base_url('index.php/ProductosC/show'),'refresh');
                }*/
	}



	public function updateProducto($IdProducto){
		$this->load->model('ProductosM');
		$data['producto'] = $this->ProductosM->getProducto($IdProducto);

		$this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');
                $this->form_validation->set_rules('Nombre', 'Nombre', 'required');
                if ($this->form_validation->run() == FALSE)
                {		
                		$this->load->view('headers/head.php');
						$this->load->view('headers/menu.php');
                        $this->load->view('productos/updateProducto',$data);
                        $this->load->view('headers/footer.php');
                }
                else
                {
                       $this->ProductosM->updateProducto($IdProducto);
                       redirect(base_url('index.php/ProductosC/show'),'refresh');
                }
	}



	public function getProducto($IdProducto){
		$this->load->view('headers/head.php');
		$this->load->view('headers/menu.php');
		
		$this->load->view('headers/footer.php');
	}
}?>