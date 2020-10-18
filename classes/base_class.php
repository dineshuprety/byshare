<?php 

  class base_class extends db {

    private $Query;

    public function Normal_Query($query, $param = null){
      if(is_null($param)){
        $this->Query = $this->con->prepare($query);
        return $this->Query->execute();
      }else{
        $this->Query = $this->con->prepare($query);
        return $this->Query->execute($param);
      }
    }
   //return total id 
    public function Count_Rows(){
      return $this->Query->rowCount();
    }
    public function security($data) {
      return trim(strip_tags(str_replace(' ','',$data)));
    }
    public function Create_Session($session_name, $session_value){
      // session_regenerate_id();
      $_SESSION[$session_name] = $session_value;
      
    }
    public function Single_Result(){
      return $this->Query->fetch(PDO::FETCH_OBJ);
    }
    
    public function concatUsername($firstname,$lastname){
            error_reporting(0);
            $i = 0;
            $usernames = strtolower($firstname."_".$lastname);
            if($this->Normal_Query("SELECT byshare_profile_details_username FROM byshare_profile_details WHERE byshare_profile_details_username = '$usernames'")){
            $row = $this->Single_Result();
            $db_username = $row->byshare_profile_details_username;
            //if username exists add number to username
            if($usernames == $db_username){
                while($this->Count_Rows()!=0) {

                  $usernamess = $usernames.'_'.$i++;
                  $this->Normal_Query("SELECT byshare_profile_details_username FROM byshare_profile_details WHERE byshare_profile_details_username = '$usernamess'");
                }
                return $usernamess;
            }
          }
            return $usernames;
      
    }

    public function getRecentUser(){

      $userLoggedIn = $_SESSION['byshare_username'];

        if($this->Normal_Query("SELECT user_to, user_from FROM message WHERE user_to = ? OR user_from = ? ORDER BY msg_id DESC LIMIT 1",[$userLoggedIn, $userLoggedIn])){
            if($this->Count_Rows() == 0){
              return false;
            }else{
              $row       = $this->Single_Result();
              $user_to   = $row->user_to;
              $user_form = $row->user_from;

              if($user_to != $userLoggedIn){
                return $user_to;
              }else{
                return $user_form;
              }
            }
        }

    }

    public function time_ago($db_msg_time){

      $db_time = strtotime($db_msg_time);

      $current_time = time();

      $seconds = $current_time - $db_time;
      $minutes = floor($seconds/60);//60
      $hours   = floor($seconds/3600);//60*60
      $days    = floor($seconds/86400);//24 * 60 * 60
      $weeks   = floor($seconds/604800);//7 * 24 * 60 * 60
      $month   = floor($seconds/2592000);//30 * 7 * 24 * 60 * 60
      $year    = floor($seconds/31536000);//365 * 30 * 7 * 24 * 60 * 60

      if($seconds <= 60){
          return "Just Now";
      }
      elseif($minutes <= 60){
            if($minutes == 1){
              return "1 minute ago";
            }else{
              return $minutes." minutes ago";
            }
      }
      elseif($hours <= 24){
          if($hours == 1){
            return "1 hour ago";
          }else{
            return $hours." hours ago";
          }
      }
      elseif($days <= 7){
            if($days == 1){
              return "1 day ago";
            }else{
              return $days." days ago";
            }
      }
      elseif($weeks <= 4.3){
            if($weeks == 1){
              return "1 week ago";
            }else{
              return $weeks." weeks ago";
            }
      }
      elseif($month <= 12){
            if($month == 1){
              return "1 month ago";
            }else{
              return $month." months ago";
            }
      }
      else{
          if($year == 1){
            return "1 year ago";
          }else{
            return $year." years ago";
          }
      }
    }
 }

?>
