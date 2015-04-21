<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->model('login_model');

	}
	
	public function index()
	{
		$return = $this->Mall_db_model->getcategory();
		$data['category_data'] = $return;
		
		if(($this->session->userdata('user_name')!="")){
			//로그인 완료	
			$data['username']=$this->session->userdata('user_name');

			$this->load->view('amazon_header',$data);
			$this->load->view('amazon_mypage');
		}else{
			//로그인 폼
			$data['username']=$this->session->userdata('user_name');
			$this->load->view('amazon_header',$data);
			$this->load->view('amazon_login');
		}

	}
	public function login_run(){
		$email=$this->input->post('email_address');
		$password=md5($this->input->post('pass'));
		$result=$this->login_model->login_run($email,$password);
		if($result) $this->welcome();
		else $this->index();
	}
	
	public function welcome(){
		if(($this->session->userdata('user_name')!="")){
			$this->load->helper('alertmsg');
			echo alert('login success','/amazon');
		}else{
			$this->load->helper('alertmsg');
			echo alert('login success1','/amazon');
		}
		
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */