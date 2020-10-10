<section id="right-area">
      <ul class="right-ul">
        <li><a href="<?php echo $details->getUsername(); ?>"><span class="profile-img-span"><img src="assets/images/<?php echo $details->getProfilePic();?>" alt="Profile image" class="profile-img"></span></a></li>
        <li><a href="<?php echo $details->getUsername(); ?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $details->getFirstNameLastName(); ?> <span class="cool-hover"></span></a></li>
        <li><a class="cusor" onclick="location.href='search.php'"><i class="fa fa-search" aria-hidden="true"></i> Search User <span class="cool-hover"></span></a></li>
        <li><a class="cusor" onclick="location.href='setting.php'"><i class="fa fa-cogs" aria-hidden="true"></i> Settings <span class="cool-hover"></span></a></li>
        <!-- <li><a href="#"><i class="fa fa-file-image-o" aria-hidden="true"></i> Share File & Images <span class="cool-hover"></span></a></li> -->
        <li><a class="cusor"onclick="location.href='logout.php'"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout <span class="cool-hover"></span></a></li>
      </ul>
    </section>  <!-- close right-area -->