<?php 
include '../init.php';
$obj = new base_class;

$query = $_POST['query'];
$userLoggedIn = $_POST['userLoggedIn'];

$names = explode(" ", $query);

//If query contains an underscore, assume user is searching for usernames
if(strpos($query, '_') !== false) {
  $obj->Normal_Query("SELECT * FROM byshare_profile_details WHERE byshare_profile_details_username LIKE '$query%' LIMIT 8");
}
elseif(count($names) == 2){
  //If there are two words, assume they are first and last names respectively
  $obj->Normal_Query("SELECT * FROM byshare_profile_details WHERE (byshare_profile_details_fname LIKE '$names[0]%' AND byshare_profile_details_lname LIKE '$names[1]%') LIMIT 8");
}else{
  //If query has one word only, search first names or last names 
  $obj->Normal_Query("SELECT * FROM byshare_profile_details WHERE ( byshare_profile_details_fname LIKE '$names[0]%' OR byshare_profile_details_lname LIKE '$names[0]%') LIMIT 8");
}

if($query != ""){
  while($row = $obj->Single_Result()){
    $user_id  = $row->byshare_id;
    $username = $row->byshare_profile_details_username;
    $profile  = $row->byshare_profile_details_profile_pic;
    $fname    = $row->byshare_profile_details_fname;
    $lname    = $row->byshare_profile_details_lname;
    $skills = $row->byshare_profile_details_skill;
    $country  = $row->byshare_profile_details_country;

      //select counrty from database
      $obj->Normal_Query("SELECT  country_name FROM country WHERE country_id = '$country'");
      $row1 = $obj->Single_Result();
      $country_name = $row1->country_name;

        //select skills from database
      $obj->Normal_Query("SELECT skills_id, skills_name FROM skills WHERE skills_id = '$skills'");
      $row2 = $obj->Single_Result();
      $skills_name = $row2->skills_name;

    echo "<div class='resultDisplay'>
            <a href='" . $username . "' style='color: #1485BD'>
              <div class='liveSearchProfilePic'>
                <img src='assets/images/" . $profile ."'>
              </div>

              <div class='liveSearchText'>
                " . $fname. " " . $lname . "
                <p> Country: " .$country_name ."</p>
                <p> Skills: " .$skills_name ."</p>
              </div>
            </a>
        </div>";
      
  }
}
// echo 'working';

?>