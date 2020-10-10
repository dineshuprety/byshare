<div class="form-area">

        <form method="POST" action="">
          <div class="group">
            <h2 class="form-heading">Create New Account</h2>
          </div><!-- close group -->

          <div class="group">
            <input type="email" name="email"  class="control" placeholder="Enter Email/Gmail" max="10" maxlength="200" value="<?php if(isset($email)): echo htmlspecialchars($email); endif; ?>" required>
          </div><!--close group-->

          <div class="group">
          <input type="email" name="email1"  class="control" placeholder="Confirm Email/Gmail" max="10" maxlength="200" value="<?php if(isset($email1)): echo htmlspecialchars($email1); endif; ?>" required>
          <div class="name-error error">
                <?php if(isset($email_error)): ?>
                <?php echo $email_error; ?>
                <?php endif; ?>
          </div> 
          </div><!--close group-->

          <div class="group">
          <input type="password" name="password"  class="control" placeholder="Create Password" max="5" maxlength="20" required>
          </div><!--close group-->

          <div class="group">
          <input type="password" name="password1"  class="control" placeholder="Confirm Password" max="5" maxlength="20" required>
          <div class="name-error error">
              <?php if(isset($password_error)): ?>
              <?php echo $password_error; ?>
              <?php endif; ?>
           </div> 
          </div><!--close group-->

          <div class="group">
          <input type="submit" name="signup_form" class="btn account-btn" value="Create account">
          </div><!--close group-->

          <div class="group">
             <a href="login.php" class="link"> Already have an account</a>
          </div><!--close group-->

        </form>
    </div><!--close form-area-->