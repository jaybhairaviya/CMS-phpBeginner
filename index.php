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
