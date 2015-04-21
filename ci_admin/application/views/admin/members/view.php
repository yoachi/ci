    <div class="container top">
      
      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li>
          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>">
            <?php echo ucfirst($this->uri->segment(2));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="#">View</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          View <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>
 
      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> 회원 수정 완료!.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
      
      <?php
      //form data
      $attributes = array('class' => 'form-horizontal', 'id' => '');

      //form validation
      echo validation_errors();
      
      echo form_open('admin/members/update/'.$this->uri->segment(4).'', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">이름</label>
            <div class="controls">
              <input type="text" id="" name="name" value="<?php echo $member[0]['name']; ?>"  readonly>
               <input type="hidden" id="" name="id" value="<?php echo $this->uri->segment(4); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">아이디</label>
            <div class="controls">
              <input type="text" id="" name="user_name" value="<?php echo $member[0]['user_name']; ?>" readonly>
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>          
          <div class="control-group">
            <label for="inputError" class="control-label">이메일</label>
            <div class="controls">
              <input type="text" id="" name="email_addres" value="<?php echo $member[0]['email_addres']; ?>" readonly>
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">패스워드</label>
            <div class="controls">
              <input type="text" name="pass_word" value="" readonly>
              <!--<span class="help-inline">OOps</span>-->
            </div>
          </div>

          <div class="control-group">
            <label for="inputError" class="control-label">권한</label>
            <div class="controls">
            <?php
                      echo '<ul>';

                      foreach ($menus as $row)
                      {

                            echo "<li>$row[name] ";

                            for($i=0;$i<sizeof($menu_actions);$i++){
                               //echo $menu_actions[$i]['action'];
                               
                               if(in_array($row['name'].$menu_actions[$i]['action'], $member_permission)){
                                  //echo $row['name'].$menu_actions[$i]['action'];
                                    $checked='checked';
                               }else{
                                   $checked='';
                               }

                              echo "<input type='checkbox' id='' name='permission[]' value='$row[name]".$menu_actions[$i]['action']."' $checked readonly>".$menu_actions[$i]['name'];
                            }

                            echo "</li>";
                      }
                      echo '</ul>';
            ?>
            </div>
          </div>
       
            <div class="form-actions" align='center' style='width:100%;padding-left:0px'>
            <!--<button class="btn btn-primary" type="submit">Save changes</button>-->
            <input type="button" value="List" onclick="history.back(-1)" class="btn" />
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     