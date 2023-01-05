<?php
session_start();
require "../includes/config.php";
$errors = array();

if (isset($_REQUEST['admin-signup'])) {
    
    $admin_name = mysqli_real_escape_string($con, $_POST['adminname']);
    $admin_email = mysqli_real_escape_string($con, $_POST['adminemail']);
    $admin_password = mysqli_real_escape_string($con, $_POST['adminpass']);
    $admin_cpassword = mysqli_real_escape_string($con, $_POST['admincpass']);

    if(isset($_FILES['admin-img'])){
        $file_name = $_FILES['admin-img']['name'];
        $file_type = $_FILES['admin-img']['type'];
        $file_tmp = $_FILES['admin-img']['tmp_name'];
        $file_explode = explode('.',$file_name);
        $file_ext = end($file_explode);
        $extensions = ["jpeg", "png", "jpg"];

        if(in_array($file_ext,$extensions) === true){
            move_uploaded_file($file_tmp,'../signup-data/adminimg/'.$file_name);
        }
        else{
            $errors['admin-img'] = "Please upload an image file - jpeg, png, jpg";
            // echo 'problem';
        }
    }
    
    if($admin_password !== $admin_cpassword){
        $errors['adminpass'] = "Confirm password not matched!";
    }

    $admin_name_check = "SELECT * FROM adminlogin WHERE username = '$admin_name'";
    $res = mysqli_query($con, $admin_name_check);
    if(mysqli_num_rows($res) > 0){
        $errors['adminename'] = "User name is already exist!";
    }

    $email_check = "SELECT * FROM adminlogin WHERE email = '$admin_email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['adminemail'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $status = "Login";
        $ran_id = rand(time(), 100000000);
        $hash = password_hash($admin_password, PASSWORD_DEFAULT);
        $insert_data = "INSERT INTO `adminlogin` (unique_id, username, password,img, status, email, create_datetime)
        VALUES ('$ran_id','$admin_name', '$hash','$file_name','$status', '$admin_email', current_timestamp())";  
        $res = mysqli_query($con, $insert_data);
        if($res){
            $sql1 = "SELECT * FROM adminlogin WHERE email = '$email'";
            $res_sql1 = mysqli_query($con, $sql1);
            if(mysqli_num_rows($res_sql1) > 0){
                $row = mysqli_fetch_assoc($res_sql1);
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "success";
            }
        }
        if(count($errors) === 0){
            $errors['adminemail'] = "Your account successfully activated";
            header("Location: Admin-Dashboard.php");
            die();
        }
    }
}

// if user click login button
if(isset($_POST['admin-login'])){
    $admin_email = mysqli_real_escape_string($con, $_POST['adminemail']);
    $admin_password = mysqli_real_escape_string($con, $_POST['adminpass']);
    $check = "SELECT * FROM adminlogin WHERE email = '$admin_email'";
    $res = mysqli_query($con, $check);
    if(mysqli_num_rows($res) > 0){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if(password_verify($admin_password, $fetch_pass)){
            $check = "UPDATE adminlogin SET status='Login' WHERE unique_id = {$fetch['unique_id']}";
            $res = mysqli_query($con, $check);
            if($res){
                $_SESSION['unique_id'] = $fetch['unique_id'];
                header("Location: Admin-Dashboard.php");
                echo "success";
            }
        }else{
            $errors['email'] = "Incorrect email or password!";
        }
    }else{
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
}
?>


