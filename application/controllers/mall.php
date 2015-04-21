<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mall extends CI_Controller {

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
		$header_category = $this->Mall_db_model->getcategory();
		$data['header_category'] = $header_category;
		$this->load->view('head',$data);
		$this->load->view('mall');
		$this->load->view('footer');
	}
	public function getslide(){
		$return = $this->Mall_db_model->getslide();
		echo json_encode( $return );
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */