setInterval(function(){
  getConvors();
},3000);
function getConvors(){
  var con= true;
  $.ajax({
    type : 'GET',
    url  : 'ajax/get_getConvos.php',
    data : {'convors': con},
    success : function(feedback){
      // console.log(feedback);
        $(".conversation").html(feedback);
    }
  });
}
getConvors();