// show messages from database

function show_messages(){
  var msg= true;
  $.ajax({
    type : 'GET',
    url  : 'ajax/show_messages.php',
    data : {'message': msg},
    success : function(feedback){
      // console.log(feedback);
      $(".messages").html(feedback);
    }
  });
}
show_messages();