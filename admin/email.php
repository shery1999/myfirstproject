<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td><input type="file" name="my_image"></td>
        </tr>
        <tr>
            <td> <input type="submit" value="upload" name="submit"></td>
        </tr>
    </table>
</form>
<?php
// echo $_FILES['my_image'];
// print_r($_FILES['image']);

// $file_name = $_FILES['image']['name'];
// $file_size = $_FILES['image']['size'];
// $file_tmp = $_FILES['image']['tmp_name'];
// $file_type = $_FILES['image']['type'];

// move_uploaded_file($file_tmp,"uploads/".$file_name);


// $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
// $img_upload_path = 'uploads/'.$new_img_name;
// move_uploaded_file($tmp_name, $img_upload_path);

// // Insert into Database
// $sql = "INSERT INTO images(image_url) 
//         VALUES('$new_img_name')";
// mysqli_query($conn, $sql);


?>



<?php

// if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
include "connection.php";

echo "<pre>";
print_r($_FILES['my_image']);
echo "</pre>";

$img_name = $_FILES['my_image']['name'];
$img_size = $_FILES['my_image']['size'];
$tmp_name = $_FILES['my_image']['tmp_name'];
$error = $_FILES['my_image']['error'];

if ($error === 0) {
    if ($img_size > 125000) {
        $em = "Sorry, your file is too large.";
        // header("Location: index.php?error=$em");
    } else {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png");

        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = 'uploads/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            // Insert into Database
            // $sql = "INSERT INTO images(image_url)  VALUES('$new_img_name')";
            $sql = "INSERT INTO `blog`(`featured_img`) VALUES ('$new_img_name') WHERE  `sno` = '10' ";
            $sqli ="UPDATE `blog` SET `featured_img`='$new_img_name' WHERE sno = '10'";
            mysqli_query($con, $sqli);
            // header("Location: view.php");
        } else {
            $em = "You can't upload files of this type";
            // header("Location: index.php?error=$em");
        }
    }
} else {
    $em = "unknown error occurred!";
    // header("Location: index.php?error=$em");
}

// }else {
	// header("Location: index.php");
// }