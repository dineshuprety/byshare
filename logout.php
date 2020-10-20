<?php
include "init.php";
$obj = new base_class;
if(isset($_SESSION['byshare_email']) && isset($_SESSION['byshare_password'])){
  $_SESSION = array();
  session_destroy();
 echo"<script type='text/javascript'>
 window.location.href='login.php';
               </script>";
}


?>
