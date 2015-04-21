<?php
class Admin_members extends CI_Controller {

    /**
    * name of the folder responsible for the views 
    * which are manipulated by this controller
    * @constant string
    */
    const VIEW_FOLDER = 'admin/members';
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('members_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    public function index()
    {
         //all the posts sent by the view
        $search_string = $this->input->post('search_string');        
        $order = $this->input->post('order'); 
        $order_type = $this->input->post('order_type'); 

        //pagination settings
        $config['per_page'] = 5;

        $config['base_url'] = base_url().'admin/members';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        //limit end
        $page = $this->uri->segment(3);

         //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        } 
         //if order type was changed
        if($order_type){
            $filter_session_data['order_type'] = $order_type;
        }
        else{
            //we have something stored in the session? 
            if($this->session->userdata('order_type')){
                $order_type = $this->session->userdata('order_type');    
            }else{
                //if we have nothing inside session, so it's the default "Asc"
                $order_type = 'Asc';    
            }
        }
        //make the data type var avaible to our view
        $data['order_type_selected'] = $order_type;        


        //we must avoid a page reload with the previous session data
        //if any filter post was sent, then it's the first time we load the content
        //in this case we clean the session filter data
        //if any filter post was sent but we are in some page, we must load the session data

         //filtered && || paginated
        if($search_string !== false && $order !== false || $this->uri->segment(3) == true){ 
           
            /*
            The comments here are the same for line 79 until 99

            if post is not null, we store it in session data array
            if is null, we use the session data already stored
            we save order into the the var to load the view with the param already selected       
            */
            if($search_string){
                $filter_session_data['search_string_selected'] = $search_string;
            }else{
                $search_string = $this->session->userdata('search_string_selected');
            }
            $data['search_string_selected'] = $search_string;

            if($order){
                $filter_session_data['order'] = $order;
            }
            else{
                $order = $this->session->userdata('order');
            }
            $data['order'] = $order;

            //save session data into the session
            if(isset($filter_session_data)){
              $this->session->set_userdata($filter_session_data);    
            }
            
            //fetch sql data into arrays
            $data['count_members']= $this->members_model->count_members($search_string, $order);
            $config['total_rows'] = $data['count_members'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['members'] = $this->members_model->get_members($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['members'] = $this->members_model->get_members($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['members'] = $this->members_model->get_members('', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['members'] = $this->members_model->get_members('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }

        }else{

            //clean filter data inside section
            $filter_session_data['member_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';
            $data['page_rows']=$config['per_page'];
            //fetch sql data into arrays
            $data['count_members']= $this->members_model->count_members();
            $data['members'] = $this->members_model->get_members('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_members'];

        }//!isset($search_string) && !isset($order)
         
        //initializate the panination helper 
        $this->pagination->initialize($config);   


        if(empty($page)==TRUE){
            $page=1;
        }
        $from = ($page - 1) * $config['per_page'];

        
        $list_number = $config['total_rows'] - $from;
        $data['list_number']=$list_number;

        $data['main_content'] = 'admin/members/list';
        $this->load->view('includes/template', $data);  
    }



    public function add(){
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
            $this->form_validation->set_message('required', '%s 항목 확인');
            $this->form_validation->set_message('valid_email', '%s 항목 확인');

            $this->form_validation->set_message('min_length', '%s 항목은 최소 %s 자 이상 입력');
            
            $this->form_validation->set_message('max_length', '%s 항목은 최대 %s 자 입니다.');
            

            $this->form_validation->set_rules('name', '이름', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('user_name', '아이디', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('email_addres', '이메일', 'trim|required|valid_email');
            $this->form_validation->set_rules('pass_word', '패스워드', 'trim|required|min_length[4]|max_length[32]');
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array(
                    'name' => $this->input->post('name'),
                    'user_name' => $this->input->post('user_name'),
                    'email_addres' => $this->input->post('email_addres'),
                    'pass_word' => $this->input->post('pass_word'),          
                );

                $_tmp = $this->input->post('permission');

                $permission_data = array();

                foreach($_tmp as $val){
                    $_set =array(
                        'user_name' => $this->input->post('user_name'),
                        'menu_name' =>$val
                        );
                    array_push($permission_data,$_set);
                }
            

               
                if($this->members_model->member_insert($data_to_store,$permission_data)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['menus'] = $this->members_model->get_menu();
                    //load the view
                    $data['main_content'] = 'admin/members/add';
                    $this->load->view('includes/template', $data);  
                }

            }

        }
        //fetch manufactures data to populate the select field
        $data['menus'] = $this->members_model->get_menu();
        //load the view
        $data['main_content'] = 'admin/members/add';
        $this->load->view('includes/template', $data);  
    }

  
    public function view(){
         $id = $this->uri->segment(4);
         $data['member'] = $this->members_model->get_member_by_id($id);
         $data['menus'] = $this->members_model->get_menu();
         //$data['member_permission'] = $this->members_model->get_member_permission_by_id($id);
         $_tmp = $this->members_model->get_member_permission_by_id($id);

          $permission_data = array();

            foreach($_tmp as $val){
                $_set =array(
                    'user_name' => $this->input->post('user_name'),
                    'menu_name' =>$val
                    );
                array_push($permission_data,$val['menu_name']);
            }
         $data['member_permission']=$permission_data;

         $data['menu_actions'] = array(array('name'=>'리스트','action'=>''),array('name'=>'상세','action'=>'/view'),array('name'=>'쓰기','action'=>'/add'),array('name'=>'수정','action'=>'/update'),array('name'=>'삭제','action'=>'/delete'));
        //load the view
        $data['main_content'] = 'admin/members/view';
        $this->load->view('includes/template', $data);           
    }
    public function update(){
        //product id 
        

        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_message('required', '%s 항목 확인');
            $this->form_validation->set_message('valid_email', '%s 항목 확인');

            $this->form_validation->set_message('min_length', '%s 항목은 최소 %s 자 이상 입력');
            
            $this->form_validation->set_message('max_length', '%s 항목은 최대 %s 자 입니다.');
            

            $this->form_validation->set_rules('name', '이름', 'trim|required|min_length[4]');
            
            $this->form_validation->set_rules('email_addres', '이메일', 'trim|required|valid_email');
            $_tmp_pass = $this->input->post('pass_word');
            if(empty($_tmp_pass)==FALSE){
                $this->form_validation->set_rules('pass_word', '패스워드', 'trim|required|min_length[4]|max_length[32]');    
            }
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
             if ($this->form_validation->run())
            {
                      $data_to_store = array(
                            'name' => $this->input->post('name'),
                            'user_name' => $this->input->post('user_name'),
                            'email_addres' => $this->input->post('email_addres'),
                            'pass_word' => $this->input->post('pass_word'),          
                            'id' => $this->input->post('id'),          
                        );

                        $_tmp = $this->input->post('permission');

                        $permission_data = array();

                        foreach($_tmp as $val){
                            $_set =array(
                                'user_name' => $this->input->post('user_name'),
                                'menu_name' =>$val
                                );
                            array_push($permission_data,$_set);
                        }
                    

                       
                        if($this->members_model->member_update($data_to_store,$permission_data)){
                            $data['flash_message'] = TRUE; 
                        }else{
                             $id = $this->uri->segment(4);
                             $data['member'] = $this->members_model->get_member_by_id($id);
                             $data['menus'] = $this->members_model->get_menu();
                             //$data['member_permission'] = $this->members_model->get_member_permission_by_id($id);
                             $_tmp = $this->members_model->get_member_permission_by_id($id);

                              $permission_data = array();

                                foreach($_tmp as $val){
                                    $_set =array(
                                        'user_name' => $this->input->post('user_name'),
                                        'menu_name' =>$val
                                        );
                                    array_push($permission_data,$val['menu_name']);
                                }
                             $data['member_permission']=$permission_data;

                            $data['menu_actions'] = array(array('name'=>'리스트','action'=>''),array('name'=>'상세','action'=>'/view'),array('name'=>'쓰기','action'=>'/add'),array('name'=>'수정','action'=>'/update'),array('name'=>'삭제','action'=>'/delete'));
                            //load the view
                            $data['main_content'] = 'admin/members/edit';
                            $this->load->view('includes/template', $data);           
                        }

            }
        }

         //product data 
         $id = $this->uri->segment(4);
         $data['member'] = $this->members_model->get_member_by_id($id);
         $data['menus'] = $this->members_model->get_menu();
         //$data['member_permission'] = $this->members_model->get_member_permission_by_id($id);
         $_tmp = $this->members_model->get_member_permission_by_id($id);

          $permission_data = array();

            foreach($_tmp as $val){
                $_set =array(
                    'user_name' => $this->input->post('user_name'),
                    'menu_name' =>$val
                    );
                array_push($permission_data,$val['menu_name']);
            }
         $data['member_permission']=$permission_data;

         $data['menu_actions'] = array(array('name'=>'보기','action'=>''),array('name'=>'쓰기','action'=>'/add'),array('name'=>'수정','action'=>'/update'),array('name'=>'삭제','action'=>'/delete'));
        //load the view
        $data['main_content'] = 'admin/members/edit';
        $this->load->view('includes/template', $data);           

    }


    public function delete(){
         $id = $this->uri->segment(4);
        $this->members_model->delete_member($id);
        redirect('admin/members');
    }
}