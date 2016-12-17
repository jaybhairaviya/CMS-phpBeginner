<?php
if(isset($_POST['apply'])){
  if (isset($_POST['checkboxArray'])) {
    $checkboxArray =$_POST['checkboxArray'];
    foreach ($checkboxArray as $checkbox) {
      switch($_POST['modify']){
        case 'published' : {
          $query = "UPDATE posts SET post_status='published' WHERE post_id=$checkbox";
          $query_result = mysqli_query($connection,$query);
          if(!$query_result){
            echo DIE(mysqli_error($connection));
          }
          break;
        }
        case 'draft':{
          $query = "UPDATE posts SET post_status='draft' WHERE post_id=$checkbox";
          $query_result = mysqli_query($connection,$query);
          if(!$query_result){
            echo DIE(mysqli_error($connection));
          }
          break;
        }
        case 'delete':{
          $query = "DELETE FROM posts WHERE post_id=$checkbox";
          $query_result = mysqli_query($connection,$query);
          if(!$query_result){
            echo DIE(mysqli_error($connection));
          }
          break;
        }
        case 'clone':{
          $query = "SELECT * FROM posts WHERE post_id='{$checkbox}'";
          $query_result = mysqli_query($connection,$query);
          while ($row=mysqli_fetch_assoc($query_result)) {
            $post_author = $row["post_author"];
            $post_category_id=$row['post_category_id'];
            $post_title=$row['post_title'];
            $post_date=date('d-m-y');
            $post_content=$row['post_content'];
            $post_image=$row['post_image'];
            $post_tag=$row['post_tag'];
            $post_status=$row['post_status'];
          }
          $query = "INSERT INTO posts(post_author,post_category_id,post_date,post_title,post_content,post_image,post_tag,post_status)";
          $query .= "VALUES('$post_author','$post_category_id','$post_date','$post_title','$post_content','$post_image','$post_tag','$post_status')";
          $query_result = mysqli_query($connection,$query);
          if(!$query_result){
            echo DIE('mysqli_error($connection);');
          }
          break;
        }
      }
    }
  }
}

 ?>

  <div class="col-xs-3">
    <form action="posts.php" method="post">
    <select name="modify" class="form-control">
      <option value="">None</option>
      <option value="draft">Draft</option>
      <option value="published">Published</option>
      <option value="delete">Delete</option>
      <option value="clone">Clone</option>
    </select>
  </div>
<div class="col-xs-3">
  <button type="submit" class="btn btn-primary" name="apply">Apply</button>
  <a href="posts.php?source=add_post" class="btn btn-success">Add Posts</a>
</div>


<br>
<br>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <script type="text/javascript">
        $(document).ready(function(){
          checkboxAll = $('#selectAllCheckbox');
          checkboxAll.on('click',function(){
            if(this.checked){
              $('.checkbox').each(function(){
                this.checked=true;
              });
            }
            else {
              $('.checkbox').each(function(){
                this.checked=false;
              });
            }
          });

        });
      </script>
      <th><input type="checkbox" id="selectAllCheckbox" value=""></th>
      <th>Post ID</th>
      <th>Post Author</th>
      <th>Post Title</th>
      <th>Post CategoryID</th>
      <th>Post Date</th>
      <th>Post Image</th>
      <th>Post Tag</th>
      <th>Post Comment Count</th>
      <th>Post Views Count</th>
      <th>Post Status</th>
    </tr>
  </thead>


  <tbody>
    <?php
    $query = 'SELECT * FROM posts ORDER BY post_id DESC';
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
      $post_views_count = $row['post_views_count'];
      $post_status=$row['post_status'];
      ?>
      <tr>
        <td><input type="checkbox" name="checkboxArray[]" class="checkbox" value="<?php echo $post_id?>"></td>
        <td><?php echo $post_id?></td>
        <td><?php echo "$post_author"; ?></td>
        <td><?php echo "$post_title"; ?></td>
        <td><?php echo "$post_category_id"; ?></td>
        <td><?php echo "$post_date"; ?></td>
        <td><img src="../images/<?php echo $post_image?>" width="200" height="100"></td>
        <td><?php echo "$post_tag"; ?></td>
        <td><a href="comments.php?source=post_comments&post_id=<?php echo $post_id?>"><?php echo "$post_comment_count"; ?></td>
        <td><?php echo "$post_views_count"; ?></td>
        <td><?php echo "$post_status"; ?></td>
        <td><a href="posts.php?delete=<?php echo $post_id?>">Delete</a></td>
        <td><a href="../posts.php?post_id=<?php echo $post_id?>">View Post</a></td>
        <td><a href="posts.php?source=edit_post&edit=<?php echo $post_id?>">Edit</a></td>
        <td><a href="posts.php?status=published&post_id=<?php echo $post_id?>">Approve</a></td>
        <td><a href="posts.php?status=draft&post_id=<?php echo $post_id?>">Disapprove</a></td>
        <td><a href="posts.php?reset=true&post_id=<?php echo $post_id?>">Reset Views Count</a></td>
      </tr>


    <?php } ?>


  </tbody>

</table>
</form>
