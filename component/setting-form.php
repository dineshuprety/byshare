<div class="setting">
      <div class="group">
            <h2 class="form-heading">Account Settings</h2>
      </div><!-- close group -->
      <div class="group">
            <h2 class="form-heading">Upload new profile picture</h2>
      </div><!-- close group -->
      <img src="assets/images/<?php echo $details->getProfilePic();?>" class="account-setting-img">
      <form>
      <div class="group">
            <label for="file" id="file-label"><i class="fa fa-file-image-o upload-icon"></i>Choose image</label>
            <input type="file" name="img" class="file" id="file" required>
      </div><!--close group-->
      <div class="group">
        <input type="submit" name="update" class="btn update-btn" value="Update">
      </div><!--close group--><br>

      <div class="group">
            <h2 class="form-heading">Modify the values and click 'Update Details'</h2>
      </div><!-- close group -->

    <!-- details update -->
    <div class="group">
            <input type="text" name="fname"  class="control" placeholder="Enter First Name"required/>
          </div><!--close group-->

          <div class="group">
          <input type="text" name="lname"  class="control" placeholder="Enter Last Name" required >
          </div><!--close group-->

          <div class="group">
          <input type="tel" name="phone" class="control" pattern="[0-9]{10}" placeholder="Phone Number" required >
          </div><!--close group-->

          <div class="group">
          <input type="text" name="country"  class="control" placeholder="Enter Your Country" required>
          </div><!--close group-->

          <div class="group">
          <input type="date" name="date"  class="control" placeholder="Date of birth" required>
          </div><!--close group-->

          <div class="group">
            <select name="skills" class="control" required>
              <option value="programing">Programming</option>
              <option value="iot">IOT</option>
              <option value="ethical hacker">Ethical Hacker</option>
            </select>
          </div>

          <div class="group">
            <select name="gender" class="control" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </select>
          </div>

          <div class="group">
          <textarea type="text" name="detais"  class="control" placeholder="About your self"></textarea>
          </div><!--close group-->
          
          <div class="group">
          <input type="submit" name="update" class="btn update-btn" value="Update">
          </div><!--close group--><br>

          <div class="group">
            <h2 class="form-heading">Change Password</h2>
      </div><!-- close group -->

      <div class="group">
          <input type="password" name="oldpassword"  class="control" placeholder="Old Password" required>
          </div><!--close group-->

          <div class="group">
          <input type="password" name="newpassword"  class="control" placeholder="New Password" required>
          </div><!--close group-->
          <div class="group">
          <input type="password" name="newpassword1"  class="control" placeholder="Confirm Password" required>
          </div><!--close group-->
          <div class="group">
          <input type="submit" name="update" class="btn update-btn" value="Update">
          </div>
          
      </form>
    </div>