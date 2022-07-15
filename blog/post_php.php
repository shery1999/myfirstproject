<?php
include_once 'db_fetch.php';
isset($_GET['slug']); {
    $slug = $_GET['slug'];
    $sql = "SELECT  * from blog 
    JOIN users   on blog.user_id=users.sno 
    JOIN category   on blog.cat_id=category.id 
    where slug = '$slug'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>