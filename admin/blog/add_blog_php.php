<?php
session_start();
include_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $content = $_POST["content"];
    echo $content;
    $image = $_POST["image"];
    $text = $title;
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    // trim
    $text = trim($text, '-');
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // lowercase
    $text = strtolower($text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    if (empty($text)) {
        $text = 'n-a';
    }
    $sql = "INSERT INTO `blog` (`title`, `slug`, `description`, `featured_img`, `user_id`, `cat_id`,`dt`) VALUES ('$title', '$text','$content', '$image', '8', '1', current_timestamp())";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "success entry";
    } else {
        echo "no entry";
    }
}
