function getLiveSearchUsers(value, user){
  $.ajax({
    type : 'POST',
    url  : 'ajax/search_users.php',
    data : {query:value, userLoggedIn: user},
    success : function(data){
      // console.log(feedback);
      if($(".search_results_footer_empty")[0]) {
        $(".search_results_footer_empty").toggleClass("search_results_footer");
        $(".search_results_footer_empty").toggleClass("search_results_footer_empty");
      }
  
      $('.search_results').html(data);
      $('.search_results_footer').html("<a href='search.php?q=" + value + "'>See All Results</a>");
  
      if(data == "") {
        $('.search_results_footer').html("");
        $('.search_results_footer').toggleClass("search_results_footer_empty");
        $('.search_results_footer').toggleClass("search_results_footer");
      }
    }
  })
}