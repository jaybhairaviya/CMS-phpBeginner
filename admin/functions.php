
<?php


function insertCategory() {
  global $connection;
  if (isset($_POST['submit'])) {
    $category_name = $_POST['category_name'];
    if($category_name == '' || empty($category_name)){
      echo "This Field Should not be empty";
    }
    else {
   $query = "INSERT INTO category(category_name) VALUE('$category_name')";
   $query_result = mysqli_query($connection,$query);
   if(!$query_result){
     echo "Error". DIE(mysqli_error($connection));
   }
  }
  }
}


function updateCategory() {
  global $connection;
  if (isset($_POST['update'])) {
    $category_id= $_GET['edit'];
    $category_name =$_POST['category_name'];
    $query= "UPDATE category SET category_name='$category_name' WHERE category_id='$category_id'";
    $query_result = mysqli_query($connection,$query);
    if(!$query_result){
      echo DIE(mysqli_error($connection));
    }
  }
  if(isset($_GET['edit'])){
    $category_id= $_GET['edit'];
    include 'includes/update_category.php';
  }

}

function deletePost(){
  global $connection;
  if (isset($_GET['delete'])) {
    $post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id=$post_id";
    $query_result = mysqli_query($connection,$query);
    if(!$query_result){
      echo "asdasd" . DIE(mysqli_error($connection));
    }
  }
}

function addPost() {
  global $connection;
  if(isset($_POST['addPost'])){
      $post_author = $_POST["post_author"];
      $post_category_id=$_POST['post_category_id'];
      $post_title=$_POST['post_title'];
      $post_date=date('d-m-y');
      $post_content=$_POST['post_content'];
      $post_image=$_FILES['post_image']['name'];
      $post_image_tmp = $_FILES['post_image']['tmp_name'];
      move_uploaded_file($post_image_tmp,"../images/$post_image");
      $post_tag=$_POST['post_tag'];
      $query = "INSERT INTO posts(post_author,post_category_id,post_date,post_title,post_content,post_image,post_tag)";
      $query .= "VALUES('$post_author','$post_category_id','$post_date','$post_title','$post_content','$post_image','$post_tag')";
      $query_result = mysqli_query($connection,$query);
      if(!$query_result){
        echo DIE('mysqli_error($connection);');
      }
  }
}

function fetchEditFields(){
  global $connection,$post_author,$post_category_id,$post_date,$post_title,$post_content,$post_image,$post_tag;
  if($_GET['edit']){
    $post_id = $_GET['edit'];
    $query = "SELECT * FROM posts WHERE post_id=$post_id";
    $query_result = mysqli_query($connection,$query);
    if(!$query_result){
      echo DIE(mysqli_error($connection));
    }
    while ($row=mysqli_fetch_assoc($query_result)) {

      $post_author = $row["post_author"];
      $post_category_id=$row['post_category_id'];
      $post_title=$row['post_title'];
      $post_date=$row['post_date'];
      $post_content=$row['post_content'];
      $post_image=$row['post_image'];
      $post_tag=$row['post_tag'];
  }}
}



function editPost(){
  global $connection;
  if(isset($_POST['updatePost'])){
    $post_id=$_GET['edit'];
    $post_author = $_POST["post_author"];
    $post_category_id=$_POST['post_category_id'];
    $post_title=$_POST['post_title'];
    $post_date=date('d-m-y');
    $post_content=$_POST['post_content'];
    $post_image=$_FILES['post_image']['name'];
    if(empty($post_image)){
      $query = "SELECT * FROM posts WHERE post_id=$post_id";
      $query_result = mysqli_query($connection,$query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $post_image = $row['post_image'];
      }
    }
    else {
      $post_image_tmp = $_FILES['post_image']['tmp_name'];
      move_uploaded_file($post_image_tmp,"../images/$post_image");
    }
    $post_tag=$_POST['post_tag'];
    $query = "UPDATE posts SET post_author='$post_author', post_title='$post_title', post_category_id='$post_category_id', post_date='$post_date', post_image='$post_image', post_content='$post_content', post_tag='$post_tag' WHERE post_id={$post_id}";
    $query_result = mysqli_query($connection,$query);


  }
}

?>
