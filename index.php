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
              <?php include 'includes/view_all_posts.php'; ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
              <?php include 'includes/sidebar-search.php'; ?>
              <?php include 'includes/sidebar-login.php'; ?>
                <!-- Blog Categories Well -->
                <?php include 'includes/side-nav.php'; ?>
                <!-- Side Widget Well -->


            </div>


        </div>
        <!-- /.row -->


        <hr>
        <div class="col-lg-12">
          <!-- styling for active page -->
          <style media="screen">
            .active {
              background: #000 !important;
            }
          </style>

          <!-- Pagination -->
          <div class="pager">
            <ul>
              <?php
              for($i=1;$i<=$total_pages;$i++){
              if($i == $page){
                echo "<li><a class='active' href='index.php?page={$i}'>{$i}</a></li>";
              }
              else{
                echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
              }
              }
               ?>
            </ul>
          </div>
        </div>
        <br>
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
