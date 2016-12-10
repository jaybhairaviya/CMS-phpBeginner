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
                            Categories
                        </h1>

                    </div>

                    <div class="col-xs-6">
                      <!--Carrying out Insertion-->
                      <?php
                      insertCategory();
                       ?>
                       <!--Finished Insertion -->
                      <form class="" action="category.php" method="post">
                        <label for="category_name">Add Category</label>
                        <div class="form-group">
                          <input type="text" name="category_name" class="form-control">
                        </div>
                        <div class="form-group">
                          <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                        </div>
                      </form>

                      <!-- Update Form -->
                    <?php
                    updateCategory();
                     ?>

                    </div>

                    <div class="col-xs-6">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                          </tr>
                        </thead>

                        <!-- Carrying out deletion -->
                        <?php
                        if (isset($_GET['delete'])) {
                          $category_id = $_GET['delete'];

                          $query = "DELETE FROM category WHERE category_id=$category_id";
                          $query_result = mysqli_query($connection,$query);
                          if(!$query_result){
                            echo "asdasd" . DIE(mysqli_error($connection));
                          }
                        }
                         ?>
                         <!-- Deletion Finished -->


                        <tbody>
                          <?php
                          $query = 'SELECT * FROM category';
                          $query_result = mysqli_query($connection,$query);
                          while ($row=mysqli_fetch_assoc($query_result)) {
                            $category_name = $row['category_name'];
                            $category_id = $row["category_id"];
                            ?>
                            <tr>
                              <td><?php echo $category_id?></td>
                              <td><?php echo "$category_name"; ?></td>
                              <td><a href="category.php?delete=<?php echo $category_id?>">Delete</a></td>
                              <td><a href="category.php?edit=<?php echo $category_id?>">Edit</a></td>
                            </tr>


                          <?php } ?>


                        </tbody>

                      </table>
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
