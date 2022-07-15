<?php
session_start();
include_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $category = $_POST["category"];
    $image = $_POST["image"];
    $sql = "INSERT INTO `category` (`name`, `image`, `category`, `created`) VALUES ('$title', '$image', '$category', current_timestamp())";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "ss entry";
    } else {
        echo "no entry";
    }
}
