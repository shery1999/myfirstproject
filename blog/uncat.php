<?php
include_once 'uncat_db_fetch.php';
$blogs = getallBlogs();
?>
 <!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<!-- Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <?php
    include 'navbar.php';
    include 'header.php';
    ?>
    <?php
    foreach ($blogs as $single_blog) {
        ?>
        <div class="post-preview">
            <a href="post.php?slug=<?php
                                    echo $single_blog['slug'];
                                    ?>">
                <h2 class="post-title"><?php
                                        echo $single_blog['title'];
                                        // echo "roww = ".$row;
                                        ?></h2>
                <h3 class="post-subtitle"><?php
                                            echo substr($single_blog['description'], 0, 100) . "......";
                                            ?></h3>
            </a>
            <p class="post-meta">
                Posted by
                <a href=""><?php
                            echo $single_blog['uname'];
                            ?></a> On
                <?php
                echo substr($single_blog['dt'], 0, 10);
                ?> <br> Catergory
                <a href="cat.php?cat=<?php
                                        echo $single_blog['category'];
                                        ?>"> <?php
                                                echo $single_blog['category'];
                                                ?> </a>
            </p>
        </div>
    <?php
    }
    ?>

    <!-- Divider-->
    <hr class=" my-4" />
    <h1></h1>
    <!-- Divider-->
    <hr class="my-4" />
    <!-- Pager-->
    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>

    <?php
    include('footer.php')
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script> -->
</body>

</html>