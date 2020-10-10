
<?php
session_start();
date_default_timezone_set("Asia/Kathmandu");
ob_start();//truns on output buffering

    spl_autoload_register(function($class_name){
      include "classes/$class_name.php";
    })

?>
