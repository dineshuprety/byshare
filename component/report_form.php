<?php 
    if(isset($_POST['reports_bug'])){
        $details->settingChanges('reports_bug');
      
      }

?>

<form action="" method="POST" >

<div class="setting">
<div class="group">
<h2 class="form-heading">Report Bug</h2>
<h2 style="float: right;" class="form-heading"> Hi, <?php echo $details->getFirstNameLastName(); ?> Byshare web chat application is developed by CoderCoffee and there are some error or bug which can't be found due to thousands lines of code thats why we create report system to report the bug . </h2>
          <textarea type="text" name="report_details" rows="10" cols="2" class="control" placeholder="Report the bug"></textarea>
</div>
<div class="name-error error">
                <?php if(isset($_SESSION['bug_error'])): ?>
                <?php echo $_SESSION['bug_error']; ?>
                <?php endif; ?>
                <?php unset($_SESSION['bug_error']); ?>
            </div> 
<div class="group">
        <input type="submit" name="reports_bug" class="btn update-btn" value="Report" >
      </div><!--close group--><br>
</div>
</form>