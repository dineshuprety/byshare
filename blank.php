<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body>
    <nav id="nav">
      <div class="header">
        <div class="logo">
          <h1>ByShare</h1>
        </div>
      </div>
    </nav>

    <div class="chat-container">
    <section id="sidebar">
      <div class="conversation-area">
      <div class="msg online">
            <img class="msg-profile" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29.png" alt="">
            <div class="msg-detail">
            <div class="msg-username">Madison Jones</div>
            <div class="msg-content">
              <span class="msg-message">What time was our meet</span>
              <span class="msg-date">20m</span>
            </div>
             </div>
      </div>
      </div>
    </section><!-- close sidebar -->

    <section id="chat-area">
    <?php
    // $pswd = "supersecret";
    // $pswd2 = "supersecreT";
    // if (strcmp($pswd, $pswd2) != 0) {
    //     echo "Passwords do not match!";
    // } else {
    //     echo "Passwords match!";
    // }
    // $password = password_hash('dinesh',PASSWORD_DEFAULT);
    // echo $password;

    

?>
      
    </section><!-- close chat-area -->

    <section id="right-area">
      <ul class="right-ul">
        <li><a href="#"><span class="profile-img-span"><img src="assets/images/keyboard.jpg" alt="Profile image" class="profile-img"></span></a></li>
        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Dinesh Uprety <span class="cool-hover"></span></a></li>
        <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i> Search User <span class="cool-hover"></span></a></li>
        <li><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i> Settings <span class="cool-hover"></span></a></li>
        <li><a href="#"><i class="fa fa-file-image-o" aria-hidden="true"></i> Share File & Images <span class="cool-hover"></span></a></li>
        <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout <span class="cool-hover"></span></a></li>
      </ul>
    </section>  <!-- close right-area -->
    </div>
</body>
</html>