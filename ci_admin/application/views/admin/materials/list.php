    <div class="container top">

      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <?php echo ucfirst($this->uri->segment(2));?>
        </li>
      </ul>

      <div class="page-header users-header">
        <h2>
          <?php echo ucfirst($this->uri->segment(2));?> 
          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>
        </h2>
      </div>
      
      <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
           
            //save the columns names in a array that we will use as filter         
            $options_materials = array();    
            foreach ($materials as $array) {
              foreach ($array as $key => $value) {
                if($key=='user_name'){
                  $options_materials[$key] = 'ID';  
                }
                
              }
              break;
            }

              echo form_open('admin/materials', $attributes);
     
            
              echo form_label('Search:', 'search_string');
            
              echo form_dropdown('order', $options_materials, $order, 'class="span2"');
              echo form_label('', '');
              echo form_input('search_string', $search_string_selected);
              echo form_label('', '');
              $data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-primary', 'value' => 'Go');

              //$options_order_type = array('Asc' => 'Asc', 'Desc' => 'Desc');
             // echo form_dropdown('order_type', $options_order_type, $order_type_selected, 'class="span1"');

              echo form_submit($data_submit);

            echo form_close();
            ?>

          </div>

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">No.</th>
                <th class="header">고유번호</th>
                <th class="yellow header headerSortDown">ID</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=0;
              foreach($materials as $row)
              {
                
                $num = $list_number -$i;
                echo '<tr>';
                echo '<td>'.$num.'</td>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['large_category'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/materials/view/'.$row['id'].'" class="btn btn-info">상세</a>  
                  <a href="'.site_url("admin").'/materials/update/'.$row['id'].'" class="btn btn-info">수정</a>  
                  <a href="'.site_url("admin").'/materials/delete/'.$row['id'].'" class="btn btn-danger">삭제</a>
                </td>';
                echo '</tr>';
                $i++;
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>