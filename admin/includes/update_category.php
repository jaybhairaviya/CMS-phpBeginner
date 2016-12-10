<form class="" action="" method="post">
  <label for="category_name">Edit Category</label>
  <div class="form-group">
    <!-- Catching the update value -->
    <?php
      $query = "SELECT * FROM category WHERE category_id = $category_id";
      $query_result = mysqli_query($connection,$query);
      while($row=mysqli_fetch_assoc($query_result)){
        $category_name = $row['category_name'];

        ?>
        <input type="text" name="category_name" class="form-control" value="<?php if(isset($category_name)){echo $category_name;}?>">
        <?php }
          ?>
  </div>
  <div class="form-group">
    <input type="submit" name="update" value="Edit Category" class="btn btn-primary">
  </div>
</form>
<!--Closing Update Form -->
