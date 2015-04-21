<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>/assets/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>/assets/js/jquery.form.js"></script>
 
<script type="text/javascript" >
    $(document).ready(function() {
        var browser;
 
        if($.browser.msie){
 
            $('#file').live('click', function()   {
                document.getElementById('imagePreview').innerHTML ='<img src="<?php echo $this->config->item('base_url')?>images/loading.gif">';
                $("#imageform").ajaxForm({
                    target: '#imagePreview'
                }).submit();
 
                document.getElementById('ImageStatus').value='browse';
            });
        }
        else{
            $('#file').live('change', function()   {
                document.getElementById('imagePreview').innerHTML ='<img src="<?php echo $this->config->item('base_url')?>images/loading.gif">';
                $("#imageform").ajaxForm({
                    target: '#imagePreview'
                }).submit();
 
                document.getElementById('ImageStatus').value='browse';
            });
        }
 
    });
 
</script>
 
<form id="imageform" class="common-app" method="post" enctype="multipart/form-data" action='<?php echo $this->config->item('base_url'); ?>/imagepreview/imageuploaing'>
 
    <div id="image" >
 
        <input id="file" type="file" name="photoimg"  >
        <span style="color: #7A7A7A;float: left;font-family: Arial,Helvetica,sans-serif;font-size: 12px;padding: 10px;width: 350px;">
            Upload an image of 200 * 200 px or above resolutions for better results.
            Only .png,jpg,bmp and gif formats are allowed
        </span>
</form>
 
<div id="imagePreview" class="profile-picture">
    <?php
    echo '<img src='.$this->config->item('base_url').'/imageUpload/ >';
    ?>
</div>