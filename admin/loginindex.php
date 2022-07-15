<?php
session_start();
require_once('connection.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['email'])) {
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $sql = " SELECT * FROM `users` WHERE email = '$email'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            $hash1 = $row["password"];
            $verify = password_verify($pass, $hash1);
            $numrows = mysqli_num_rows($result);
            if ($numrows > 0 && $verify == 1) {
                $_SESSION['email'] = $email;
                $_SESSION['user_id'] = $row["sno"];
                $_SESSION['nameofuser'] = $row["uname"];
                $_SESSION['super_admin'] = $row["super_admin"];
                header('location:index.php');
            }
        } else {
            $_SESSION['un_error1'] = "Unauthorized access";
            header('location:login.php');
        }
    } else {
        $_SESSION['un_error1'] = "Unauthorized access";
        header('location:login.php');
    }
}
