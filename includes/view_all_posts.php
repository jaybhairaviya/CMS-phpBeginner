<?php
// Counting the number of pages required
$posts_per_page = 5;
$total_posts = "SELECT * FROM posts";
$total_posts=mysqli_query($connection,$total_posts);
$posts_count = mysqli_num_rows($total_posts);
$total_pages = ceil($posts_count/$posts_per_page);

// Deciding the initial post count based on page
if(isset($_GET['page'])){
  $page=$_GET['page'];
  $page_start_count = ($page * $posts_per_page) - $posts_per_page;
}
else{
  $page=1;
  $page_start_count=0;
}
$query = "SELECT * FROM posts WHERE post_status='published' ORDER BY post_id DESC LIMIT $page_start_count,5";
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
