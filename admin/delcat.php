<?php
include_once 'connection.php';
isset($_GET['slug']); {
    $slug = $_GET['slug'];
    echo $slug;
    $sql = "DELETE FROM `category` WHERE `id` = '$slug'";
    echo $sql;
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "success ";
        header('location:add_cat.php');
    } else {
        echo "task failed";
    }
}
