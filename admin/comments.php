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
                            Comments
                        </h1>


                    <!-- Carrying out deletion -->
                    <?php
                  deleteComment();
                     ?>
                     <!-- Deletion Finished -->

                    <?php

                    if(isset($_GET['status'])) {
                      $comment_id = $_GET['comment_id'];
                      $comment_status = $_GET['status'];
                      if($comment_status == 'approved' || $comment_status == 'unapproved' ) {
                        $query = "UPDATE comments SET comment_status='$comment_status' WHERE comment_id=$comment_id";
                        $query_result = mysqli_query($connection,$query);
                        if(!$query_result){
                          echo DIE(mysqli_error($connection));
                        }
                      }


                    }
                    ?>
                    <?php include 'includes/view_all_comments.php'; ?>
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
