<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Board_model extends CI_Model {

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
	
	function insert_board(){
		$this->load->helper('date');
		$data = array(
			'name' => $this->input->post('name'),
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
		);

		$this->db->set('adddate','now()',FALSE);
		$this->db->insert('board',$data);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}


	}
	function getlist($no){
		$list_limit = 10;
		$_where = array();
		if(empty($no)==FALSE){
			$_where['no']='no < '.$no;
		}
		$sql_where='';
		if (is_array($_where) === TRUE && count($_where) > 0) {
			$sql_where = ' WHERE '.implode(' AND ', $_where);
		}

		$sql = "select * from board $sql_where order by no desc limit $list_limit";
		$query = $this->db->query($sql);
		$list = $query->result_array();
		foreach($list as $row){
			$latest_no = $row['no'];
		}
		$sql = "select count(*) as cnt from board where no < $latest_no";
		$query = $this->db->query($sql);
		$data = $query->result_array();

		$list_data = array(
			'latest_no' => $latest_no,
			'more_count' => $data[0]['cnt'],
			'list' => $list,
			'list_limit' => $list_limit,
			'no' => $no,
		);
		/*foreach($list as $row){
			$latest_no = $row['no'];
		}
		$sql = "select count(*) as cnt from board where no < $latest_no";
		$query = $this->db->query($sql);
		$data = $query->result_array();
		
		$list_data = array(
			'latest_no' => $latest_no,
			'more_count' => $data['cnt'],
			'list' => $list
		);*/
		return $list_data;


	}
	function getview($no){
		$sql = "select * from board where no = $no ";
		$query = $this->db->query($sql);
		$data = $query->result_array();
		return $data;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */