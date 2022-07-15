<?php
require_once('connection.php');
$sqlu = " SELECT * FROM `users`";
$result = mysqli_query($con, $sqlu);
$ucount = mysqli_num_rows($result);
$sqlb = " SELECT * FROM `blog`";
$bresult = mysqli_query($con, $sqlb);
$bcount = mysqli_num_rows($bresult);
$sqlc = " SELECT * FROM `category`";
$result = mysqli_query($con, $sqlc);
$ccount = mysqli_num_rows($result);
?>