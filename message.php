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
      die();
    }
  }
  
}else{
  exit("<script type='text/javascript'>
  location.replace('login.php');
                </script>");
}
?>
<?php 

    if(isset($_GET['u'])){
      $user_to = $_GET['u'];
      $obj->Create_Session('user_to',$user_to);
    }
    else{
      $user_to = $obj->getRecentUser();
      if($user_to == false){
        $user_to = 'new';
        $obj->Create_Session('user_to',$user_to);
      }
      $obj->Create_Session('user_to',$user_to);
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <?php include 'component/css.php'; ?>
</head>
<body>
    <!-- nap -->
    <?php include 'component/nav.php'; ?>
    <!-- nap include end -->
    
  <div class="chat-container">
    
        <!-- side-bar include -->
        <?php include 'component/side-bar.php'; ?>
        <!-- side-bar include end -->

    <section id="chat-area">
                
        <!-- messages include -->
          <?php include 'component/messages.php'; ?>
          <!-- messages include end -->

            <!-- chat-form include -->
            <?php include 'component/chat-form.php'; ?>
            <!-- chat-form include end -->

          <!-- emoji include -->
          <?php include 'component/emoji.php'; ?>
          <!-- emoji include end -->

    </section><!-- close chat-area -->

        <!-- right area include -->
        <?php include 'component/right-area.php'; ?>
        <!-- right area include end -->
        
  </div>
  <?php include 'component/js.php'; ?>
</body>
</html>