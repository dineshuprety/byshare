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

              show_messages();
              $(".messages").animate({scrollTop: $(".messages")[0].scrollHeight},2000);
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
          }
          else if(feedback.status == "error_size"){
            console.log(" working error");
              $(".files-error").addClass("show-file-error");
              $(".files-error").html("<span class='files-cross-icon' >&#x2715;</span>sorry size must be less than 2mb");
              setTimeout(function(){
                $(".files-error").removeClass("show-file-error");
              }, 5000)
          }
          else if(feedback.status == "success"){

            show_messages();
            $(".messages").animate({scrollTop: $(".messages")[0].scrollHeight},2000);
              
          }
        }
      });
    }
  });

  //send emoji
    $(".emoji-same").click(function(){
        var emoji = $(this).attr('src');
        $.ajax({
          type: 'POST',
          url : 'ajax/send_emoji.php',
          data:{'send_emoji':emoji},
          dataType:'JSON',
          success:function(feedback){
            if(feedback.status == "success"){
             show_messages();
             $(".messages").animate({scrollTop: $(".messages")[0].scrollHeight},2000);
            }
          }
      })
    });
});
 
setInterval(function(){
  show_messages();
},3000);
// show messages from database

function show_messages(){
  var msg= true;
  $.ajax({
    type : 'GET',
    url  : 'ajax/show_messages.php',
    data : {'message': msg},
    success : function(feedback){
      // console.log(feedback);

        var scrollpos = $(".messages").scrollTop();
        var scrollpos = parseInt(scrollpos) + 520;
        var scrollHeight = $(".messages").prop('scrollHeight');

        $(".messages").html(feedback);

        if( scrollpos < scrollHeight ){
          
        }else{
          $(".messages").scrollTop($(".messages").prop('scrollHeight'));
        }
      
    }
  });
}
show_messages();


