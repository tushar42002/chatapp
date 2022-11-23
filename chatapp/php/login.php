<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($email) && !empty($password)) {
        // let's check users email and password to database
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            
            $sql = mysqli_query($conn, "UPDATE users SET status = 'Active now' WHERE `users`.`unique_id` = {$row['unique_id']}");
            $_SESSION['unique_id'] = $row['unique_id']; // using this session we use users unique_id in other php file

            echo"success";
        }else {
            echo"email or password is incorrect!";
            
        }
    }else {
        echo"all input field is required!";
    }



?>