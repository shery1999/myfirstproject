<?php
session_start();
include_once 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $editor = $_POST["editor1"];
    $user_id = $_SESSION['user_id'];
    $cat = $_POST['cat'];
    $text = $title;
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    $text = trim($text, '-');
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = strtolower($text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $allowed_exs = array("jpg", "jpeg", "png");

    if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $img_upload_path = 'uploads/' . $new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
    }
    if (empty($text)) {
        $text = 'n-a';
    }
    $sql = "INSERT INTO `blog` (`title`, `slug`, `description`, `featured_img`, `user_id`, `cat_id`,`dt`) VALUES ('$title', '$text','$editor', '$new_img_name', '$user_id', '$cat', current_timestamp())";
    echo $sql;
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "success entry";
        header('location:index.php');
        $_SESSION['success'] = "Blog successfully enterd";
    } else {
        echo "no entry";
        header('location:add_blog.php');
        $_SESSION['success'] = "Blog could not be enterd";
    }
}
