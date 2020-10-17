<?php 
include 'init.php';
$obj  = new base_class;
$obj1 = new details;
if(isset($_SESSION['byshare_email']) && isset($_SESSION['byshare_password'])){
  if($obj->Normal_Query("SELECT byshare_setup_status FROM byshare_users WHERE byshare_email = ? ",[$_SESSION['byshare_email']])){
    $row = $obj->Single_Result();
    $setup_page = $row->byshare_setup_status;
    if($setup_page != 0){
      $html = '<html>
              <head>
              <link rel="icon" href="assets/images/logo.png" type="image/gif" sizes="16x16">
              <link rel="stylesheet" href="assets/css/style-exit.css">
              </head>
              <title>Error</title>
              <body>
              <div class="div" >
                  <h1 class="h1" >User Masseges </h1>
                  <p class="p"> Setup page has been already fill by user. Thank You
                  <a href="message.php" class="a" >"Go Back"</a> link.</p>
                </div>';
            $html.='<script type="text/javascript" src="assets/js/jquery.min.js"></script>
            <script type="text/javascript" src="assets/js/reload-page.js"></script>          
                </body>
                </html>';
      exit($html);

    }
  } 
}else{
  exit("<script type='text/javascript'>
  location.replace('login.php');
                </script>");
}
?>
<?php 
  if(isset($_POST['setup_form'])){
    // setup page form value

    $fname      = $obj->security($_POST['fname']);
    $fname      = ucfirst(strtolower($fname));//uppercase first letter
    $lname      = $obj->security($_POST['lname']);
    $lname      = ucfirst(strtolower($lname));//uppercase first letter
    $phone_num  = $obj->security($_POST['phone']);
    $country_name = $obj->security($_POST['country']);
    $img_name   = $_FILES['images']['name'];
    $img_name   = uniqid(). basename($img_name);
    $img_tmp    = $_FILES['images']['tmp_name'];  
    $img_path   = "assets/images";
    $imageFileType = pathinfo($img_name, PATHINFO_EXTENSION);
    $dob        = $obj->security($_POST['date']);
    $skills     = $obj->security($_POST['skills']);
    $gender     = $obj->security($_POST['gender']);
    $detail    = trim($_POST['details']);//remove html tag
    $member     = date('Y-m-d'); // current date
    $byshare_user_id = $_SESSION['byshare_user_id']; // storeing user id in var form session

    $fname_status = $lname_status = $phone_num_status = $country_name_status = $dob_status = $skills_status = $gender_status = $details_status = $image_status = 1;


    // form values validation

    //fname validation
    if(empty($fname)){
      $fname_error = "Fname is requried";
      $fname_status = "";
    }elseif(strlen($fname) > 30 || strlen($fname) < 5){
      $fname_error = "Your first name must be between 5 and 30 characters";
      $fname_status = "";
    }

    //lname validation
    if(empty($lname)){
      $lname_error = "Fname is requried";
      $lname_status = "";
    }elseif(strlen($lname) > 30 || strlen($lname) < 5){
      $lname_error = "Your Last name must be between 5 and 30 characters";
      $lname_status = "";
    }

    // phone number validation

    if(empty($phone_num)){
      $phone_num_error = "Fname is requried";
      $phone_num_status = "";
    }

    // counrty validation
    if(empty($country_name)){
      $country_name_error = "Country name is requried";
      $country_name_status = "";
    }

    // dob validation
    if(empty($dob)){
      $dob_error = " Date of birth is requried";
      $dob_status = "";
    }

    // skills validation
    if(empty($skills)){
      $skills_error = " Date of birth is requried";
      $skills_status = "";
    }
    // gender validation
    if(empty($gender)){
      $gender_error = " Gender is requried";
      $gender_status = "";
    }
    // details validation
    if(empty($detail)){
      $details_error = "Filed is requried";
      $details_status = "";
    }elseif(strlen($detail) < 20){
      $details_error = "Details must be more then 20 characters";
      $details_status = "";
    }
    // image validation
    if(empty($img_name)){
      $image_error = "Image is requried";
      $image_status = "";
    }elseif(strtolower($imageFileType) != "jpeg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpg") {
      $image_error = "Sorry, only jpeg, jpg and png files are allowed";
      $image_status = "";
    }elseif($_FILES['images']['size'] > 2097152){
      $image_error = "Sorry your file is too large limit is 2MB";
      $image_status = "";
    }

    // check the status is empty or not
    if(!empty($fname_status) && !empty($lname_status) && !empty($phone_num_status) && !empty($country_name_status) && !empty($dob_status) && !empty($skills_status) && !empty($gender_status) && !empty($details_status) && !empty($image_status)){

       $username = $obj->concatUsername($fname,$lname);
        
        $obj->Create_Session("byshare_username",$username);
        
        if($obj->Normal_Query("INSERT INTO byshare_profile_details (byshare_id, byshare_profile_details_fname, byshare_profile_details_lname, 	byshare_profile_details_username, byshare_profile_details_profile_pic, byshare_profile_details_dob, byshare_profile_details_skill, byshare_profile_details_phone_num, byshare_profile_details_country, byshare_profile_details_member, byshare_profile_details_gender, byshare_profile_details_your_info) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",[$byshare_user_id, $fname, $lname, $username, $img_name, $dob, $skills, $phone_num, $country_name, $member, $gender, $detail])){
          
          move_uploaded_file($img_tmp, "$img_path/$img_name");
          // change status to 1
          $update_setup_page = 1;
          $obj->Normal_Query("UPDATE byshare_users SET byshare_setup_status = ? WHERE byshare_id = ?",[$update_setup_page, $byshare_user_id]);

          header('location:message.php');
        }
    }

  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Setup</title>
  <?php include 'component/css.php'; ?>
</head>
<body>
<div class="setup-page">

    <!-- setup-form include -->
    <?php include 'component/setup-form.php'; ?>
    <!-- setup-form include -->

</div><!--close setup-page-->
  <?php include 'component/js.php'; ?>
</body>
</html>