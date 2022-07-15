 <!DOCTYPE html>
 <html lang="en">
 <?php
    include_once 'fetch_users.php';
    $users = getallUsers();
    session_start();
    if ($_SESSION['super_admin'] == 0) {
        header('location:index.php');
    }
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

             <form action='add_blog_php.php' method='post'>


                 <div class="container">
                     <h2>Admin Status</h2>
                     <table class="table table-hover">
                         <thead>
                             <tr>
                                 <th>User Name</th>
                                 <th>Email</th>
                                 <th>Admin Status</th>
                             </tr>
                         </thead>
                         <?php
                            foreach ($users as $single_users) {
                            ?>
                             <tbody>
                                 <tr>
                                     <td> <a href="superadminuser.php?slug=<?php
                                                                            echo $single_users['email'];
                                                                            ?>">
                                             <h5 class="post-title"><?php
                                                                    echo $single_users['uname'] . "<br>";
                                                                    ?></h5>
                                     <td><?php
                                            echo ($single_users['email']);
                                            ?></td>
                                     <td><?php if (($single_users['super_admin']) == 1) {
                                                echo "Super Admin";
                                            } else {
                                                echo "Admin";
                                            }
                                            ?></td>
                                     </td>
                                 </tr>

                             <?php
                            }
                                ?>
                             </tbody>
                     </table>
                 </div>
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