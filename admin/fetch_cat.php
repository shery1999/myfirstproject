<?php
include_once 'connection.php';
function getallCat()
{
    global $con;
    $query =  "SELECT * FROM category";
    $res = mysqli_query($con, $query);
    $row = array();
    while ($obj = mysqli_fetch_assoc($res)) {
        array_push($row, $obj);
    }

    return $row;
}
