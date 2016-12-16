<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Home</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <?php
              $query = "SELECT * FROM category LIMIT 3";
              $query_result = mysqli_query($connection,$query);
              while ($row = mysqli_fetch_assoc($query_result)) {
                $category_name = $row['category_name'];
                $category_id = $row['category_id'];

               ?>
                <li>
                    <a href="category.php?category_id=<?php echo $category_id?>"><?php echo $category_name; ?></a>
                </li>
              <?php } ?>
              <?php
              if(isset($_SESSION['user_role'])){
                if(isset($_GET['post_id'])){
                  echo "<li>
                      <a href='admin/posts.php?source=edit_post&edit={$_GET['post_id']}'>Edit Post</a>
                  </li>";
                }
              }

               ?>
              <li>
                  <a href="admin/posts.php">Admin</a>
              </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
