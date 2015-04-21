<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Board extends CI_Controller {

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
		$this->load->model('Board_model');

	}

	public function index()
	{
		$this->load->view('board_test');
	}

	public function lists()
	{
		$this->load->view('list');
	}

	public function write()
	{
		$return = $this->Board_model->insert_board();
		if($return == true){
			$json_array = array('result' => true);    

		   //add the header here
			//header('Content-Type: application/json');
			echo json_encode( $json_array );

		}else{
			$json_array = array('result' => false);    

		   //add the header here
			//header('Content-Type: application/json');
			echo json_encode( $json_array );

		}
	}
	public function getlist($no){
		$return = $this->Board_model->getlist($no);
		echo json_encode( $return );


	}

	public function getView($no){
		$return = $this->Board_model->getview($no);
		echo json_encode( $return );


	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */