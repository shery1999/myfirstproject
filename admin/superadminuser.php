<?php
include_once 'connection.php';
isset($_GET['slug']); {
    $slug = $_GET['slug'];
    echo $slug;
    $sqli =  "SELECT * FROM users WHERE email = '$slug'";
    $result = mysqli_query($con, $sqli);
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">

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

            <form action='superadminphp.php' method='post'>
                <div class="container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>User name</th>
                                <th>Email</th>
                                <th>Admin Status</th>
                                <th>change admin status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h5 class="post-title"><?php
                                                            echo $row['uname'];
                                                            ?></h5>

                                <td name="email"><?php
                                                    echo ($row['email']);
                                                    ?></td>

                                <td><?php if (($row['super_admin']) == 1) {
                                        echo "Super Admin";
                                    } else {
                                        echo "Admin";
                                    }
                                    ?></td>
                                <input style="display: none;" type="text" name="email" value="<?php echo $slug; ?>">
                                <td><select name="admin_status" id="">
                                        <option value="0"><?php
                                                            echo " Admin";
                                                            ?></option>
                                        <option value="1"><?php
                                                            echo "Super Admin ";
                                                            ?></option>
                                    </select></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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