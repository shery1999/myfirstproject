<?php include_once 'connection.php';
function getallBlogs_cat()
{
    global $con;
    // $query =  "SELECT * FROM blog";
    // $query = "SELECT  * from users JOIN blog  where blog.user_id=users.sno";
    $cat = $_GET['cat'];
    $query = "SELECT  * from 
    blog JOIN users   on blog.user_id=users.sno 
     JOIN category   on blog.cat_id=category.id where category = '$cat'";
    $res = mysqli_query($con, $query);
    $row = array();
    while ($obj = mysqli_fetch_assoc($res)) {
        array_push($row, $obj);
    }
    return $row;
}
