<?php 
    if($user_to != 'new'){
      echo '
        <form class="chat-form">
            <div class="chat-container">
              <div class="form-input">
                <textarea class="textarea-control" id="send_message" placeholder="Type your message..."></textarea>
              </div><!-- close form-input -->
              <div class="form-input">
                <label for="upload-files" id="upload-lable" title="file uploads" ><i class="fa fa-paperclip fa-uploads" ></i><i class="fa fa-file-image-o fa-uploads"></i></label>
                <input type="file" id="upload-files" name="send_files" class="files-upload">
              </div><!-- close form-input -->
            </div><!-- close chat-container -->
            <div class="files-error"></div>
      </form><!-- close chat-form -->';
    }else{
      echo"";
    }


?>

