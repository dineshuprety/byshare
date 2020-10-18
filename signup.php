<?php 
include 'init.php';
$obj = new base_class;
if(isset($_SESSION['byshare_email']) && isset($_SESSION['byshare_password'])){
  $html = '
                <html>
                <head>
                <link rel="icon" href="assets/images/logo.png" type="image/gif" sizes="16x16">
                <link rel="stylesheet" href="assets/css/style-exit.css">
                </head>
                <title>Error</title>
                <body>
                <div class="div" >
                    <h1 class="h1" >User Masseges </h1>
                    <p class="p" >This Page can view when user logout from byshare chat application 
                    <a href="message.php" class="a" >"Go Back"</a> link.</p>
                  </div>';

    $html.='<script type="text/javascript" src="assets/js/jquery.min.js"></script>
            <script type="text/javascript" src="assets/js/reload-page.js"></script>          
            </body>
            </html>';
      exit($html);
}
?>
<?php 
    if(isset($_POST['signup_form'])){
       // signup form value

       $email = $obj->security($_POST['email']);
       $email1 = $obj->security($_POST['email1']);

       $password = strip_tags(strtolower($_POST['password']));
       $password1 = strip_tags(strtolower($_POST['password1']));//remove html tag & string in lowercase

       $email_status = $password_status = 1;

          if(empty($email && $email1 )){
            $email_error = "Email is required";
            $email_status = "";
          }elseif($email == $email1){
            // check if email is valid format
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){

              // check the email already exists
              $obj->Normal_Query("SELECT byshare_email FROM byshare_users WHERE byshare_email = ?",[$email]);
              if($obj->Count_Rows() > 0){
                $email_error = "Email already in use";
                $email_status = ""; 
              }

            }else{
              $email_error = "Invalid format";
              $email_status = ""; 
            }
          }else{
            $email_error = "Email don't match";
            $email_status = ""; 
          }

          // password validation
          if(empty($password && $password1)){
            $password_error = "Password is required";
            $password_status = "";
          }elseif(strcmp($password, $password1) != 0 ){
            $password_error = "Password do not match!";
            $password_status = "";
          }else {
            if(preg_match('/[^A-Za-z0-9]/', $password)) {
              $password_error = "Your password can only contain english characters and numbers";
              $password_status = "";
            }
          }
          if(strlen($password) > 20 || strlen($password) < 5){
            $password_error = "Your password must be between 5 and 20 characters";
            $password_status = "";
          }
            // check status to insert data into database
            if(!empty($email_status) && !empty($password_status)){
                $close_user = 'no'; // for block user id
                $status = 0;      // check security
                $setup_page = 0; // check the status of setup page

                 // password_hash is a algoritham to encode the password 
                if($obj->Normal_Query("INSERT INTO byshare_users (byshare_email, byshare_password, byshare_close_user, byshare_status, byshare_setup_status) VALUES (?,?,?,?,?)",[$email, password_hash($password, PASSWORD_DEFAULT), $close_user, $status, $setup_page])){
                  $obj->Create_Session("account_success", "You have successfully created your account");
                  header('location:login.php');
                  die();
                }
            }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create New Account</title>
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

      <?php include 'component/signup-form.php'; ?>
  
  </div><!--close account-right-->

  
</div><!-- close signup-container -->
  
<?php include 'component/js.php'; ?>
</body>
</html>