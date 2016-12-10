<script type="text/javascript">
// checking form validity
$(document).ready(function(){
  var inputs = $('input[type=text],textarea');
  var selectInput = $('select');
  var validateForm = function(inputs){
    var validity = true;
    inputs.each(function(){
      var presentInput = $(this);
      if(!presentInput.val() || (presentInput.type === 'radio' && !presentInput.is('checked')))
      {

        validity = false;
        $('input[type=submit]').attr('disabled','disabled');
      }
      selectInput.each(function(){
        if(selectInput.val() == '' ){
          validity = false;
          $('input[type=submit]').attr('disabled','disabled');
        }
      });

    });
    return validity;
  };

// check for selection validity at every change
  selectInput.change(function(){
    if(validateForm(inputs)){
      $('input[type=submit]').removeAttr('disabled');
    }
  });

  // check for inputs validity at every change
  inputs.on('keyup',function(){

    if(validateForm(inputs)){
      $('input[type=submit]').removeAttr('disabled');
    }
  });
  inputs.change(function(){
    if(validateForm(inputs)){
      $('input[type=submit]').removeAttr('disabled');
    }
  });

});
</script>

<?php
editPost();
fetchEditFields();
?>
<div class="col-xs-12">

  <form class="" action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label for="post_author">Author</label>
      <input type="text" name="post_author" class="form-control" value="<?php echo $post_author ?>">
    </div>
    <div class="form-group">
      <label for="post_title">Title</label>
      <input type="text" name="post_title" class="form-control" value="<?php echo $post_title ?>">
    </div>
    <div class="form-group">
      <label for="post_category_id">Category</label>
      <!-- map category and category_id dynamically -->
      <select name="post_category_id" class="form-control" value="<?php echo $post_category_id ?>">
        <option value="" selected>None</option>
        <?php
        $query = 'SELECT * FROM category';
        $query_result = mysqli_query($connection,$query);
        while ($row=mysqli_fetch_assoc($query_result)) {
          $category_name = $row['category_name'];
          $category_id = $row["category_id"];
          ?>
          <option value="<?php echo $category_id ?>"<?php if($category_id == $post_category_id) echo 'selected'?>><?php echo $category_name ?></option>
          <?php } ?>
      </select>
    </div>

    <div class="form-group">
      <label for="post_author">Image</label>
      <br>
      <img src="../images/<?php echo $post_image ?>" width="200" alt="" style="margin-bottom:10px;">
      <input type="file" name="post_image" value="<?php echo $post_image ?>">
    </div>
    <div class="form-group">
      <label for="post_content">Content</label>
      <textarea class="form-control" name="post_content" rows="8" cols="80" ><?php echo $post_content ?></textarea>
    </div>
    <div class="form-group">
      <label for="post_tag">Tags</label>
      <input type="text" name="post_tag" class="form-control" value="<?php echo $post_tag ?>">
    </div>

    <div class="form-group">
      <input type="submit" disabled name="updatePost" value="Update Post" class="btn btn-primary">
    </div>
  </form>
</div>
