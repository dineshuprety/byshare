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

        // select country table
        $query1 = $this->con->prepare("SELECT country_id, country_name, phonecode FROM country WHERE country_id = ?");
        $query1->execute([$country]);
        $row1 = $query1->fetch(PDO::FETCH_OBJ);
        $country_name = $row1->country_name;
        $phone_code   = $row1->phonecode;

        // select skills from table
        $query2 = $this->con->prepare("SELECT skills_id, skills_name FROM skills WHERE skills_id = ?");
        $query2->execute([$skill]);
        $row2 = $query2->fetch(PDO::FETCH_OBJ);
        $skills_name = $row2->skills_name;

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
        <p><i class="fa fa-home info" ></i> '.htmlentities($country_name).' ,'.htmlentities($phone_code).'</p><br>
        <p><i class="fa fa-envelope info" ></i> '.htmlentities($gmail).'</p><br>
        <p><i class="fa fa-phone info" ></i> '.htmlentities($phone).'</p><br>
        <p><i class="fa fa-birthday-cake info"></i> '.str_replace('-','/',$dob).'</p><br>
        <p><i class="'.$class.'"></i> '.htmlentities($gender).' </p><br>
        <hr>
        <p><br><i class="fa fa-asterisk info" ></i> Skills</b></p>
        <ul style="padding-left: 40px;" class="info">
        <li><p>'.htmlentities($skills_name).'</p></li>
        </ul><br>
        <hr>
        <p><br><i class="fa fa-info info" ></i> Details</b></p>
        <ul style="padding-left: 40px;" class="info">
        <li><p>'. htmlentities($details).'</p></li>
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
                  
                  header('location:setting.php');
                  }
                }
          }
          
        break;
        }
        case 'setting_changes':{
          echo 'its working on setting';
        break;
        }
        case 'setting_password':{
          echo 'its working on password';
        break;
        }
        default:{
          exit("unauthorized : 404");
        }
      }
    }


  }

?> 
