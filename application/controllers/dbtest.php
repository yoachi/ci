<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dbtest extends CI_Controller {

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
		$this->load->model('Dbtest_model');

	}
	
	function lists(){
		$data['list']=$this->Dbtest_model->get_list();
		$this->load->view('lists',$data);
	}
	
	function view($no){
		$data['item']=$this->Dbtest_model->get_item($no);
		$this->load->view('view',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */