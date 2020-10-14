$(document).ready(function(){

  // send messages into database
  $(".chat-form").keypress(function(e){
    if(e.keyCode == 13){
      // working
      console.log("working");
      // send message to database by calling ajax
      var send_message = $("#send_message").val();
      if(send_message.length !=''){
        console.log('sending');
        $.ajax({
          type : 'POST',
          url  : 'ajax/send_message.php',
          data : {
            send_message:send_message
          },
          // retrun data in json format
          dataType : 'JSON',
          success : function(feedback){
            if(feedback.status == "success"){
              $(".chat-form").trigger("reset");
              console.log("message send");
            }
          }
        });
      } 

    }
  });
  // upload file/image

  $("#upload-files").change(function(){
    var file_name = $("#upload-files").val();
    if(file_name != ""){
      $.ajax({
        type : 'POST',
        url  : 'ajax/send_files.php',
        data : new FormData($(".chat-form")[0]),
        contentType : false,
        processData : false,
        dataType : 'JSON',
        success     : function(feedback){
          console.log(feedback);
          if(feedback.status == "error"){
            console.log(" working error");
              $(".files-error").addClass("show-file-error");
              $(".files-error").html("<span class='files-cross-icon' >&#x2715;</span>Please choose valid file");
              setTimeout(function(){
                $(".files-error").removeClass("show-file-error");
              }, 5000)
          }else if(feedback.status == "error_size"){
            console.log(" working error");
              $(".files-error").addClass("show-file-error");
              $(".files-error").html("<span class='files-cross-icon' >&#x2715;</span>sorry size must be less than 2mb");
              setTimeout(function(){
                $(".files-error").removeClass("show-file-error");
              }, 5000)
          }else if(feedback.status == "success"){
            console.log("file send");
          }
        }
      });
    }
  });

});