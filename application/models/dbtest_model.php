<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dbtest_model extends CI_Model {

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
	
	function get_list(){
		$query=$this->db->from('test');
		return $query->get()->result_array();
	}
	function get_item($no){
		$query=$this->db->from('test')->where(array('no'=>$no));
		return $query->get()->row_array();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */