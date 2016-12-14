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
              if(isset($_GET['post_id'])){
                $post_id = $_GET['post_id'];
                $query = "SELECT * FROM posts WHERE post_id=$post_id";
                $query_result = mysqli_query($connection,$query);
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
                              <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">

                            <hr>

                            <!-- Post Content -->
                            <p>
                              <?php echo "$post_content"; ?>
                            </p>
                            <hr>
<?php }} ?>
            <!-- Blog Comments -->

            <!-- Adding Comment -->
            <?php if(isset($_POST['create_comment'])){
              $comment_post_id = $_GET['post_id'];
              $comment_author = $_POST['comment_author'];
              $comment_email = $_POST['comment_email'];
              $comment_date = date('d-m-y');
              $comment_content = $_POST['comment_content'];

              $query = "INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_date,comment_content) VALUES('$comment_post_id','$comment_author','$comment_email','$comment_date','$comment_content')";
              $query_result = mysqli_query($connection,$query);
            } ?>

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" method="post">
                  <div class="form-group">
                    <label for="comment_author">Author</label>
                    <input type="text" name="comment_author" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="comment_email">Email</label>
                    <input type="text" name="comment_email" class="form-control">
                  </div>
                    <div class="form-group">
                      <label for="comment_content">Comment</label>
                      <textarea class="form-control" rows="3" name="comment_content"></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <?php
            $comment_post_id = $_GET['post_id'];
            $query = "SELECT * FROM comments WHERE comment_post_id='{$comment_post_id}' AND comment_status='approved' ORDER BY comment_id DESC";
            $query_result = mysqli_query($connection,$query);
            if(mysqli_num_rows($query_result)!= 0){
              while ($row=mysqli_fetch_assoc($query_result)) {
                $comment_date = $row['comment_date'];
                $comment_content = $row['comment_content'];
                $comment_author = $row['comment_author'];
            ?>
            <!-- Posted Comments -->

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo "{$comment_author}"; ?>
                        <small><?php echo "{$comment_date}"; ?></small>
                    </h4>
                    <?php echo "{$comment_content}"; ?>
                </div>
            </div>
            <?php }}
             ?>
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
