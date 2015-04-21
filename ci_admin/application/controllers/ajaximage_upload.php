<?php
class Ajaximage_upload extends CI_Controller {

    /**
    * name of the folder responsible for the views 
    * which are manipulated by this controller
    * @constant string
    */
    const VIEW_FOLDER = 'admin/materials';
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
     
    }
 
    function index() {
         $path = '/home/yoachi/www/ci_admin/imageUpload/';
         
        $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP","PNG");
        if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_FILES['fileToUpload']['name'];
            $size = $_FILES['fileToUpload']['size'];
             
            if(strlen($name)) {
                list($txt, $ext) = explode(".", $name);
                if(in_array($ext,$valid_formats)) {
                    if($size<(1024*1024*2)) {
                        $tmp = $_FILES['fileToUpload']['tmp_name'];
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