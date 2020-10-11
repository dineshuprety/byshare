<?php 

$obj->Normal_Query("SELECT byshare_profile_details_fname,byshare_profile_details_lname,byshare_profile_details_dob,byshare_profile_details_skill,byshare_profile_details_phone_num,byshare_profile_details_country,byshare_profile_details_gender,byshare_profile_details_your_info FROM byshare_profile_details WHERE byshare_id = ?",[$_SESSION['byshare_user_id']]);

      $row   = $obj->Single_Result();
      $fname = $row->byshare_profile_details_fname;
      $lname = $row->byshare_profile_details_lname;
      $dob   = $row->byshare_profile_details_dob;
      $skill = $row->byshare_profile_details_skill;
      $phone = $row->byshare_profile_details_phone_num;
      $country = $row->byshare_profile_details_country;
      $gender  = $row->byshare_profile_details_gender;
      $detail = $row->byshare_profile_details_your_info;
?>