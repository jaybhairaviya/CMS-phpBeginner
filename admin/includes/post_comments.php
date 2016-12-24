
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Comment ID</th>
      <th>Comment Author</th>
      <th>Comment Post ID</th>
      <th>Comment Date</th>
      <th>Comment Content</th>
      <th>Comment Email</th>
      <th>Comment Status</th>
      <th>In Response to</th>
    </tr>
  </thead>


  <tbody>
    <?php
    $post_id=$_GET['post_id'];
    $query = "SELECT * FROM comments WHERE comment_post_id='{$post_id}'";
    $query_result = mysqli_query($connection,$query);
    while ($row=mysqli_fetch_assoc($query_result)) {
      $comment_id = $row['comment_id'];
      $comment_author = $row["comment_author"];
      $comment_post_id=$row['comment_post_id'];
      $comment_date=$row['comment_date'];
      $comment_content=$row['comment_content'];
      $comment_email = $row['comment_email'];
      $comment_status=$row['comment_status'];
      ?>
      <tr>
        <td><?php echo $comment_id?></td>
        <td><?php echo "$comment_author"; ?></td>
        <td><?php echo "$comment_post_id"; ?></td>
        <td><?php echo "$comment_date"; ?></td>
        <td><?php echo "$comment_content"; ?></td>
        <td><?php echo "$comment_email"; ?></td>
        <td><?php echo "$comment_status"; ?></td>
        <?php
        $query_response = "SELECT * FROM posts WHERE post_id ='{$comment_post_id}'";
        $query_response = mysqli_query($connection,$query_response);
        while ($row=mysqli_fetch_assoc($query_response)) {
          $comment_post_title = $row['post_title'];
        }
         ?>
        <td><?php echo "<a href='../posts.php?post_id=$comment_post_id'>$comment_post_title</a>";?></td>
        <td><a href="comments.php?delete=<?php echo $comment_id?>">Delete</a></td>
        <td><a href="comments.php?source=post_comments&status=approved&post_id=<?php echo $post_id?>&comment_id=<?php echo $comment_id?>">Approve</a></td>
        <td><a href="comments.php?source=post_comments&status=unapproved&post_id=<?php echo $post_id?>&comment_id=<?php echo $comment_id?>">Disapprove</a></td>
      </tr>


    <?php } ?>


  </tbody>

</table>
