<div class="form-area">
          <?php if(isset($_SESSION['account_success'])): ?>
            <div class="alert alert-success">
              <?php echo $_SESSION['account_success']; ?>
            </div>
          <?php endif; ?>
          <?php unset($_SESSION['account_success']); ?>
        <form method="POST" action="">
          <div class="group">
            <h2 class="form-heading">User login</h2>
          </div><!-- close group -->

          <div class="group">
            <input type="email" name="email"  class="control" placeholder="Enter Email/Gmail" value="<?php if(isset($email)): echo htmlspecialchars($email); endif; ?>" required>
            <div class="name-error error">
                <?php if(isset($email_error)): ?>
                <?php echo $email_error; ?>
                <?php endif; ?>
          </div> 
          </div><!--close group-->

          <div class="group">
          <input type="password" name="password"  class="control" placeholder=" Password" value="<?php if(isset($password)): echo htmlspecialchars($password); endif; ?>" required>
          <div class="name-error error">
                <?php if(isset($password_error)): ?>
                <?php echo $password_error; ?>
                <?php endif; ?>
          </div> 
          </div><!--close group-->

          <div class="group">
          <input type="submit" name="login_form" class="btn account-btn" value="Login">
          </div><!--close group-->

          <div class="group">
             <a href="signup.php" class="link"> Create an account</a>
          </div><!--close group-->
        </form>
    </div><!--close form-area-->