<?php
        $output = "";
          
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
        }
?>