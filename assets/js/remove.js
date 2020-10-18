$(document).ready(function(){
  $(".remove").click(function(){
    $(".flash").hide();
  })

  setTimeout(function(){
    $(".flash").fadeOut("slow");
  },5000);
})