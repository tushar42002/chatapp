<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        // let's check user email is valid or not
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){//if email is valid
            // let's check that email already exist in the data base or not
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0) {// if email already exist
                echo"$email- this email alredy exist!";
            }else {
                // lets check user upload file or not
                if (isset($_FILES['image'])) {//if file is uploaded
                    $img_name = $_FILES['image']['name'];//getting user uploaded img name
                    $tmp_name = $_FILES['image']['tmp_name'];//this is temporary name is used to save/move file in our folder

                    //let's explode image and get the last extension like jpg jpeg png
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);//here er get the extensuon of an users uploaded img file

                    $extensions = ['png', 'jpg', 'jpeg'];//these are some valid extenstion and we store them in array
                    if (in_array($img_ext, $extensions) === true) { // if user uploaded img ext is matched with any array extensions
                        $time = time(); // this will return us current time..
                                        //we need this time becouse when you uploding user img in our folder we rename user file with current timer
                                        //so all the image file have unique name
                        // let's move the user uploded img to our particular folder
                        $new_img_name = $time.$img_name;

                        if (move_uploaded_file($tmp_name, "images/".$new_img_name)) {
                            $status = "Active now";  // once user signed up then his status will be active now
                            $random_id = rand(time(),10000000); //creating random id for user

                            //let's insert all users data inside a table
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                 VALUE('{$random_id}', '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}');");
                            if ($sql2) {// if these data inserted
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if (mysqli_num_rows($sql3) > 0) {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; // using this session we use users unique_id in other php file
                                    echo"success";
                                }
                            }else {
                                echo"something went wrong";
                            }
                        }
                    }else {
                        echo"Please select image formate in jpeg , jpg, png";
                    }
                }else {
                    echo"Please select an image file!";
                }
            }
        }else {
            echo"$email- this is nat a valid email";
        }
    }else{
        echo'All inout field is required!';
    }
?>