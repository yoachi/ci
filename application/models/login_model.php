<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

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
		$this->load->database();

	}
	public function login_run($email,$password){
		$this->db->where("email",$email);
  		$this->db->where("password",$password);
  		$query=$this->db->get("user");
  		if($query->num_rows()>0){
  			foreach($query->result() as $rows){
  				$newdata = array(
					'user_id'  => $rows->id,
					'user_name'  => $rows->username,
					'user_email'    => $rows->email,
					'logged_in'  => TRUE,
				);
  			}
  			$this->session->set_userdata($newdata);
  			return true;
  		}else{
  			return false;
  		}

	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */