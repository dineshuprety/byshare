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
      $_SESSION[$session_name] = $session_value;
      
    }
    public function Single_Result(){
      return $this->Query->fetch(PDO::FETCH_OBJ);
    }
    
    public function concatUsername($firstname,$lastname){
      //Generate username by concateting fname and lname
      $i = 0;
      $usernames = strtolower($firstname."_".$lastname);
      $this->Normal_Query("SELECT byshare_profile_details_username FROM byshare_profile_details WHERE byshare_profile_details_username = '$usernames'");
      //if username exists add number to username
      while($this->Count_Rows()!=0) {

        $usernamess = $usernames.'_'.$i++;
        $this->Normal_Query("SELECT byshare_profile_details_username FROM byshare_profile_details WHERE byshare_profile_details_username = '$usernamess'");
      }
      return $usernamess;
    }
  }

?>
