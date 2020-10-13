$(document).ready(function(){
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
        })
      } 

    }
  })
})