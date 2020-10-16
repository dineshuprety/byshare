<?php 
include '../init.php';
$obj = new base_class;

if(isset($_GET['message'])){
  
  $userLoggedIn = $_SESSION['byshare_username'];
  $user_to      = $_SESSION['user_to'];
  $data = "";

  if($obj->Normal_Query("UPDATE message SET opened = ? WHERE user_to = ? AND user_from = ?",["yes", $userLoggedIn, $user_to])){

  // $obj->Normal_Query("SELECT * FROM message INNER JOIN byshare_profile_details ON  message.user_from = byshare_profile_details_username");

      if($obj->Normal_Query("SELECT * FROM message WHERE (user_to = ? AND user_from = ?) OR (user_from = ? AND user_to = ?)",[$userLoggedIn, $user_to, $userLoggedIn, $user_to])){

        // if there is no messages from that user
        if($obj->Count_Rows() == 0){
            echo "Lets start conversation to your friends!";
        }else{
        // fetch the messgaes by userLoggedIn and user_to

            while($row = $obj->Single_Result()){
              $user_to = $row->user_to;
              $user_from = $row->user_from;
              $body = htmlentities($row->messages); 
              $msg_type = $row->msg_type;
              $date_time = $row->msg_time;


              if($user_from == $userLoggedIn){
                // right user messgaes
                // echo $body,"<br>";
                if($msg_type == "text"){

                    echo '<div class="right-messages common-margin">
                              <div class="right-msg-area">
                                <span class="date-time right-time">
                                          1 day ago
                                </span><!-- close date-time -->
                                <div class="right-msg">'.$body.'</div>
                              </div><!-- close right-msg-area -->
                            </div><!-- close right message -->';

                }elseif($msg_type == "jpg" || $msg_type == "jpeg" ){

                  echo '<div class="right-messages common-margin">
                              <div class="right-msg-area">
                                <span class="date-time right-time">
                                          1 day ago
                                </span><!-- close date-time -->
                                <div class="right-files">
                                <img src="assets/images/'.$body.'" class="common-images">
                                </div>
                              </div><!-- close right-msg-area -->
                        </div><!-- close right message -->';

                }elseif($msg_type == "png"){

                }elseif($msg_type == "zip"){
                  
                }elseif($msg_type == "txt"){
                  
                }elseif($msg_type == "pdf"){
                  
                }elseif($msg_type == "emoji"){
                  echo '<div class="right-messages common-margin">
                              <div class="right-msg-area">
                                <span class="date-time right-time">
                                          1 day ago
                                </span><!-- close date-time -->
                                <div class="right-msg" style="background-color:#f1efef;">
                                <img class="animated-emoji" src="'.$body.'" />
                                </div>
                              </div><!-- close right-msg-area -->
                        </div><!-- close right message -->';
                }elseif($msg_type == "docx"){
                  
                }elseif($msg_type == "xlsx"){
                  
                }


              }else{
                // left user messages
                // echo $body,"<br>";
                if($msg_type == "text"){

                }elseif($msg_type == "jpg" || $msg_type == "jpeg" ){

                }elseif($msg_type == "png"){

                }elseif($msg_type == "zip"){
                  
                }elseif($msg_type == "txt"){
                  
                }elseif($msg_type == "pdf"){
                  
                }elseif($msg_type == "emoji"){
                  
                }elseif($msg_type == "docx"){
                  
                }elseif($msg_type == "xlsx"){
                  
                }
              }
            }
          }
      }
    }
  
}

?>