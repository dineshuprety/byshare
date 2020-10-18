<?php 
include 'init.php';
$obj = new base_class;
if(isset($_SESSION['byshare_email']) && isset($_SESSION['byshare_password'])){
      exit(header('refresh:1;message.php'));
      die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>landing</title>
  <?php include 'component/css.php'; ?>
</head>
<body>
<div class="signup-container">

  <div class="landing-page">
    <!-- <img src="assets/images/landing.jpg" class="landing-page" alt=""> -->
    <div class="landing-text">
      <h1> Byshare.io</h1><br>
      <p>Share file, code,zip, text etc from one browser to another browser.Its a real time commnucation system as well as we will be building it.</p><br>
    
        <button onclick="window.location.href='login.php'" class="btn try-btn">TRY ME</button>
    </div><!-- cose landing-text -->
  
  </div><!-- close landing-page-->

</div>
</body>
</html>