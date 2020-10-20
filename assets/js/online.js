function updatUserStatus(){
  $.ajax({
    url : 'ajax/get_online.php',
    success : function(feedback){
      console.log(feedback);
    }
  })
}
setInterval(function(){
  updatUserStatus();
},5000);