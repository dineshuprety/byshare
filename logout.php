<?php
include "init.php";
$obj = new base_class;
if(isset($_SESSION['byshare_email']) && isset($_SESSION['byshare_password'])){
  $_SESSION = array();
  session_destroy();
  unset($_SESSION['byshare_email'],$_SESSION['byshare_password']);
 echo"<script type='text/javascript'>
 window.location.href='login.php';
               </script>";
}


?>
