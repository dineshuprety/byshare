<?php 
include '../init.php';

$obj = new base_class;

if(isset($_POST['send_message'])){

  $message = trim($_POST['send_message']);
  $userLoggedIn = $_SESSION['byshare_username'];
  $user_to      = $_SESSION['user_to'];
  $msg_type = "text";

  if($obj->Normal_Query("INSERT INTO message (user_to, user_from, messages, msg_type, opened, viewed, deleted) VALUES (?, ?, ?, ?, ?, ?, ?) ",[$user_to, $userLoggedIn,$message,$msg_type,'no','no','no'])){
    // json_encode encode data in json format
    echo json_encode(['status' => 'success']);
  }
}

?>