<?php
include_once 'connection.php';
function getallUsers()
{
    global $con;
    $query =  "SELECT * FROM users where email = $slug";
    $res = mysqli_query($con, $query);
    $row = array();
    while ($obj = mysqli_fetch_assoc($res)) {
        array_push($row, $obj);
    }
    $i = 1;
    return $row;
}
