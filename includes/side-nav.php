<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
              <?php
              $query = 'SELECT * FROM category';
              $query_result = mysqli_query($connection,$query);
              while ($row=mysqli_fetch_assoc($query_result)) {
                $category_name = $row['category_name'];
                $category_id = $row["category_id"];
                ?>
                <li><a href="category.php?category_id=<?php echo $category_id?>"><?php echo "$category_name"; ?></a></li>

              <?php } ?>


            </ul>
        </div>

    </div>
    <!-- /.row -->
</div>
