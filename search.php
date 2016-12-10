<!DOCTYPE html>
<?php include 'includes/connection.php'; ?>
<html lang="en">
<?php include 'includes/header.php'; ?>
<body>
    <!-- Navigation -->
    <?php include 'includes/navbar.php'; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
            <?php
            if(isset($_POST['submit'])){
            $post_tag = $_POST['post_tag'];  
            $query = "SELECT * FROM posts WHERE post_tag LIKE '%$post_tag%'";
            $query_result = mysqli_query($connection,$query);
            $count_row = mysqli_num_rows($query_result);
            if ($count_row==0) {
              echo "No result";
            }
            else
            {
            while ($row = mysqli_fetch_assoc($query_result)) {
              $post_title = $row['post_title'];
              $post_author = $row['post_author'];
              $post_date = $row['post_date'];
              $post_image = $row['post_image'];
              $post_content = $row['post_content'];
              ?>
              <!-- Blog Post -->

              <!-- Title -->
              <h1><?php echo "$post_title"; ?></h1>

              <!-- Author -->
              <p class="lead">
                  by <a href="#"><?php echo "$post_author"; ?></a>
              </p>

              <hr>

              <!-- Date/Time -->
              <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo "$post_date"; ?></p>

              <hr>

              <!-- Preview Image -->
              <img class="img-responsive" src="http://placehold.it/900x300" alt="">

              <hr>

              <!-- Post Content -->
              <p>
                <?php echo "$post_content"; ?>
              </p>
              <hr>
<?php }} ?>
<?php
}
else {
  echo "<h1>No Query</h1>";
} ?>



            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
              <?php include 'includes/sidebar-search.php'; ?>

                <!-- Blog Categories Well -->
                <?php include 'includes/side-nav.php'; ?>
                <!-- Side Widget Well -->


            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
