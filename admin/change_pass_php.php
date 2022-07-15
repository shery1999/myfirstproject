<?php
session_start();
require_once('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pass = $_POST["pass"];
    $npass = $_POST["npass"];
    $cpass = $_POST["cpass"];
    $email = $_SESSION['email'];
    $sqls = "SELECT * FROM `users` WHERE email = '$email'";
    $cresult = mysqli_query($con, $sqls);
    $row = mysqli_fetch_assoc($cresult);
    echo $row['password'];
    $hash = password_hash($npass, PASSWORD_DEFAULT);
    $verify = password_verify($pass, $row['password']);
    echo "<br>" . "varify = " . $verify;

    if (empty($_POST['pass'])) {
        $username_error = "Please Enter Password";
        $_SESSION['pass_error'] = $username_error;
        header('location:change_pass.php');
    } else {
        unset($_SESSION['pass_error']);
    }

    if (empty($_POST['npass'])) {
        $email_error = "Please Enter New Passord";
        $_SESSION['npass_error'] = $email_error;
        header('location:change_pass.php');
    } else {
        unset($_SESSION['npass_error']);
    }

    if (!empty($_POST['cpass']) and ($pass !== $cpass)) {
        $cpass_error = "Please Enter the Same Password";
        $_SESSION['cpass_error'] = $cpass_error;
        header('location:change_pass.php');
        $exists = true;
    } else {
        unset($_SESSION['cpass_error']);
    }
    if (($npass == $cpass) && ($verify == 1)) {
        $sqlu = "UPDATE `users` SET `password`='$hash' WHERE `email` = '$email'";
        $uresult = mysqli_query($con, $sqlu);
        if ($uresult) {
            echo "password changed";
            header('location:index.php');
        }
    } else {
        $cpass_error = "Password not changed";
        $_SESSION['cpass_error'] = $cpass_error;
        header('location:change_pass.php');
    }
}
