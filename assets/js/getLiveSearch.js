function getLiveSearchUsers(value, user){
  value = value.replace(/<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,"");
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
      $('.search_results_footer').html("<a href='search.php?q=" + (value) + "'>See All Results</a>");
  
      if(value == "") {
        console.log("working");
        $('.search_results_footer').html("");
        $('.search_results_footer').toggleClass("search_results_footer_empty");
        $('.search_results_footer').toggleClass("search_results_footer");
      }
    }
  })
}

// to hide the dropdown search system by clicking anywhere
$(document).click(function(e){
  // alert(e.which);
  // if(e.which == 1){
  //   $(".search_results").html("");
	// 	$('.search_results_footer').html("");
	// 	$('.search_results_footer').toggleClass("search_results_footer_empty");
	// 	$('.search_results_footer').toggleClass("search_results_footer");
  // }
	if(e.target.class != "search_results" && e.target.id != "search_text_input") {
     
		$(".search_results").html("");
		$('.search_results_footer').html("");
		$('.search_results_footer').toggleClass("search_results_footer_empty");
		$('.search_results_footer').toggleClass("search_results_footer");
  }
});