<?php
session_start();
require_once('connection.php');
// echo isset($_POST['submit']);
// echo "123";

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
                header('location:index.php');

            }
            } else {
                $_SESSION['un_error1'] = "Unauthorized access";
                header('location:loginin.php');
            }
    }
    else {
        $_SESSION['un_error1'] = "Unauthorized access";
        header('location:loginin.php');
    }

    // // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submit'])) {
}
