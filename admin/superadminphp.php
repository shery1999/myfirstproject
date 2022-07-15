<?php
include 'connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["admin_status"];
    $email = $_POST["email"];
    echo $email;
    echo $title;
    $sqlu = "UPDATE `users` SET`super_admin`='$title' WHERE email='$email'";
    $result = mysqli_query($con, $sqlu);
    header('location:superadmin.php');

}
