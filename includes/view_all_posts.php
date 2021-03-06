<?php
$query = "SELECT * FROM posts";
$query_result = mysqli_query($connection,$query);
while ($row = mysqli_fetch_assoc($query_result)) {
  $post_id = $row['post_id'];
  $post_title = $row['post_title'];
  $post_author = $row['post_author'];
  $post_date = $row['post_date'];
  $post_image = $row['post_image'];
  $post_content = $row['post_content'];
  ?>
                <!-- Blog Post -->

                <!-- Title -->
                <h1><a href="posts.php?post_id=<?php echo $post_id ?>"><?php echo "$post_title"; ?></a></h1>

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
<?php } ?>
