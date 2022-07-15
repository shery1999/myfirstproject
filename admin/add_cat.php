<?php
include_once 'fetch_cat.php';
$cat = getallCat();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add category</title>
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

        main {
            display: flex;
            flex-direction: column;

        }
    </style>

</head>

<body class="sb-nav-fixed">

    <?php include 'navbar.php' ?>
    <div id="layoutSidenav_content">
        <main>
            <div>
                <form class="col" action='add_cat_php.php' method='post'>

                    <p><label>Title</label><br />
                        <input type='text' name='title' value=''>
                    </p>

                    <p><label>Category</label><br />
                        <textarea name='category' cols='40' rows='2'></textarea>
                    </p>

                    <p><label>Image</label><br />
                        <textarea name='image' cols='40' rows='2'></textarea>
                    </p>

                    <p><input type='submit' name='submit' value='submit'></p>
                </form>
            </div>
            <div id = "col12" class="col">
                <h2>Categories</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Categories</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($cat as $single_cat) {
                    ?>
                        <tr>
                            <td>
                                <?php
                                echo ($single_cat['category']);
                                ?>
                            </td>
                            <td>
                                <a href="delcat.php?slug=<?php
                                                            echo $single_cat['id'];
                                                            ?>">
                                    <button>Delete Category</button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="col">
                <?php include 'footer.php' ?>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>