<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Amazon extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		//$this->load->helper('url'); 
		$this->load->model('Mall_db_model');

	}
	
	public function index()
	{
		$return = $this->Mall_db_model->getcategory();
		$data['category_data'] = $return;
		$data['username']=$this->session->userdata('user_name');
		$this->load->view('amazon_header',$data);
		$this->load->view('amazon_index');

	}
	public function view($no){
		$return = $this->Mall_db_model->view($no);
		$data['product_data'] = $return;
		$data['username']=$this->session->userdata('user_name');
		$this->load->view('amazon_header',$data);
		$this->load->view('amazon_index_viewed',$data);
	}
	public function getslide(){
		$return = $this->Mall_db_model->getslide();
		echo json_encode( $return );
	}
	public function getindexslider($category){
		$return = $this->Mall_db_model->getindexslider($category);
		//echo json_encode( $return );
		$data['slider_data'] = $return;
		
		$this->load->view('get_index_slider',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */