<?php include_once 'connection.php';
function getallBlogs()
{
    global $con;
    
    $query = "SELECT  * from blog 
    JOIN users   on blog.user_id=users.sno 
    JOIN category   on blog.cat_id=category.id  
    WHERE `cat_id` = '3'";

    $res = mysqli_query($con, $query);
    $row = array();
    while ($obj = mysqli_fetch_assoc($res)) {
        array_push($row, $obj);
    }

    return $row;
}
