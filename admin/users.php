<!DOCTYPE html>
<html lang="en">
<?php include 'includes/connection.php'; ?>
<?php include 'functions.php'; ?>
<?php include 'includes/header.php'; ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/navigation.php'; ?>
        <?php include 'includes/sidebar.php'; ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users
                        </h1>


                    <!-- Carrying out deletion -->
                    <?php
                  deleteUser();
                     ?>
                     <!-- Deletion Finished -->

                    <!-- Add Post functiom  -->
                    <?php addUser();  ?>
                    <?php

                    if(isset($_GET['status'])) {
                      $post_id = $_GET['post_id'];
                      $post_status = $_GET['status'];
                      if($post_status == 'published' || $post_status == 'draft' ) {
                        $query = "UPDATE posts SET post_status='$post_status' WHERE post_id=$post_id";
                        $query_result = mysqli_query($connection,$query);
                        if(!$query_result){
                          echo DIE(mysqli_error($connection));
                        }
                      }


                    }
                    ?>


                      <?php
                      if(isset($_GET['source'])){
                        $source = $_GET['source'];
                      }
                      else {
                        $source = '';
                      }
                      switch($source){
                        case 'view_all_users': include 'includes/view_all_users.php';
                                                break;
                        case 'add_user' : include 'includes/add_user.php';
                        break;
                        case 'edit_user' : include 'includes/edit_user.php';
                        break;
                        default:include 'includes/view_all_users.php';
                      }
                       ?>
                    </div>
                </div>
                <!-- /.row -->



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include 'includes/footer.php'; ?>

</body>

</html>