<?php 
include 'init.php';
$obj = new base_class;
$details = new details;
if(isset($_SESSION['byshare_email']) && isset($_SESSION['byshare_password'])){
  if($obj->Normal_Query("SELECT byshare_setup_status FROM byshare_users WHERE byshare_email = ? ",[$_SESSION['byshare_email']])){
    $row = $obj->Single_Result();
    $setup_page = $row->byshare_setup_status;
    if($setup_page != 0){
     
    }else{
      header('location:setup.php');
    }
  }
  
}else{
  exit("<script type='text/javascript'>
  location.replace('login.php');
                </script>");
}
?>
<?php include 'Form_handler/setting_userdetails.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Setting</title>
  <?php include 'component/css.php'; ?>

</head>
<body>
    <?php if(isset($_SESSION['settings_updates'])): ?>
      <div class="flash success-flash">
      <span class="remove" >&times;</span>
      <div class="flash-heading">
      <h3><span class="checked">&#10004;</span> You updated your Setting</h3>
      </div>
      <div class="flash-body">
       <p><?php echo $_SESSION['settings_updates']; ?></p>
      </div>
    </div>
    <?php endif; ?>
    <?php unset($_SESSION['settings_updates']); ?>
    
    <!-- nap -->
    <?php include 'component/nav.php'; ?>
    <!-- nap include end -->

    <div class="chat-container">
    
      <!-- side-bar include -->
      <?php include 'component/side-bar.php'; ?>
      <!-- side-bar include end -->

    <section id="chat-area">
      <!-- setting-form include -->
      <?php include 'component/setting-form.php'; ?>
      <!-- setting-form include end-->

    </section><!-- close chat-area -->

      <!-- right area include -->
      <?php include 'component/right-area.php'; ?>
      <!-- right area include end -->
    
  </div>
  <?php include 'component/js.php'; ?>
</body>
</html>