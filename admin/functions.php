
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
 ?>
