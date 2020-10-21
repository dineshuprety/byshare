<?php 
// check submit button value

if(isset($_POST['change_image'])){
  $details->settingChanges('change_image');

}elseif(isset($_POST['setting_changes'])){
  $details->settingChanges('setting_changes');

}elseif(isset($_POST['setting_password'])){
  $details->settingChanges('setting_password');
}


?>
<div class="setting">
      <div class="group">
            <h2 class="form-heading">Account Settings</h2>
      </div><!-- close group -->
      <div class="group">
            <h2 class="form-heading">Upload new profile picture</h2>
      </div><!-- close group -->
      <img src="assets/images/<?php echo $details->getProfilePic();?>" class="account-setting-img">
      <form action="" method="POST" enctype="multipart/form-data">
      <div class="group">
            <label for="file" id="file-label"><i class="fa fa-file-image-o upload-icon"></i>Choose image</label>
            <input type="file" name="images" class="file" id="file" >
            <div class="name-error error">
                <?php if(isset($_SESSION['image_error'])): ?>
                <?php echo $_SESSION['image_error']; ?>
                <?php endif; ?>
                <?php unset($_SESSION['image_error']); ?>
            </div> 
      </div><!--close group-->
      <div class="group">
        <input type="submit" name="change_image" class="btn update-btn" value="Update" >
      </div><!--close group--><br>
      </form>


      <div class="group">
            <h2 class="form-heading">Modify the values and click 'Update Details'</h2>
      </div><!-- close group -->
  <form action="" method="POST" >
    <!-- details update -->
    <div class="group">
            <input type="text" name="fname"  class="control" value="<?php echo htmlentities($fname); ?>" placeholder="Enter First Name"/>
            <div class="name-error error">
                <?php if(isset($_SESSION['fname_error'])): ?>
                <?php echo $_SESSION['fname_error']; ?>
                <?php endif; ?>
                <?php unset($_SESSION['fname_error']); ?>
            </div> 
          </div><!--close group-->

          <div class="group">
          <input type="text" name="lname" value="<?php  echo htmlentities($lname); ?>" class="control" placeholder="Enter Last Name"  >
          <div class="name-error error">
                <?php if(isset($_SESSION['lname_error'])): ?>
                <?php echo $_SESSION['lname_error']; ?>
                <?php endif; ?>
                <?php unset($_SESSION['lname_error']); ?>
            </div> 
          </div><!--close group-->

          <div class="group">
          <input type="tel" name="phone" value="<?php echo htmlentities($phone); ?>"  class="control" pattern="[0-9]{10}" placeholder="Phone Number"  >
          <div class="name-error error">
                <?php if(isset($_SESSION['phone_num_error'])): ?>
                <?php echo $_SESSION['phone_num_error']; ?>
                <?php endif; ?>
                <?php unset($_SESSION['phone_num_error']); ?>
            </div> 
          </div><!--close group-->

          <div class="group">
            <select name="country" class="control" >
              <?php 
                $obj->Normal_Query("SELECT country_id, country_name, phonecode FROM country");
                while($row = $obj->Single_Result()){ ?>
                  <option value="<?php echo $row->country_name; ?>" <?php echo $row->country_name == $country?'selected':'' ?>><?php echo htmlentities($row->country_name); ?></option>
               <?php }

              ?>
            </select>
          </div>

          <div class="group">
          <input type="date" name="date" value="<?php echo htmlentities($dob); ?>"   class="control" placeholder="Date of birth" >
          <div class="name-error error">
                <?php if(isset($_SESSION['dob_error'])): ?>
                <?php echo $_SESSION['dob_error']; ?>
                <?php endif; ?>
                <?php unset($_SESSION['dob_error']); ?>
            </div> 
          </div><!--close group-->

          <div class="group">
            <select name="skills" class="control" >
              <?php 
                $obj->Normal_Query("SELECT skills_id, skills_name FROM skills");
                while($row = $obj->Single_Result()){ ?>
                  <option value="<?php echo $row->skills_name; ?>" <?php echo $row->skills_name == $skill?'selected':'' ?>><?php echo htmlentities($row->skills_name); ?></option>
               <?php }

              ?>
            </select>
          </div>

          <div class="group">
            <select name="gender" class="control" >
            <option <?php echo $gender == 'Male'?'selected':'' ?>>Male</option>
            <option <?php echo $gender == 'Female'?'selected':'' ?>>Female</option>
            </select>
          </div>

          <div class="group">
          <textarea type="text" name="details" rows="3" cols="2" class="control" placeholder="About your self"><?php echo htmlentities($detail); ?></textarea>
          <div class="name-error error">
                <?php if(isset($_SESSION['details_error'])): ?>
                <?php echo $_SESSION['details_error']; ?>
                <?php endif; ?>
                <?php unset($_SESSION['details_error']); ?>
            </div> 
          </div><!--close group-->
          
          <div class="group">
          <input type="submit" name="setting_changes" class="btn update-btn" value="Update">
          </div><!--close group--><br>
  </form>

          <div class="group">
            <h2 class="form-heading">Change Password</h2>
      </div><!-- close group -->

    <form action="" method="POST">
      <div class="group">
          <input type="password" name="oldpassword"  class="control" placeholder="Old Password" required>
          <div class="name-error error">
                <?php if(isset($_SESSION['oldpassword_error'])): ?>
                <?php echo $_SESSION['oldpassword_error']; ?>
                <?php endif; ?>
                <?php unset($_SESSION['oldpassword_error']); ?>
            </div> 
          </div><!--close group-->

          <div class="group">
          <input type="password" name="newpassword"  class="control" placeholder="New Password" required >
          </div><!--close group-->
          <div class="group">
          <input type="password" name="newpassword1"  class="control" placeholder="Confirm Password" required >
          <div class="name-error error">
                <?php if(isset($_SESSION['password_error'])): ?>
                <?php echo $_SESSION['password_error']; ?>
                <?php endif; ?>
                <?php unset($_SESSION['password_error']); ?>
            </div> 
          </div><!--close group-->
          <div class="group">
          <input type="submit" name="setting_password" class="btn update-btn" value="Update">
          </div>
          
    </form>
    </div>