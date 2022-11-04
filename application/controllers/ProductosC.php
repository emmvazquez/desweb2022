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
		$this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');
                $this->form_validation->set_rules('Nombre', 'Nombre', 'required');
                if ($this->form_validation->run() == FALSE)
                {		
                		$this->load->view('headers/head.php');
						$this->load->view('headers/menu.php');
                        $this->load->view('productos/insertProducto');
                        $this->load->view('headers/footer.php');
                }
                else
                {
                       $this->ProductosM->insertProducto();
                       redirect(base_url('index.php/ProductosC/show'),'refresh');
                }
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