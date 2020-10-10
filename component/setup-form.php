<div class="setup-area">
          
        <form method="POST" action="" enctype="multipart/form-data" >

          <div class="group">
            <h2 class="form-heading">Please Fill The Form</h2>
          </div><!-- close group -->

          <div class="group">
            <input type="text" name="fname"  class="control" placeholder="Enter First Name" max="5" maxlength="50" value="<?php if(isset($fname)): echo htmlspecialchars($fname); endif; ?>" required/>
            <div class="name-error error">
                <?php if(isset($fname_error)): ?>
                <?php echo $fname_error; ?>
                <?php endif; ?>
          </div> 
          </div><!--close group-->

          <div class="group">
          <input type="text" name="lname"  class="control" placeholder="Enter Last Name" max="5" maxlength="50" value="<?php if(isset($lname)): echo htmlspecialchars($lname); endif; ?>" required >
          <div class="name-error error">
                <?php if(isset($lname_error)): ?>
                <?php echo $lname_error; ?>
                <?php endif; ?>
          </div> 
          </div><!--close group-->

          <div class="group">
          <input type="tel" name="phone" class="control" pattern="[0-9]{10}" placeholder="Phone Number" max="5" maxlength="20" value="<?php if(isset($phone_num)): echo htmlspecialchars($phone_num); endif; ?>" required >
          <div class="name-error error">
                <?php if(isset($phone_num_error)): ?>
                <?php echo $phone_num_error; ?>
                <?php endif; ?>
          </div> 
          </div><!--close group-->

          <div class="group">
          <select name="country" class="control" required>
          <option value="">Select your country</option>
            <?php

                $obj->Normal_Query("SELECT country_id, country_name, phonecode FROM country");
                while($row = $obj->Single_Result()){
                  $country_id    = $row->country_id;
                  $country_names = $row->country_name;
                  $phone_code    = $row->phonecode;
              ?>
                <option value="<?php echo $country_id; ?>"><?php echo ucfirst(strtolower($country_names)).' , +'.$phone_code; ?></option>
              <?php } ?>
          </select>
          <div class="name-error error">
                <?php if(isset($country_name_error)): ?>
                <?php echo $country_name_error; ?>
                <?php endif; ?>
          </div> 
          </div><!--close group-->

          <div class="group">
            <label for="file" id="file-label"><i class="fa fa-file-image-o upload-icon"></i>Choose image</label>
            <input type="file" name="images" data-max-size="32154" class="file" id="file" required>
            <div class="name-error error">
                <?php if(isset($image_error)): ?>
                <?php echo $image_error; ?>
                <?php endif; ?>
            </div> 
          </div><!--close group-->

          <div class="group">
          <input type="date" name="date"  class="control cusor" placeholder="Date of birth" value="<?php if(isset($dob)): echo htmlspecialchars($dob); endif; ?>" required>
          <div class="name-error error">
                <?php if(isset($dob_error)): ?>
                <?php echo $dob_error; ?>
                <?php endif; ?>
          </div> 
          </div><!--close group-->

          <div class="group">
          <select name="skills" class="control" required>
          <option value="">Select your skill</option>
            <?php

                $obj->Normal_Query("SELECT * FROM skills");
                while($row = $obj->Single_Result()){
                  $skills_id = $row->skills_id;
                  $skill_name = $row->skills_name;
              ?>
                <option value="<?php echo $skills_id; ?>"><?php echo ucfirst(strtolower($skill_name)); ?></option>
              <?php } ?>
          </select>
          <div class="name-error error">
                <?php if(isset($skills_error)): ?>
                <?php echo $skills_error; ?>
                <?php endif; ?>
          </div> 
          </div><!--close group-->

          <div class="group">
            <select name="gender" class="control" required>
            <option value="">Select your gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </select>
            <div class="name-error error">
                <?php if(isset($gender_error)): ?>
                <?php echo $gender_error; ?>
                <?php endif; ?>
             </div> 
          </div>

          <div class="group">
          <textarea type="text" name="details" max="20" maxlength="250"  class="control" placeholder="About your self" title="You have to write your work"><?php if(isset($detail)): echo htmlspecialchars($detail); endif; ?></textarea>
              <div class="name-error error">
                <?php if(isset($details_error)): ?>
                <?php echo $details_error; ?>
                <?php endif; ?>
              </div>
          </div><!--close group-->
          
          <div class="group">
          <input type="submit" name="setup_form" class="btn update-btn" value="Update">
          </div><!--close group-->
        </form>
    </div><!--close setup-area-->