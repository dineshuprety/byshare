<?php 
include 'init.php';
$obj = new base_class;
$details = new details;
if(isset($_SESSION['byshare_email']) && isset($_SESSION['byshare_password'])){
  if($obj->Normal_Query("SELECT byshare_setup_status FROM byshare_users WHERE byshare_email = ? ",[$_SESSION['byshare_email']])){
    $row = $obj->Single_Result();
    $setup_page = $row->byshare_setup_status;
    if($setup_page != 0){
     
    }else{
      header('location:setup.php');
      die();
    }
  }
  
}else{
  exit("<script type='text/javascript'>
  location.replace('login.php');
                </script>");
}
?>
<?php  

    if(isset($_GET['q'])) {
      $query = $_GET['q'];
    }
    else {
      $query = "";
    }

    if(isset($_GET['type'])) {
      $type = $_GET['type'];
    }
    else {
      $type = "name";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search</title>
    <?php include 'component/css.php'; ?>

</head>
<body>
    <!-- nap -->
    <?php include 'component/nav.php'; ?>
    <!-- nap include end -->

    <div class="chat-container">

        <!-- side-bar include -->
        <?php include 'component/side-bar.php'; ?>
        <!-- side-bar include end -->

    <section id="chat-area">
          <div class="search-col">
      <?php 
            if($query == ""){
            echo "<h1 style='color:green;font-size:5rem;'>You must enter something in the search box.</h1>";
            }else{
                //If query contains an underscore, assume user is searching for usernames
              if($type == "username"){ 

                $obj->Normal_Query("SELECT * FROM byshare_profile_details WHERE byshare_profile_details_username LIKE '$query%' AND user_close = 'no' LIMIT 8");

              //If there are two words, assume they are first and last names respectively
              }else {

                $names = explode(" ", $query);

                if(count($names) == 3){
                  //If there are two words, assume they are first and last names respectively

                $obj->Normal_Query("SELECT * FROM byshare_profile_details WHERE (byshare_profile_details_fname LIKE '$names[0]%' AND byshare_profile_details_lname LIKE '$names[2]%' AND byshare_profile_details_skill LIKE '$names[2]%') AND user_close = 'no' LIMIT 8");

                }
                //If query has one word only, search first names or last names 
                else if(count($names) == 2){

                $obj->Normal_Query("SELECT * FROM byshare_profile_details WHERE (byshare_profile_details_fname LIKE '$names[0]%' OR byshare_profile_details_lname LIKE '$names[1]%' OR byshare_profile_details_skill LIKE '$names[1]%') AND user_close = 'no' LIMIT 8");

                }
                else {

                $obj->Normal_Query("SELECT * FROM byshare_profile_details WHERE (byshare_profile_details_fname LIKE '$names[0]%' OR byshare_profile_details_lname LIKE '$names[0]%' OR byshare_profile_details_skill LIKE '$names[0]%') AND user_close = 'no' LIMIT 8");

                }
              }
                  if($obj->Count_Rows() == 0){
                    echo "We can't find anyone with a " . $type . " like: " .$query;
                  }else{
                    echo $obj->Count_Rows() . " results found<br>";

                    echo "<p id='grey'>Try searching for</p>";

                    echo "<a id='GFG' href='search.php?q=" . $query ."&type=name'>Names</a>, <a id='GFG' href='search.php?q=" . $query ."&type=username'>Usernames</a><br><br><hr id='search_hr'>";
                    
                    // fetch the data
                    while($row = $obj->Single_Result()){
                      $username = $row->byshare_profile_details_username;
                      $profile  = $row->byshare_profile_details_profile_pic;
                      $fname    = $row->byshare_profile_details_fname;
                      $lname    = $row->byshare_profile_details_lname;
                      $skills = $row->byshare_profile_details_skill;
                      $country  = $row->byshare_profile_details_country;

                      if($_SESSION['byshare_username'] == $username){
                        $button = '<li><a id="GFG"class="accept-req">Own</a></li>';
                      }else{
                        $button = '<li><a id="GFG" href="message.php?u='.$username.'"class="accept-req">Chat</a></li>';
                      }
                echo '
							  			<div class="requests-list">
							  				<div class="request-details">
							  					<div class="noty-user-img">
							  						<img src="assets/images/'.$profile.'" alt="">
							  					</div>
							  					<div class="request-info">
							  						<h3>'.$fname.' '.$lname.'</h3>
							  						<span>'.$skills.'</span>
							  					</div>
							  					<div class="accept-feat">
							  						<ul>
							  							'.$button.'
							  							<li><a  id="GFG" href="'.$username.'" class="close-req"><i class="fa fa-user"></i></a></li>
							  						</ul>
							  					</div><!--accept-feat end-->
							  				</div><!--request-detailse end-->';

                    }//end while loop
                  }
              
            }//else end
      ?>
          </div>
    </section><!-- close chat-area -->

    <!-- right area include -->
    <?php include 'component/right-area.php'; ?>
    <!-- right area include end -->
    
  </div>
  <?php include 'component/js.php'; ?>
</body>
</html>