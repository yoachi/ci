<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join extends CI_Controller {

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
		$this->load->model('join_model');
		$this->load->model('Mall_db_model');

	}
	
	public function index()
	{
		/*
		if(($this->session->userdata('user_name')!="")){
			//로그인 되어있음
			//$this->load->view('amazon_header');
			//$this->load->view('amazon_join');
			//$this->index();
		}else{
			
			//조인 폼
			$this->load->library('form_validation');
			// field name, error message, validation rules
			$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[4]|xss_clean');
			$this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('con_email_address', 'Email_address Confirmation', 'trim|required|matches[email_address]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
			$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

			$this->load->view('amazon_header');
			$this->load->view('amazon_join');
			//$this->index();
			
			if($this->form_validation->run() == FALSE){
				//$this->index();
			}else{
				$this->join_model->join_run();
				//$this->thank();
			}
		}*/
		$return = $this->Mall_db_model->getcategory();
		$data['category_data'] = $return;
		
		$data['username']=$this->session->userdata('user_name');

		$this->load->view('amazon_header',$data);
		
		$this->load->view('amazon_join');

	}
	public function join_run(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('con_email_address', 'Email_address Confirmation', 'trim|required|matches[email_address]');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$this->join_model->join_run();
			$this->load->helper('alertmsg');
			echo alert('join success! try login','/login');
			//$this->thank();
		}


	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */