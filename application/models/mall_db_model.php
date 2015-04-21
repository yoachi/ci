<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mall_db_model extends CI_Model {

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
	
	public function getslide(){
		$sql = "select * from product as a left join product_category as b on a.product_category=b.category_no where product_main_slide_use='TRUE' order by product_no desc";
		$query = $this->db->query($sql);
		$list = $query->result_array();
		return $list;
	}
	public function getindexslider($category){
		$category = str_replace('%20', ' ', $category);
		$sql=" select * from product_category as a left join product as b on a.category_no=b.product_category where a.category_sub_name='$category' and b.product_sub_slide_use='TRUE'";
		$query = $this->db->query($sql);
		$list = $query->result_array();
		return $list;
	}
	public function getcategory(){
		$sql="select * from product_category group by category_name order by category_name";
		$query = $this->db->query($sql);
		$list = $query->result_array();
		return $list;
	}
	public function view($no){
		$sql=" select * from product as a left join product_category as b on a.product_category=b.category_no where a.product_no='$no' ";
		$query = $this->db->query($sql);
		$list = $query->result_array();
		return $list;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */