<?php
session_start();
require "./includes/config.php";
$errors = array();

if (isset($_REQUEST['user-signup'])) {
    
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    if(isset($_FILES['pro-img'])){
        $file_name = $_FILES['pro-img']['name'];
        $file_type = $_FILES['pro-img']['type'];
        $file_tmp = $_FILES['pro-img']['tmp_name'];
        $file_explode = explode('.',$file_name);
        $file_ext = end($file_explode);
        $extensions = ["jpeg", "png", "jpg"];

        if(in_array($file_ext,$extensions) === true){
            move_uploaded_file($file_tmp,'./signup-data/userimg/'.$file_name);
        }
        else{
            $errors['pro-img'] = "Please upload an image file - jpeg, png, jpg";
            // echo 'problem';
        }
    }
    
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }

    $username_check = "SELECT * FROM userslogin WHERE username = '$username'";
    $res = mysqli_query($con, $username_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "User name is already exist!";
    }

    $email_check = "SELECT * FROM userslogin WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $status = "Login";
        $ran_id = rand(time(), 100000000);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $insert_data = "INSERT INTO `userslogin` (unique_id, username, password, img, status, email, create_datetime)
        VALUES ('$ran_id','$username', '$hash','$file_name','$status', '$email', current_timestamp())"; 
        $result = mysqli_query($con, $insert_data);
        // $_SESSION['username'];
        if($result){
            $sql1 = "SELECT * FROM userslogin WHERE email = '$email'";
            $res_sql1 = mysqli_query($con, $sql1);
            if(mysqli_num_rows($res_sql1) > 0){
                $row = mysqli_fetch_assoc($res_sql1);
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "success";
            }
        }
        // NEW USERS
        // $new_user = "INSERT INTO `newusers45721`  (username, email, create_datetime)
        // VALUES ('$username','$email', current_timestamp()) SELECT username,email,create_datetime FROM userslogin";  
        // $insert_data =  "INSERT INTO `newusers45721` (id,username, email, create_datetime)
        // SELECT  id,username,email,create_datetime FROM userslogin ";
        // $result = mysqli_query($con, $insert_data);
        if(count($errors) === 0){
            $errors['email'] = "Your account successfully Created";
            header("Location: User-Dashboard.php");
            // die();
        }
    }
}

//if user click login button
if(isset($_POST['user-login'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check = "SELECT * FROM userslogin WHERE email = '$email'";
    $res = mysqli_query($con, $check);
    if(mysqli_num_rows($res) > 0){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if(password_verify($password, $fetch_pass)){
            $check = "UPDATE userslogin SET status='Login' WHERE unique_id = {$fetch['unique_id']}";
            $res = mysqli_query($con, $check);
            if($res){
                $_SESSION['unique_id'] = $fetch['unique_id'];
                // die();
                header("Location: User-Dashboard.php");
                echo "success";
            // die();
            }
        }else{
            $errors['email'] = "Incorrect email or password!";
        }
    }else{
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
}
?>