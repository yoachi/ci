<?php
class Imagepreview extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
      
      
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    public function index(){
        $data['main_content'] = 'admin/materials/list';
        $this->load->view('includes/template', $data);  
    }
     public function imageuploaing() {
        $path = '/home/yoachi/www/ci_admin/imageUpload/';
         
        $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP","PNG");
        if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_FILES['photoimg']['name'];
            $size = $_FILES['photoimg']['size'];
             
            if(strlen($name)) {
                list($txt, $ext) = explode(".", $name);
                if(in_array($ext,$valid_formats)) {
                    if($size<(1024*1024*2)) {
                        $tmp = $_FILES['photoimg']['tmp_name'];
                        if(move_uploaded_file($tmp, $path.$name)) {
                            $imgPath = $this->config->item('base_url')."/imageUpload/".$name;
                            echo "<img src='$imgPath'  class='preview'>";
                        }
                        else
                            echo "Image Upload Failed.";
                    }
                    else
                        echo "Maximum Image size should be 2MB.";
                }
                else
                    echo "Invalid file format.";
            }
            exit;
        }
    }

}