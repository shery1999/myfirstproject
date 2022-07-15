<?php
session_start();
include_once 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $category = $_POST["category"];
    $image = $_POST["image"];
    $sql = "INSERT INTO `category` (`cname`, `image`, `category`, `created`) VALUES ('$title', '$image', '$category', current_timestamp())";
    echo $sql;
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "ss entry";
        header('location:add_cat.php');
    } else {
        echo "no entry";
    }
}
