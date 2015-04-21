<?php
class Members_model extends CI_Model {
 
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
    public function get_members($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {
        
            $this->db->select('*');
            $this->db->from('membership');

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
        
        function count_members($search_string=null, $order=null)
        {
            $this->db->select('*');
            $this->db->from('membership');
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
       

       function get_menu(){
             $this->db->select('*');
            $this->db->from('admin_menu_list');
             $query = $this->db->get();
            return $query->result_array();       
       }
       function member_insert($data,$permission_data){
            $this->db->where('user_name',  $data['user_name']);
            $query = $this->db->get('membership');
            if($query->num_rows > 0){
                echo '<div class="alert alert-error" style="padding-top:50px;"><a class="close" data-dismiss="alert">×</a><strong>';
               echo "중복 등록된 아이디 입니다.";    
                echo '</strong></div>';
            }else{
                $data['pass_word']=md5($data['pass_word']);
                $insert = $this->db->insert('membership', $data);

           
                for($i=0;$i<sizeof($permission_data);$i++){
                  
                  $set_user_name=$permission_data[$i]['user_name'];
                  $set_menu_name=$permission_data[$i]['menu_name'];

                  $sql = "insert into member_permission set menu_name='$set_menu_name', user_name='$set_user_name'  ";
                  $this->db->query($sql);
                }
                   
               
                

               return $insert;


          }

       }
       function member_update($data,$permission_data){
             $this->db->where('user_name',  $data['user_name']);
            $query = $this->db->get('membership');
            if($query->num_rows > 0){
                $_sub_sql='';
                if(empty( $data['pass_word'])==FALSE){
                        $data['pass_word']=md5($data['pass_word']);
                        $_sub_sql = ",pass_word = '$data[pass_word]' ";
                }

                $sql = " update membership set email_addres='$data[email_addres]', user_name='$data[user_name]', name='$data[name]' $_sub_sql where id=$data[id]";
                $update =  $this->db->query($sql);

                $sql = " delete from member_permission where user_name = '$data[user_name]' ";
                $delete =  $this->db->query($sql);

                 for($i=0;$i<sizeof($permission_data);$i++){
                  
                  $set_user_name=$permission_data[$i]['user_name'];
                  $set_menu_name=$permission_data[$i]['menu_name'];

                  $sql = "insert into member_permission set menu_name='$set_menu_name', user_name='$set_user_name'  ";
                  $this->db->query($sql);
                }

                return $update;


            }else{
                  echo '<div class="alert alert-error" style="padding-top:50px;"><a class="close" data-dismiss="alert">×</a><strong>';
                   echo "잘못된 회원 정보입니다.";    
                   echo '</strong></div>';
                }
                   
               
                

               return $insert;

       }
       function get_member_by_id($id){
            $this->db->select('*');
            $this->db->where('id',  $id);
            $this->db->from('membership');
            $query = $this->db->get();
            return $query->result_array();       
       }
       function get_member_permission_by_id($id){
            $sql = " select b.menu_name from  membership as a left join member_permission as b on a.user_name=b.user_name where a.id=$id";
            $query = $this->db->query($sql);
            return $query->result_array(); 
       }

        function delete_member($id){
            $this->db->select('*');
            $this->db->where('id',  $id);
            $this->db->from('membership');
            $query = $this->db->get();
            $data= $query->result_array();       

            $this->db->where('id', $id);
            $this->db->delete('membership'); 

            $this->db->where('user_name', $data[0]['user_name']);
            $this->db->delete('member_permission'); 

         }
   }

