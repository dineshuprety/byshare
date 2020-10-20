<?php 
include 'init.php';
$obj = new base_class;
if(isset($_SESSION['byshare_email']) && isset($_SESSION['byshare_password'])){
      exit(header('refresh:1;message.php'));
}
?>

<?php include 'Form_handler/login_form.php'; ?>

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