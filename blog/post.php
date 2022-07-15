<?php
include_once 'post_php.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        img {
            height: 100px;
            width: 100px;
        }
    </style>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <!-- Page Header-->
    <!-- <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')"> -->
    <header class="masthead" style="background-image: url('/blog/admin/uploads/<?php
                                                                                echo $row['featured_img'];
                                                                                ?>')">
        <!-- <img src="https://source.unsplash.com/1600x900/?nature,water"    /admin/uploads/IMG-62c56b5a68f071.91021955.jpg       alt= "Error loading image" width = "233" height="34"> -->
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <?php $i = 4; ?>
                        <!-- echo htmlentities($str); -->
                        <h1><?php
                            echo $row['title'];
                            ?></h1>

                        <!-- <h1>
                            <?php
                            // echo   $row['title'];
                            ?>
                        </h1> -->
                        <h2 class="subheading"></h2>
                        <span class="meta">
                            Posted by
                            <a href="#!"><?php
                                            echo $row["uname"];
                                            ?></a></a>
                            <?php echo substr($row['dt'], 0, 10); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p><?php
                        echo $row['description'];
                        ?></p>
                    <p>
                        Article by
                        <a href=""><?php
                                    echo $row["uname"];
                                    ?></a>
                        category
                        <a href="cat.php?cat=<?php echo $row['category'] ?>"><?php echo $row['category'] ?> </a>
                    </p>
                </div>
            </div>
        </div>
    </article>
    <!-- Footer-->
    <?php
    include 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>