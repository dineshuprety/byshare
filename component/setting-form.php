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
            <input type="text" name="fname"  class="control" placeholder="Enter First Name"/>
          </div><!--close group-->

          <div class="group">
          <input type="text" name="lname"  class="control" placeholder="Enter Last Name"  >
          </div><!--close group-->

          <div class="group">
          <input type="tel" name="phone" class="control" pattern="[0-9]{10}" placeholder="Phone Number"  >
          </div><!--close group-->

          <div class="group">
          <input type="text" name="country"  class="control" placeholder="Enter Your Country" >
          </div><!--close group-->

          <div class="group">
          <input type="date" name="date"  class="control" placeholder="Date of birth" >
          </div><!--close group-->

          <div class="group">
            <select name="skills" class="control" >
              <option value="programing">Programming</option>
              <option value="iot">IOT</option>
              <option value="ethical hacker">Ethical Hacker</option>
            </select>
          </div>

          <div class="group">
            <select name="gender" class="control" >
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </select>
          </div>

          <div class="group">
          <textarea type="text" name="detais"  class="control" placeholder="About your self"></textarea>
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
          <input type="password" name="oldpassword"  class="control" placeholder="Old Password" >
          </div><!--close group-->

          <div class="group">
          <input type="password" name="newpassword"  class="control" placeholder="New Password" >
          </div><!--close group-->
          <div class="group">
          <input type="password" name="newpassword1"  class="control" placeholder="Confirm Password" >
          </div><!--close group-->
          <div class="group">
          <input type="submit" name="setting_password" class="btn update-btn" value="Update">
          </div>
          
    </form>
    </div>