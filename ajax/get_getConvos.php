<?php 
include '../init.php';
$obj  = new base_class;
$time = time();
if(isset($_GET['convors'])){
  // echo $_GET['convors'];
$userLoggedIn = $_SESSION['byshare_username'];
$convos       = array();

// update viewed yes to seen message
$obj->Normal_Query("UPDATE message SET viewed = ? WHERE user_to = ?",["yes",$userLoggedIn]);

$obj->Normal_Query("SELECT user_to, user_from FROM message WHERE user_to = ? OR user_from = ? ORDER BY msg_id DESC",[$userLoggedIn, $userLoggedIn]);

while($row = $obj->Single_Result()){
  $user_to_push =($row->user_to!= $userLoggedIn)? $row->user_to : $row->user_from;

  if(!in_array($user_to_push,$convos)){
      array_push($convos,$user_to_push);
  }
}

foreach($convos as $username){

  $obj->Normal_Query("SELECT viewed, opened FROM message WHERE user_to = ? AND user_from = ? ORDER BY msg_id DESC",[$userLoggedIn, $username]);
  $row1 = $obj->Single_Result();
  $opened = $row1->opened;
  $viewed = $row1->viewed;

  $style = ($opened == "no") ? "background-color: #dce1e8;" : "";

  // $unseen = $obj->Count_Rows($viewed == "yes");

  // $unseen = ( $opened == "no" ) ? $obj->Count_Rows() : '' ;

  

   // to show the right side name and images 
  $obj->Normal_Query("SELECT byshare_profile_details_fname, byshare_profile_details_lname,byshare_profile_details_profile_pic , online_users FROM byshare_profile_details WHERE byshare_profile_details_username = ?",[$username]);

  $row = $obj->Single_Result();
  $fname  = $row->byshare_profile_details_fname;
  $lname  = $row->byshare_profile_details_lname;
  $image  = $row->byshare_profile_details_profile_pic;
  $online = $row->online_users;
  $name   = $fname.' '.$lname;
  
  $class = "msg offline";
  if($online > $time){
    $class = "msg online";
  }
    $latest_messages_details = $obj->getLatesMessage($userLoggedIn, $username);

    $dots = (strlen($latest_messages_details[1]) >= 12) ? "..." : "";
    $split = str_split($latest_messages_details[1], 12);
    $split = $split[0] . $dots; 

  echo '<a style="text-decoration: none; color:black; " href="message.php?u='.$username.'" >
  <div class="'.$class.'" style="'.$style.'"> 
  <img class="msg-profile" src="assets/images/'.$image.'" alt="">
  <div class="msg-detail">
  <div class="msg-username">'.$name.'</div>
  <div class="msg-content">
    <span class="msg-message">'.$latest_messages_details[0] . $split.'</span>
    <span class="msg-date"> '.$latest_messages_details[2].'</span>
  </div>
  </div>
  </div>
  </a>
  ';
}
}
?>
