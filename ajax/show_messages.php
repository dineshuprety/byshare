<?php 
$time = time();
include '../init.php';
$obj = new base_class;
error_reporting(0);
if(isset($_GET['message'])){
  
  $userLoggedIn = $_SESSION['byshare_username'];
  $user_too     = $_SESSION['user_to'];
  $uid          = $_SESSION['byshare_user_id'];
  // it show me timestamp
  

  if($obj->Normal_Query("UPDATE message SET opened = ? WHERE user_to = ? AND user_from = ?",["yes", $userLoggedIn, $user_too])){

      // $obj->Normal_Query("SELECT * FROM message INNER JOIN byshare_profile_details ON  message.user_from = byshare_profile_details_username");

      // to show the right side name and images 
        $obj->Normal_Query("SELECT byshare_profile_details_fname, byshare_profile_details_lname,byshare_profile_details_profile_pic , online_users FROM byshare_profile_details WHERE byshare_profile_details_username = ?",[$user_too]);

        $row = $obj->Single_Result();
        $fname = $row->byshare_profile_details_fname;
        $lname = $row->byshare_profile_details_lname;
        $image = $row->byshare_profile_details_profile_pic;
        $online = $row->online_users;
        $name = $fname.' '.$lname;
        $class = "offline-icon";
        if($online > $time){
          $class = "online-icon";
        }

      if($obj->Normal_Query("SELECT * FROM message WHERE (user_to = ? AND user_from = ?) OR (user_from = ? AND user_to = ?)",[$userLoggedIn, $user_too, $userLoggedIn, $user_too])){

        // if there is no messages from that user
        if($obj->Count_Rows() == 0){
            echo "<h1 style='color:green;font-size:5rem;'>Lets start conversation to your friends!</h1>";
        }else{
        // fetch the messgaes by userLoggedIn and user_to

            while($row = $obj->Single_Result()){
              // $user_to = $row->user_to;
              $user_from = $row->user_from;
              $body = htmlentities($row->messages); 
              $msg_type = $row->msg_type;
              $date_time = $obj->time_ago($row->msg_time);

            
              if($user_from == $userLoggedIn){
                // right user messgaes
                // echo $body,"<br>";
                if($msg_type == "text"){

                    echo '<div class="right-messages common-margin">
                              <div class="right-msg-area">
                                <span class="date-time right-time">
                                  <span class="send-msg" >&#10004</span>'.$date_time.'
                                </span><!-- close date-time -->
                                <div class="right-msg">'.$body.'</div>
                              </div><!-- close right-msg-area -->
                            </div><!-- close right message -->';

                }elseif($msg_type == "jpg" || $msg_type == "jpeg" ){

                  echo '<div class="right-messages common-margin">
                              <div class="right-msg-area">
                                <span class="date-time right-time">
                                <span class="send-msg" >&#10004</span>         '.$date_time.'
                                </span><!-- close date-time -->
                                <a download="'.$body.'" href="assets/images/'.$body.'"class="all-files" title="Download it" ><i class="fa fa-arrow-circle-down fa-2x files-common"></i></a> 
                                <div class="right-files">
                                <img src="assets/images/'.$body.'" class="common-images">
                                </div>
                              </div><!-- close right-msg-area -->
                        </div><!-- close right message -->';

                }elseif($msg_type == "png"){

                  echo '<div class="right-messages common-margin">
                              <div class="right-msg-area">
                                <span class="date-time right-time">
                                <span class="send-msg" >&#10004</span>          '.$date_time.'
                                </span><!-- close date-time -->
                                <a download="'.$body.'" href="assets/images/'.$body.'"class="all-files" title="Download it" ><i class="fa fa-arrow-circle-down fa-2x files-common"></i></a> 
                                <div class="right-files">
                                <img src="assets/images/'.$body.'" class="common-images">
                                </div>
                              </div><!-- close right-msg-area -->
                        </div><!-- close right message -->';

                }elseif($msg_type == "zip"){

                  echo '<div class="right-messages common-margin">
                              <div class="right-msg-area">
                                <span class="date-time right-time">
                                <span class="send-msg" >&#10004</span>          '.$date_time.'
                                </span><!-- close date-time -->
                               <div class="right-files"style="background-color:#f1efef;">
                                    <a href="assets/images/'.$body.'" class="all-files"><i class="fa fa-arrow-circle-down fa-2x files-common"></i>'.substr($body,0,10).'.zip</a>                  
                                </div>
                              </div><!-- close right-msg-area -->
                        </div><!-- close right message -->';

                }elseif($msg_type == "txt"){

                  echo '<div class="right-messages common-margin">
                              <div class="right-msg-area">
                                <span class="date-time right-time">
                                <span class="send-msg" >&#10004</span>          '.$date_time.'
                                </span><!-- close date-time -->
                               <div class="right-files"style="background-color:#f1efef;">
                                    <a target="_blank" href="assets/images/'.$body.'" class="all-files"><i class="fa fa-file-text-o file fa-2x files-common"></i>'.substr($body,0,10).'.text</a> 
                                    <a download="'.$body.'" href="assets/images/'.$body.'"class="all-files" title="Download it" ><i class="fa fa-arrow-circle-down fa-2x files-common"></i></a>                 
                                </div>
                              </div><!-- close right-msg-area -->
                        </div><!-- close right message -->';
                  
                }elseif($msg_type == "pdf"){

                  echo '<div class="right-messages common-margin">
                              <div class="right-msg-area">
                                <span class="date-time right-time">
                                <span class="send-msg" >&#10004</span>          '.$date_time.'
                                </span><!-- close date-time -->
                               <div class="right-files"style="background-color:#f1efef;">
                                    <a target="_blank" href="assets/images/'.$body.'" class="all-files"><i class="fa fa-file-pdf-o pdf fa-2x files-common"></i>'.substr($body,0,10).'.pdf</a> 
                                    <a download="'.$body.'" href="assets/images/'.$body.'"class="all-files" title="Download it" ><i class="fa fa-arrow-circle-down fa-2x files-common"></i></a>                 
                                </div>
                              </div><!-- close right-msg-area -->
                        </div><!-- close right message -->';

                }elseif($msg_type == "emoji"){
                  echo '<div class="right-messages common-margin">
                              <div class="right-msg-area">
                                <span class="date-time right-time">
                                <span class="send-msg" >&#10004</span>          '.$date_time.'
                                </span><!-- close date-time -->
                                <div class="right-msg" style="background-color:#f1efef;">
                                <img class="animated-emoji" src="'.$body.'" />
                                </div>
                              </div><!-- close right-msg-area -->
                        </div><!-- close right message -->';
                }elseif($msg_type == "docx"){
                  
                  echo '<div class="right-messages common-margin">
                              <div class="right-msg-area">
                                <span class="date-time right-time">
                                <span class="send-msg" >&#10004</span>          '.$date_time.'
                                </span><!-- close date-time -->
                               <div class="right-files"style="background-color:#f1efef;">
                                    <a target="_blank" href="assets/images/'.$body.'" class="all-files"><i class="fa fa-file-word-o word fa-2x files-common"></i>'.substr($body,0,10).'.docx</a> 
                                    <a download="'.$body.'" href="assets/images/'.$body.'"class="all-files" title="Download it" ><i class="fa fa-arrow-circle-down fa-2x files-common"></i></a>                 
                                </div>
                              </div><!-- close right-msg-area -->
                        </div><!-- close right message -->';
                }elseif($msg_type == "xlsx"){
                  echo '<div class="right-messages common-margin">
                              <div class="right-msg-area">
                                <span class="date-time right-time">
                                <span class="send-msg" >&#10004</span>          '.$date_time.'
                                </span><!-- close date-time -->
                               <div class="right-files"style="background-color:#f1efef;">
                                    <a target="_blank" href="assets/images/'.$body.'" class="all-files"><i class="fa fa-file-excel-o word fa-2x files-common"></i>'.substr($body,0,10).'.xlsx</a> 
                                    <a download="'.$body.'" href="assets/images/'.$body.'"class="all-files" title="Download it" ><i class="fa fa-arrow-circle-down fa-2x files-common"></i></a>                 
                                </div>
                              </div><!-- close right-msg-area -->
                        </div><!-- close right message -->';
                }


              }
              else{
                // left user messages
                // echo $body,"<br>";

                if($msg_type == "text"){

                    echo '<div class="left-message common-margin">
                    <div class="sender-img-block">
                    <img src="assets/images/'.$image.'" class="sender-img">
                    <span class="'.$class.'">
            
                    </span>
                    </div><!-- close left message -->
                    <div class="left-msg-area">
                      <div class="user-name-date">
                        <span class="sender-name">
                            '.$name.'
                        </span><!-- close sender-name -->
                        <span class="date-time">
                            '.$date_time.'
                        </span><!-- close date-time -->
                      </div><!-- close user-name-date -->
                      <div class="left-msg">
                        <p>'.$body.'</p>
                      </div>
                    </div><!-- close left-msg-area -->
                  </div><!-- close left-message -->';

                }elseif($msg_type == "jpg" || $msg_type == "jpeg" ){

                  echo '<div class="left-message common-margin">
                    <div class="sender-img-block">
                    <img src="assets/images/'.$image.'" class="sender-img">
                    <span class="'.$class.'">
            
                    </span>
                    </div><!-- close left message -->
                    <div class="left-msg-area">
                      <div class="user-name-date">
                        <span class="sender-name">
                            '.$name.'
                        </span><!-- close sender-name -->
                        <span class="date-time">
                            '.$date_time.'
                        </span><!-- close date-time -->
                      </div><!-- close user-name-date -->
                      <div class="left-files">
                      <img src="assets/images/'.$body.'" class="common-images">
                      <a download="'.$body.'" href="assets/images/'.$body.'"class="all-files" title="Download it" ><i class="fa fa-arrow-circle-down fa-2x files-common"></i></a>
                      </div>
                    </div><!-- close left-msg-area -->
                  </div><!-- close left-message -->';

                }elseif($msg_type == "png"){

                  echo '<div class="left-message common-margin">
                    <div class="sender-img-block">
                    <img src="assets/images/'.$image.'" class="sender-img">
                    <span class="'.$class.'">
            
                    </span>
                    </div><!-- close left message -->
                    <div class="left-msg-area">
                      <div class="user-name-date">
                        <span class="sender-name">
                            '.$name.'
                        </span><!-- close sender-name -->
                        <span class="date-time">
                            '.$date_time.'
                        </span><!-- close date-time -->
                      </div><!-- close user-name-date -->
                      <div class="left-files"style="background-color:#f1efef;">
                      <img src="assets/images/'.$body.'" class="common-images">
                      <a download="'.$body.'" href="assets/images/'.$body.'"class="all-files" title="Download it" ><i class="fa fa-arrow-circle-down fa-2x files-common"></i></a>
                      </div>
                    </div><!-- close left-msg-area -->
                  </div><!-- close left-message -->';

                }elseif($msg_type == "zip"){

                  echo '<div class="left-message common-margin">
                    <div class="sender-img-block">
                    <img src="assets/images/'.$image.'" class="sender-img">
                    <span class="'.$class.'">
            
                    </span>
                    </div><!-- close left message -->
                    <div class="left-msg-area">
                      <div class="user-name-date">
                        <span class="sender-name">
                            '.$name.'
                        </span><!-- close sender-name -->
                        <span class="date-time">
                            '.$date_time.'
                        </span><!-- close date-time -->
                      </div><!-- close user-name-date -->
                      <div class="left-files"style="background-color:#f1efef;">
                      <a href="assets/images/'.$body.'" class="all-files"><i class="fa fa-arrow-circle-down fa-2x files-common"></i>'.substr($body,0,10).'.zip</a>   
                      </div>
                    </div><!-- close left-msg-area -->
                  </div><!-- close left-message -->';
                  
                }elseif($msg_type == "txt"){
                  echo '<div class="left-message common-margin">
                    <div class="sender-img-block">
                    <img src="assets/images/'.$image.'" class="sender-img">
                    <span class="'.$class.'">
            
                    </span>
                    </div><!-- close left message -->
                    <div class="left-msg-area">
                      <div class="user-name-date">
                        <span class="sender-name">
                            '.$name.'
                        </span><!-- close sender-name -->
                        <span class="date-time">
                            '.$date_time.'
                        </span><!-- close date-time -->
                      </div><!-- close user-name-date -->
                      <div class="left-files"style="background-color:#f1efef;">
                      <a target="_blank" href="assets/images/'.$body.'" class="all-files"><i class="fa fa-file-text-o file fa-2x files-common"></i>'.substr($body,0,10).'.text</a> 
                      <a download="'.$body.'" href="assets/images/'.$body.'"class="all-files" title="Download it" ><i class="fa fa-arrow-circle-down fa-2x files-common"></i></a>      
                      </div>
                    </div><!-- close left-msg-area -->
                  </div><!-- close left-message -->';
                }elseif($msg_type == "pdf"){

                  echo '<div class="left-message common-margin">
                    <div class="sender-img-block">
                    <img src="assets/images/'.$image.'" class="sender-img">
                    <span class="'.$class.'">
            
                    </span>
                    </div><!-- close left message -->
                    <div class="left-msg-area">
                      <div class="user-name-date">
                        <span class="sender-name">
                            '.$name.'
                        </span><!-- close sender-name -->
                        <span class="date-time">
                            '.$date_time.'
                        </span><!-- close date-time -->
                      </div><!-- close user-name-date -->
                      <div class="left-files"style="background-color:#f1efef;">
                      <a target="_blank" href="assets/images/'.$body.'" class="all-files"><i class="fa fa-file-pdf-o pdf fa-2x files-common"></i>'.substr($body,0,10).'.pdf</a> 
                      <a download="'.$body.'" href="assets/images/'.$body.'"class="all-files" title="Download it" ><i class="fa fa-arrow-circle-down fa-2x files-common"></i></a>      
                      </div>
                    </div><!-- close left-msg-area -->
                  </div><!-- close left-message -->';
                  
                }elseif($msg_type == "emoji"){

                  echo '<div class="left-message common-margin">
                    <div class="sender-img-block">
                    <img src="assets/images/'.$image.'" class="sender-img">
                    <span class="'.$class.'">
            
                    </span>
                    </div><!-- close left message -->
                    <div class="left-msg-area">
                      <div class="user-name-date">
                        <span class="sender-name">
                            '.$name.'
                        </span><!-- close sender-name -->
                        <span class="date-time">
                            '.$date_time.'
                        </span><!-- close date-time -->
                      </div><!-- close user-name-date -->
                      <div class="left-files"style="background-color:#f1efef;">
                      <img class="animated-emoji" src="'.$body.'" />
                      </div>
                    </div><!-- close left-msg-area -->
                  </div><!-- close left-message -->';

                }elseif($msg_type == "docx"){

                  echo '<div class="left-message common-margin">
                    <div class="sender-img-block">
                    <img src="assets/images/'.$image.'" class="sender-img">
                    <span class="'.$class.'">
            
                    </span>
                    </div><!-- close left message -->
                    <div class="left-msg-area">
                      <div class="user-name-date">
                        <span class="sender-name">
                            '.$name.'
                        </span><!-- close sender-name -->
                        <span class="date-time">
                            '.$date_time.'
                        </span><!-- close date-time -->
                      </div><!-- close user-name-date -->
                      <div class="left-files"style="background-color:#f1efef;">
                      <a target="_blank" href="assets/images/'.$body.'" class="all-files"><i class="fa fa-file-word-o word fa-2x files-common"></i>'.substr($body,0,10).'.docx</a> 
                      <a download="'.$body.'" href="assets/images/'.$body.'"class="all-files" title="Download it" ><i class="fa fa-arrow-circle-down fa-2x files-common"></i></a>
                      </div>
                    </div><!-- close left-msg-area -->
                  </div><!-- close left-message -->';
                  
                }elseif($msg_type == "xlsx"){
                  echo '<div class="left-message common-margin">
                    <div class="sender-img-block">
                    <img src="assets/images/'.$image.'" class="sender-img">
                    <span class="'.$class.'">
            
                    </span>
                    </div><!-- close left message -->
                    <div class="left-msg-area">
                      <div class="user-name-date">
                        <span class="sender-name">
                            '.$name.'
                        </span><!-- close sender-name -->
                        <span class="date-time">
                            '.$date_time.'
                        </span><!-- close date-time -->
                      </div><!-- close user-name-date -->
                      <div class="left-files"style="background-color:#f1efef;">
                      <a target="_blank" href="assets/images/'.$body.'" class="all-files"><i class="fa fa-file-excel-o word fa-2x files-common"></i>'.substr($body,0,10).'.xlsx</a> 
                      <a download="'.$body.'" href="assets/images/'.$body.'"class="all-files" title="Download it" ><i class="fa fa-arrow-circle-down fa-2x files-common"></i></a>
                      </div>
                    </div><!-- close left-msg-area -->
                  </div><!-- close left-message -->';
                }
              }
            }
          }
      }
    }
  
}

?>