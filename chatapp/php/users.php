<?php
     session_start();
     include "config.php";
     $outgoing_id = $_SESSION['unique_id'];
     $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}");
     $output = "";


     if (mysqli_num_rows($sql) == 1) {
        $output .= " <p>NO user are avalable  to chat</p>";
     }elseif (mysqli_num_rows($sql) > 0) {
      //      include "data.php";





            while ($row = mysqli_fetch_assoc($sql)) {
                  $sql9 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                            OR outgoing_msg_id = {$row['unique_id']}) AND (incoming_msg_id = {$outgoing_id}
                            OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
                  $query9 = mysqli_query($conn, $sql9);
                  $row9 = mysqli_fetch_assoc($query9);          
                  if(mysqli_num_rows($query9) > 0){
                      $result = $row9['msg'];
                  }else {
                      $result = "No message available";
                  }
      
                  (strlen ($result) > 28) ? $msg = substr($result, 0, 28).'...' : $msg =$result;
                //   adding you: text before message if login id send msg
                      if ($outgoing_id == isset($row9['outgoing_msg_id'])) {
                          $you = "You: ";
                      }else {
                          $you = "";
                      }
                //  ($outgoing_id == isset($row9['outgoing_msg_id'])) ? $you = "You: " : $you = ""; 
                  // check if user is online or offline
                  ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
      
                  $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                                 <div class="content">
                                      <img src="php/images/'.$row['img'].'" alt="">
                                      <div class="details">
                                         <span>'.$row['fname']." ".$row['lname'].'</span>
                                         <p>'. $you . $msg .'</p>
                                     </div>
                                 </div>
                                 <div class="status-dot'.$offline.'"><i class="fas fa-circle"></i></div>
                             </a>';
            }
     }

     echo $output;
     
?>