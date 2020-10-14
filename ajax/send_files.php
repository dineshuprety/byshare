<?php 

include '../init.php';
$obj = new base_class;

if(isset($_FILES['send_files']['name'])){
  $file_name   = $_FILES['send_files']['name'];
  $file_name   = uniqid(). basename($file_name);
  $tmp_name    = $_FILES['send_files']['tmp_name'];
  $store_files = "../assets/images/";
  $fileType = pathinfo($file_name, PATHINFO_EXTENSION);

  if(strtolower($fileType) != "jpeg" && strtolower($fileType) != "png" && strtolower($fileType) != "jpg" && strtolower($fileType) != "pdf" && strtolower($fileType) != "zip" && strtolower($fileType) != "docx" && strtolower($fileType) != "xlsx" && strtolower($fileType) != "txt"){

     echo json_encode(['status' => 'error']);

  }
  elseif($_FILES['send_files']['size'] > 2097152){
    
    echo json_encode(['status' => 'error_size']);

  }
  else{

      move_uploaded_file($tmp_name,"$store_files/$file_name");
      $userLoggedIn = $_SESSION['byshare_username'];
      $user_to      = $_SESSION['user_to'];
      
      if($obj->Normal_Query("INSERT INTO message (user_to, user_from, messages, msg_type, opened, viewed, deleted) VALUES (?, ?, ?, ?, ?, ?, ?) ",[$user_to, $userLoggedIn,$file_name,$fileType,'no','no','no'])){
        // json_encode encode data in json format
        echo json_encode(['status' => 'success']);
      }
  }
  
}

?>