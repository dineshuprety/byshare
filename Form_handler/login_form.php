<?php 
  if(isset($_POST['login_form'])){
    // assiging form value to var
    $email = $obj->security($_POST['email']);
    $password = $obj->security($_POST['password']);
    $email_status = $password_status = 1;

    //check if form is empty
    if(empty($email)){
      $email_error = "Email is requried";
      $email_status = "";
    }
    if(empty($password)){
      $password_error = "Password is requried";
      $password_status = "";
    }

    // check all value is ! empty login in
    if(!empty($email_status) || !empty($password_status)){
      
      if($obj->Normal_Query("SELECT * FROM byshare_users WHERE byshare_email = ?",[$email])){
        if($obj->Count_Rows() == 0){
          $email_error = "Please enter the exits email";
        }else{
          $row            = $obj->Single_Result();
          $db_user_id     = $row->byshare_id;
          $db_email       = $row->byshare_email;
          $db_password    = $row->byshare_password;
          $db_setup_status = $row->byshare_setup_status;

          
          // check form pw with db_pw
          if(password_verify($password, $db_password)){
            
            $obj->Create_Session("byshare_user_id",$db_user_id);
            $obj->Create_Session("byshare_email",$db_email);
            $obj->Create_Session("byshare_password",$db_password);
            $obj->Create_Session("byshare_setup_page_status",$byshare_setup_status);

            $obj->Normal_Query("SELECT user_close FROM byshare_profile_details WHERE byshare_id = ?",[$db_user_id]);

            $row1 = $obj->Single_Result();
            $user_close = $row1->user_close;
            
            // check where user block id or not
            if($user_close == "yes"){
              $obj->Normal_Query("UPDATE byshare_profile_details SET user_close = ? WHERE byshare_id = ?",["no", $db_user_id]);
            }
            if($db_setup_status == 0){
              header('location:setup.php');
              die();
            }else{

              $obj->Normal_Query("SELECT byshare_profile_details_username FROM byshare_profile_details WHERE byshare_id = ?",[$db_user_id]);
              $row = $obj->Single_Result();
              $byshare_username = $row->byshare_profile_details_username;
              $obj->Create_Session("byshare_username",$byshare_username);

              header("location:message.php");
              die();
            }
          }else{
            $password_error = "Please enter correct password";
          }
        }
      }

    }

  }

?>