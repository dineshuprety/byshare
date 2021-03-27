<?php 

  class details extends db {

      protected $con;

    public function getUsername(){
        $userLoggedIn = $_SESSION['byshare_username'];
        return $userLoggedIn;
      }

      
    public function getFirstNameLastName(){
        $id = $_SESSION['byshare_user_id'];
        $query = $this->con->prepare("SELECT byshare_profile_details_fname,byshare_profile_details_lname FROM byshare_profile_details WHERE byshare_id = ?");
        $query->execute([$id]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $firstname = $row['byshare_profile_details_fname'];
        $lastname  = $row['byshare_profile_details_lname'];
        $name = $firstname." ".$lastname;
        return $name;

    }
    public function getProfilePic(){
      $id = $this->getUsername();
      $query = $this->con->prepare("SELECT byshare_profile_details_profile_pic FROM byshare_profile_details WHERE byshare_profile_details_username = ? ");
      $query->execute([$id]);
      $row = $query->fetch(PDO::FETCH_ASSOC);
      return $row['byshare_profile_details_profile_pic'];

    }

    public function getProfileDetails(){

      // get username from url
      if(isset($_GET['profile_username'])){
        $username = htmlentities($_GET['profile_username']);
      }
      $query = $this->con->prepare("SELECT * FROM byshare_profile_details WHERE byshare_profile_details_username = ?");
      $query->execute([$username]);
      if($query->rowCount() == 0){
        $html = '<html>
        <head>
        <link rel="icon" href="assets/images/logo.png" type="image/gif" sizes="16x16">
        <link rel="stylesheet" href="assets/css/style-exit.css">
        </head>
        <title>Error</title>
        <body>
        <div class="div" >
            <h1 class="h1" >User Not Found </h1>
            <p class="p"> The url data has been change . Thank You
            <a href="message.php" class="a" >"Go Back"</a> link.</p>
          </div>        
          </body>
          </html>';
          exit($html);
      }else{
      $row   = $query->fetch(PDO::FETCH_OBJ);
      $byshare_id = $row->byshare_id;
      $fname = $row->byshare_profile_details_fname;
      $lname = $row->byshare_profile_details_lname;
      $photo = $row->byshare_profile_details_profile_pic;
      $dob   = $row->byshare_profile_details_dob;
      $skill = $row->byshare_profile_details_skill;
      $phone = $row->byshare_profile_details_phone_num;
      $country = $row->byshare_profile_details_country;
      $gender  = $row->byshare_profile_details_gender;
      $details = $row->byshare_profile_details_your_info;
      
      if($gender == "Male"){
        $class = "fa fa-male info";
      }else{
        $class = "fa fa-female info";
      }

        
        // select gmail from user table
        
        $query3 = $this->con->prepare("SELECT byshare_email FROM byshare_users WHERE byshare_id = ?");
        $query3->execute([$byshare_id]);
        $row3  = $query3->fetch(PDO::FETCH_OBJ);
        $gmail = $row3->byshare_email;

        $html='<div class="profile">
        <div class="profile-card">
        <div class="image-container">
        <img src="assets/images/'.$photo.'" class="profile-image">
        <div class="title">
        <h2>'.$fname.' '.$lname.'</h2>
        </div>
        </div>
        <div class="main-container">
        <p><i class="fa fa-home info" ></i> '.htmlentities($country).'</p><br>
        <p><i class="fa fa-envelope info" ></i> '.htmlentities($gmail).'</p><br>
        <p><i class="fa fa-phone info" ></i> '.htmlentities($phone).'</p><br>
        <p><i class="fa fa-birthday-cake info"></i> '.str_replace('-','/',$dob).'</p><br>
        <p><i class="'.$class.'"></i> '.htmlentities($gender).' </p><br>
        <hr>
        <p><br><i class="fa fa-asterisk info" ></i> Skills</b></p>
        <ul style="padding-left: 40px;" class="info">
        <li><p>'.htmlentities($skill).'</p></li>
        </ul><br>
        <hr>
        <p><br><i class="fa fa-info info" ></i> Details</b></p>
        <ul style="padding-left: 40px;" class="info">
        <li><p>'. htmlentities($details).'</p></li>
        </ul><br>
        <hr>
        <p><br><i class="fa fa-whatsapp info" ></i> Chat With Me</b></p><br>
        <ul style="padding-left: 40px;" class="info">
        <a id="GFG" href="message.php?u='.$username.'" ><input type="button" value="Chat With ME"  class="btn try-btn" ></a>
        </ul>
        </div>
        </div>
       </div>';

        return $html;
      }
    }

    public function settingChanges($form_post){
      // switch statement for submit the changes in setting
      $obj = new base_class;
      switch($form_post){
        case 'change_image':{
          if(isset($_POST['change_image'])){
            $img_name   = $_FILES['images']['name'];
            $img_name   = uniqid(). basename($img_name);
            $img_tmp    = $_FILES['images']['tmp_name'];  
            $img_path   = "assets/images";
            $imageFileType = pathinfo($img_name, PATHINFO_EXTENSION);

            $image_status = 1;
             // image validation
                if(empty($img_name)){
                  $obj->Create_Session("image_error","Image is requried");
                  $image_status = "";
                }
                elseif(strtolower($imageFileType) != "jpeg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpg") {
                  $obj->Create_Session("image_error","Sorry, only jpeg, jpg and png files are allowed");
                  $image_status = "";
                }
                elseif($_FILES['images']['size'] > 2097152){
                  $obj->Create_Session("image_error","Sorry your file is too large limit is 2MB");
                  $image_status = "";
                }
                // check if image status != empty than submit form
                if(!empty($image_status)){

                  move_uploaded_file($img_tmp, "$img_path/$img_name");

                  if($obj->Normal_Query("UPDATE byshare_profile_details SET byshare_profile_details_profile_pic = ? WHERE byshare_profile_details_username = ? ",[$img_name, $this->getUsername()])){
                  $obj->Create_Session("settings_updates","Your image is successfully updated");
                  header('location:setting.php');
                  die();
                  }
                }
          }
          
        break;
        }

        case 'setting_changes':{
          if(isset($_POST['setting_changes'])){
                  $fname      = $obj->security($_POST['fname']);
                  $fname      = ucfirst(strtolower($fname));//uppercase first letter
                  $lname      = $obj->security($_POST['lname']);
                  $lname      = ucfirst(strtolower($lname));//uppercase first letter
                  $phone_num  = $obj->security($_POST['phone']);
                  $country_name = strip_tags(trim($_POST['country']));
                  $dob        = $obj->security($_POST['date']);
                  $skills     = strip_tags(trim($_POST['skills']));
                  $gender     = $obj->security($_POST['gender']);
                  $detail    = trim($_POST['details']);//remove html tag
                  $byshare_user_id = $_SESSION['byshare_user_id']; // storeing user id in var form session

                  $fname_status = $lname_status = $phone_num_status = $dob_status =  $details_status = 1;


                  // form values validation

                  //fname validation
                  if(empty($fname)){
                    $obj->Create_Session('fname_error','Fname is requried');
                    $fname_status = "";
                  }elseif(strlen($fname) > 30 || strlen($fname) < 3){
                    $obj->Create_Session('fname_error','Your first name must be between 5 and 30 characters');
                    $fname_status = "";
                  }

                  //lname validation
                  if(empty($lname)){
                    $obj->Create_Session('lname_error','Fname is requried');
                    $lname_status = "";
                  }elseif(strlen($lname) > 30 || strlen($lname) < 3){
                    $obj->Create_Session('lname_error','Your Last name must be between 5 and 30 characters');
                    $lname_status = "";
                  }

                  // phone number validation

                  if(empty($phone_num)){
                    $obj->Create_Session('phone_num_error','Fname is requried');
                    $phone_num_status = "";
                  }

                  // dob validation
                  if(empty($dob)){
                    $obj->Create_Session('dob_error','Date of birth is requried');
                    $dob_status = "";
                  }

                  // details validation
                  if(empty($detail)){
                    $obj->Create_Session('details_error','Filed is requried');
                    $details_status = "";
                  }elseif(strlen($detail) < 20){
                    $obj->Create_Session('details_error','Details must be more then 20 characters');
                    $details_status = "";
                  }
                  
                  // check the status is empty or not
                  if(!empty($fname_status) && !empty($lname_status) && !empty($phone_num_status) && !empty($dob_status) && !empty($details_status)){
                   
                     if($obj->Normal_Query("UPDATE byshare_profile_details SET byshare_profile_details_fname = ?,byshare_profile_details_lname = ?, byshare_profile_details_dob = ?, byshare_profile_details_skill = ?, byshare_profile_details_phone_num = ?, byshare_profile_details_country = ?, byshare_profile_details_gender = ?, byshare_profile_details_your_info= ? WHERE byshare_id = ?",[$fname, $lname, $dob, $skills, $phone_num, $country_name, $gender, $detail , $byshare_user_id])){

                      $obj->Create_Session("settings_updates","Your details is successfully updated");
                      header('location:setting.php');
                      die();
                     }

                  }
          }

        break;
        }

        case 'setting_password':{
          if(isset($_POST['setting_password'])){
            $oldpassword =  $obj->security(strtolower($_POST['oldpassword']));
            $newpassword =  $obj->security(strtolower($_POST['newpassword']));
            $newpassword1 = $obj->security(strtolower($_POST['newpassword1']));

               $password_status  = 1;  

                $obj->Normal_Query("SELECT byshare_password FROM byshare_users WHERE byshare_id = ?",[$_SESSION['byshare_user_id']]);
                  $row = $obj->Single_Result();
                  $db_password = $row->byshare_password;

              if(empty($oldpassword)){
                $obj->Create_Session('oldpassword_error',"Flied is requried");
                $password_status = "";
              }
              elseif(!password_verify($oldpassword, $db_password)){
                $obj->Create_Session('oldpassword_error',"Old password not match");
                $password_status = "";
              }
              if(empty($newpassword && $newpassword1)){
                $obj->Create_Session('password_error',"Flied is requried");
                $password_status = "";
              }
               elseif(strcmp($newpassword, $newpassword1) != 0 ){
                  $obj->Create_Session('password_error',"Password do not match!");
                  $password_status = "";
            }else {
              if(preg_match('/[^A-Za-z0-9]/', $newpassword1)) {
                $obj->Create_Session('password_error',"Your password can only contain english characters and numbers");
                $password_status = "";
              }
            }
              if(strlen($newpassword1) > 20 || strlen($newpassword1) < 5){
                $obj->Create_Session('password_error', "Your password must be between 5 and 20 characters");
                $password_status = "";
              }

              if(!empty($password_status)){
                if($obj->Normal_Query("UPDATE byshare_users SET byshare_password = ? WHERE byshare_id = ?",[password_hash($newpassword1,PASSWORD_DEFAULT),$_SESSION['byshare_user_id']])){
                 $obj->Create_Session("settings_updates","Your password is successfully updated");
                      header('location:setting.php');
                      die();
                }
              }
            
          }
        break;
        }

        case 'reports_bug':{
          if(isset($_POST['reports_bug'])){

            $report_bug = strip_tags(trim($_POST['report_details']));
            // $obj->Create_Session('report_bug',$report_bug);
            $report_status = 0;

            if(empty($report_bug)){
              $obj->Create_Session('bug_error','Filed is requried');
              $report_status = "";
            }elseif(strlen($report_bug) < 20){
              $obj->Create_Session('bug_error','Report must be more then 20 characters');
              $report_status = "";
            }
           
            if(!empty($report_status == 0)){

              // echo'working';
              // die();
              if($obj->Normal_Query("INSERT INTO report_bug(report_user, report_details) VALUES (?, ?)",[$this->getUsername(), $report_bug])){
                $obj->Create_Session("bug_report","Your report is successfully Inserted");
                      header('location:report.php');
                      die();
              }
            }

          }
          break;
        }
        default:{
          exit("unauthorized : 404");
        }
      }
    }


  }

?> 
