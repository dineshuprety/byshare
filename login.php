<?php 
include 'init.php';
$obj = new base_class;
if(isset($_SESSION['byshare_email']) && isset($_SESSION['byshare_password'])){
      exit(header('refresh:1;message.php'));
}
?>
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
          $db_user_close  = $row->byshare_close_user;
          $db_setup_status = $row->byshare_setup_status;

          // check form pw with db_pw
          if(password_verify($password, $db_password)){
            
            $obj->Create_Session("byshare_user_id",$db_user_id);
            $obj->Create_Session("byshare_email",$db_email);
            $obj->Create_Session("byshare_password",$db_password);
            $obj->Create_Session("byshare_setup_page_status",$byshare_setup_status);

            // check where user block id or not
            if($db_user_close == "yes"){
              $obj->Normal_Query("UPDATE byshare_users SET byshare_close_user = ? WHERE byshare_id = ?",["no", $db_user_id]);
            }
            if($db_setup_status == 0){
              header('location:setup.php');
            }else{

              $obj->Normal_Query("SELECT byshare_profile_details_username FROM byshare_profile_details WHERE byshare_id = ?",[$db_user_id]);
              $row = $obj->Single_Result();
              $byshare_username = $row->byshare_profile_details_username;
              $obj->Create_Session("byshare_username",$byshare_username);

              header("location:message.php");
            }
          }else{
            $password_error = "Please enter correct password";
          }
        }
      }

    }

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
 <?php include 'component/css.php'; ?>

</head>
<body>
<div class="signup-container">

  <div class="account-left">
    <!-- <img src="assets/images/compter.jpg" class="account-left-image" alt=""> -->
    <div class="account-text" onclick="window.location.href='index.php'">
       <h1> Lets Chat</h1>
      <p>Online chat may refer to any kind of communication over the Internet that offers a real-time transmission of text messages from sender to receiver. Chat messages are generally short in order to enable other participants to respond quickly.</p>

    </div><!-- cose account-text -->
  
  </div><!-- close account-left-->

  <div class="account-right">
      
    <!-- login form include -->
    <?php include 'component/login-form.php'; ?>
    <!-- login form include end-->

  </div><!--close account-right-->
    
</div><!-- close signup-container -->
 <?php include 'component/js.php'; ?>
</body>
</html>