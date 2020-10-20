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
<?php include 'Form_handler/signup_form.php'; ?>
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