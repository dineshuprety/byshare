<?php 

    include '../init.php';
    $obj = new base_class;

    $uid = $_SESSION['byshare_user_id'];
    //  update the time to show user online 
    $times = time()+10;

    if($obj->Normal_Query("UPDATE byshare_profile_details SET online_users = ? WHERE byshare_id = ?",[$times,$uid])){

      echo 'adding time';
    }


?>