<?php
class Materials_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Fetch manufacturers data from the database
    * possibility to mix search, filter and order
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_materials($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {
        
            $this->db->select('*');
            $this->db->from('material');

            if($search_string){
                $this->db->like('name', $search_string);
            }
            $this->db->group_by('id');

            if($order){
                $this->db->order_by($order, $order_type);
            }else{
                $this->db->order_by('id', $order_type);
            }

            if($limit_start && $limit_end){
              $this->db->limit($limit_start, $limit_end);   
            }

            if($limit_start != null){
              $this->db->limit($limit_start, $limit_end);    
            }
            
            $query = $this->db->get();
            
            return $query->result_array();  
        }
        
        function count_materials($search_string=null, $order=null)
        {
            $this->db->select('*');
            $this->db->from('material');
            if($search_string){
                $this->db->like('name', $search_string);
            }
            if($order){
                $this->db->order_by($order, 'Asc');
            }else{
                $this->db->order_by('id', 'Asc');
            }
            $query = $this->db->get();
            return $query->num_rows();        
        }
       

       function get_category($info){
          $this->db->select('*');
          $this->db->from('material_category');
          $this->db->where('category_info',$info);
          $query = $this->db->get();
          return $query->result_array(); 
       }
       public function uploadFile($file, $type = 'images') {
    $username = $this->session->userdata('username');
    $fileName = $file['name'];
    $fileData = $file['tmp_name'];
    if(empty($file['name']) || empty($file['tmp_name'])) {
        return;
    }

    $fileDir = "/home/yoachi/www/ci_admin/upload";
    $fileDir .= "/$type";

    $filePath = "$fileDir/$fileName";

    //Creating dir if doesn't exists.
    if (!file_exists($fileDir)) {
        mkdir($fileDir, 0777, true);
    }
    move_uploaded_file($fileData, $filePath);

    return $filePath;
}
   }

