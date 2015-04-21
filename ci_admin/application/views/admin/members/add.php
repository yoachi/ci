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
          <a href="#">New</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Adding <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>
 
      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> 회원등록 완료!.';
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
      
      echo form_open('admin/members/add', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">이름</label>
            <div class="controls">
              <input type="text" id="" name="name" value="<?php echo set_value('name'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">아이디</label>
            <div class="controls">
              <input type="text" id="" name="user_name" value="<?php echo set_value('user_name'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>          
          <div class="control-group">
            <label for="inputError" class="control-label">이메일</label>
            <div class="controls">
              <input type="text" id="" name="email_addres" value="<?php echo set_value('email_addres'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">패스워드</label>
            <div class="controls">
              <input type="text" name="pass_word" value="">
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
                            echo "<li>$row[name] <input type='checkbox' id='' name='permission[]' value='$row[name]'>  리스트 <input type='checkbox' id='' name='permission[]' value='$row[name]/view'>  상세 <input type='checkbox' id='' name='permission[]' value='$row[name]/add'>  쓰기 <input type='checkbox' id='' name='permission[]' value='$row[name]/update'>  수정 <input type='checkbox' id='' name='permission[]' value='$row[name]/delete'>  삭제</li>";
                      }
                      echo '</ul>';
            ?>
            </div>
          </div>
       
            <div class="form-actions" align='center' style='width:100%;padding-left:0px'>
            <button class="btn btn-primary" type="submit">Save changes</button>
            <button class="btn" type="reset">Cancel</button>
             <input type="button" value="List" onclick="history.back(-1)" class="btn" />
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     