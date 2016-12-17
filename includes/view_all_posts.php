<?php
$query = "SELECT * FROM posts WHERE post_status='published'";
$query_result = mysqli_query($connection,$query);
$row_count = mysqli_num_rows($query_result);
if($row_count == 0){
  echo "<h1>No Posts Published</h1>";
}
else{
while ($row = mysqli_fetch_assoc($query_result)) {
  $post_id = $row['post_id'];
  $post_title = $row['post_title'];
  $post_author = $row['post_author'];
  $post_date = $row['post_date'];
  $post_image = $row['post_image'];
  $post_content = $row['post_content'];
  $post_content=substr($post_content,0,50)."<a href='posts.php?post_id=$post_id'>.....Read more</a>";

  ?>
                <!-- Blog Post -->

                <!-- Title -->
                <h1><a href="posts.php?post_id=<?php echo $post_id ?>"><?php echo "$post_title"; ?></a></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="author.php?post_author=<?php echo $post_author; ?>"><?php echo "$post_author"; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo "$post_date"; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" width="200px" height="100px"src="images/<?php echo $post_image?>" alt="">
                <hr>

                <!-- Post Content -->
                <p>
                  <?php echo "$post_content"; ?>
                </p>
                <hr>
<?php }} ?>
