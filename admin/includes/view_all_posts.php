
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Post ID</th>
      <th>Post Author</th>
      <th>Post Title</th>
      <th>Post CategoryID</th>
      <th>Post Date</th>
      <th>Post Image</th>
      <th>Post Tag</th>
      <th>Post Comment Count</th>
      <th>Post Status</th>
    </tr>
  </thead>


  <tbody>
    <?php
    $query = 'SELECT * FROM posts';
    $query_result = mysqli_query($connection,$query);
    while ($row=mysqli_fetch_assoc($query_result)) {
      $post_id = $row['post_id'];
      $post_author = $row["post_author"];
      $post_category_id=$row['post_category_id'];
      $post_title=$row['post_title'];
      $post_date=$row['post_date'];
      $post_content=$row['post_content'];
      $post_image=$row['post_image'];
      $post_tag=$row['post_tag'];
      $post_comment_count=$row['post_comment_count'];
      $post_status=$row['post_status'];
      ?>
      <tr>
        <td><?php echo $post_id?></td>
        <td><?php echo "$post_author"; ?></td>
        <td><?php echo "$post_title"; ?></td>
        <td><?php echo "$post_category_id"; ?></td>
        <td><?php echo "$post_date"; ?></td>
        <td><img src="../images/<?php echo $post_image?>" width="200" height="100"></td>
        <td><?php echo "$post_tag"; ?></td>
        <td><?php echo "$post_comment_count"; ?></td>
        <td><?php echo "$post_status"; ?></td>
        <td><a href="posts.php?delete=<?php echo $post_id?>">Delete</a></td>
        <td><a href="posts.php?source=edit_post&edit=<?php echo $post_id?>">Edit</a></td>
        <td><a href="posts.php?status=published&post_id=<?php echo $post_id?>">Approve</a></td>
        <td><a href="posts.php?status=draft&post_id=<?php echo $post_id?>">Disapprove</a></td>
      </tr>


    <?php } ?>


  </tbody>

</table>
