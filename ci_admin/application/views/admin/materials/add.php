
<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>/assets/js/jquery.form.js"></script>
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
      $attributes = array('class' => 'form-horizontal', "name"=>"imageform", "id"=>"imageform" );
 //<form id="imageform" class="common-app" method="post" enctype="multipart/form-data" action='/imagepreview/imageuploaing1'>
      //form validation
      echo validation_errors();
      
     echo form_open_multipart('imagepreview/materials/add', $attributes);

      $_option_large = array('' => "Select");
      foreach($large_category as $key => $value){
        $_option_large[$value['category_name']]=$value['category_name'];
      }
      $_option_medium = array('' => "Select");
      foreach($medium_category as $key => $value){
        $_option_medium[$value['category_name']]=$value['category_name'];
      }
      $_option_small = array('' => "Select");
      foreach($small_category as $key => $value){
        $_option_small[$value['category_name']]=$value['category_name'];
      }

      ?>
     

        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">대분류(업체명)</label>
            <div class="controls">
              <?php  echo form_dropdown('large_category', $_option_large, set_value('large_category'), 'class="span2"'); ?>
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">중분류(모델명)</label>
            <div class="controls">
              <?php  echo form_dropdown('medium_category', $_option_medium, set_value('medium_category'), 'class="span2"'); ?>
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>          
          <div class="control-group">
            <label for="inputError" class="control-label">소분류(파트명)</label>
            <div class="controls">
              <?php  echo form_dropdown('small_category', $_option_small, set_value('small_category'), 'class="span2"'); ?>
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">수량</label>
            <div class="controls">
              <input type="text" name="pass_word" value="" class="span2">
              <!--<span class="help-inline">OOps</span>-->
            </div>
          </div>
          <script type="text/javascript" >
            $(document).ready(function() {
                var browser;
         
                if($.browser.msie){
         
                    $('#file').live('click', function()   {
                        document.getElementById('imagePreview').innerHTML ='<img src="<?php echo $this->config->item('base_url')?>images/loading.gif">';
                        $('#imageform').attr('action', '<?php echo $this->config->item('base_url'); ?>/imagepreview/imageuploaing');

                        $("#imageform").ajaxForm({
                            target: '#imagePreview'
                       }).submit();

                        document.getElementById('ImageStatus').value='browse';
                    });
                }
                else{
                    $('#file').live('change', function()   {
                        $('#imageform').attr('action', '<?php echo $this->config->item('base_url'); ?>/imagepreview/imageuploaing');
                        document.getElementById('imagePreview').innerHTML ='<img src="<?php echo $this->config->item('base_url')?>images/loading.gif">';
                        $("#imageform").ajaxForm({
                            target: '#imagePreview'
                       }).submit();

                        document.getElementById('ImageStatus').value='browse';
                    });
                }
         
            });
         
        </script>
          <div class="control-group">
            <label for="inputError" class="control-label">이미지파일</label>
            <div class="controls">
               <input id="file" type="file" name="photoimg"  >
               <div id="imagePreview" class="profile-picture">
                <?php
                echo '<img src='.$this->config->item('base_url').'/imageUpload/ >';
                ?>
            </div>
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">상세설명</label>
            <div class="controls">
              <textarea></textarea>
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">비고</label>
            <div class="controls">
              <textarea></textarea>
            </div>
          </div>
       
            <div class="form-actions" align='center' style='width:100%;padding-left:0px'>
            <button class="btn btn-primary" type="submit">Save</button>
            <button class="btn" type="reset">Cancel</button>
             <input type="button" value="List" onclick="history.back(-1)" class="btn" />
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     