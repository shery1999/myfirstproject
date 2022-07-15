<?php
session_start();
require_once('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $verify = password_verify($pass, $hash);
    $cpass = $_POST["cpass"];
    $exists=false;

    if (empty($_POST['name'])) {
        $username_error = "Please Enter Name";
        $_SESSION['name_error'] = $username_error;
    } else {
        unset($_SESSION['name_error']);
    }

    if (empty($_POST['email'])) {
        $email_error = "Please Enter Email";
        $_SESSION['email_error'] = $email_error;
    } else {
        unset($_SESSION['email_error']);
    }

    if (empty($_POST['pass'])) {
        $pass_error = "Please Enter Password";
        $_SESSION['pass_error'] = $pass_error;
    } else {
        unset($_SESSION['pass_error']);
    }

    if (!empty($_POST['cpass']) and ($pass !== $cpass)) {
        $cpass_error = "Please Enter the Same Password";
        $_SESSION['cpass_error'] = $cpass_error;
        $exists=true;
    } else {
        unset($_SESSION['cpass_error']);
    }
    if (($pass == $cpass) && ($exists == false)) {
        // $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ( '$usename', '$hash', current_timestamp())";
        $sql="INSERT INTO `users` (`sno`, `name`, `email`, `password`, `created`, `updated_at`) VALUES (NULL, '$name', '$email', '$hash', current_timestamp(), current_timestamp());";
        // $_SESSION['username'] = $usename;
        // $_SESSION['pass'] = $hash;
        $ssql = "SELECT * FROM users WHERE email = '$email'";
        $cresult = mysqli_query($con, $ssql);
        $numrows = mysqli_num_rows($cresult);
        if ($numrows > 0) {
            $usernameexist = true;
            $_SESSION['eamilexist'] = "Eamil Exits Please Enter Another Eamil Adress ";
            header('location:register.php');

        } else {
            $result = mysqli_query($con, $sql);
            if ($result) {
                $showalert = true;
            }
            mysqli_close($con);
            header('location:index.php');
            session_unset();
            session_destroy();
        }
    }
    else{
                header('location:register.php');

    }
}

