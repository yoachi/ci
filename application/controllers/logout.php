<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

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
		

	}	
	public function index()
	{
		if(($this->session->userdata('user_name')!="")){
			$this->logout();
		}else{
			$this->load->helper('alertmsg');
			echo alert('not login','/amazon');
		}

	}
	public function logout(){
		$newdata = array(
			'user_id'   =>'',
			'user_name'  =>'',
			'user_email'     => '',
			'logged_in' => FALSE,
		);
		$this->session->unset_userdata($newdata );
		$this->session->sess_destroy();
		$this->load->helper('alertmsg');
		echo alert('logout success','/amazon');
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */