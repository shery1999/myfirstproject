<!DOCTYPE html>
<html lang="en">
<?php
include_once 'fetch_cat.php';
$cat = getallCat();
?>


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add Blog</title>
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        form {
            padding: 50px;
        }

        label {
            font-size: larger;
            font-weight: 700;
        }

        input {
            width: -webkit-fill-available;
        }

        #submit {
            width: auto;
        }
    </style>

</head>


<body class="sb-nav-fixed">

    <?php
    include 'navbar.php' ?>
    <div id="layoutSidenav_content">
        <main>

            <!-- <form action='add_blog_php.php' method='post'   -->
            <form action="add_blog_php.php" method="post" enctype="multipart/form-data">
                <p><label>Title</label><br />
                    <input type='text' name='title' lengtn=30px value=''>
                </p>
                <p><label>Content</label><br />
                    <textarea name="editor1"></textarea>
                    <script>
                        CKEDITOR.replace('editor1');
                    </script>
                </p>
                <p><label>Image</label><br />
                    <td><input type="file" name="my_image"></td>
                </p>
                <label for="cars">Select Category:</label>

                <select name="cat" id="cars" class="">
                    <?php
                    foreach ($cat as $single_cat) {
                    ?>
                        <option value="<?php
                                        echo  htmlentities($single_cat['id']);
                                        ?>"><?php
                                            echo  htmlentities($single_cat['category']);
                                        } ?></option>
                </select>
                <br><br>
                <p><input id="submit" type='submit' name='submit' value='submit'></p>
            </form>
    </div>
    </main>
    <?php
    include 'footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>


</html>