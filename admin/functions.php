
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
      $post_status = $_POST['post_status'];
      $post_image=$_FILES['post_image']['name'];
      $post_image_tmp = $_FILES['post_image']['tmp_name'];
      move_uploaded_file($post_image_tmp,"../images/$post_image");
      $post_tag=$_POST['post_tag'];
      $query = "INSERT INTO posts(post_author,post_category_id,post_date,post_title,post_content,post_image,post_tag,post_status)";
      $query .= "VALUES('$post_author','$post_category_id','$post_date','$post_title','$post_content','$post_image','$post_tag','$post_status')";
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

function deleteComment(){
  global $connection;
  if (isset($_GET['delete'])) {
    $comment_id = $_GET['delete'];
    $query_post_comment_count = "SELECT * FROM comments WHERE comment_id=$comment_id";
    $query_post_comment_count = mysqli_query($connection,$query_post_comment_count);
    while($row=mysqli_fetch_assoc($query_post_comment_count)){
      $post_id=$row['comment_post_id'];
    }
    $query = "UPDATE posts SET post_comment_count = post_comment_count - 1 WHERE post_id=$post_id";
    $query_result = mysqli_query($connection,$query);

    $query = "DELETE FROM comments WHERE comment_id=$comment_id";
    $query_result = mysqli_query($connection,$query);
        if(!$query_result){
      echo "asdasd" . DIE(mysqli_error($connection));
    }

  }
}

function addUser() {
  global $connection;
  if(isset($_POST['addUser'])){
      $username = $_POST["username"];
      $user_password=$_POST['user_password'];
      $query = "SELECT user_randSalt FROM users";
      $query_result=mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($query_result)){
      $salt = $row['user_randSalt'];
    }
      $user_password = crypt($user_password,$salt);
      $user_firstname=$_POST['user_firstname'];
      $user_lastname=$_POST['user_lastname'];
      $user_email=$_POST['user_email'];
      $user_image=$_FILES['user_image']['name'];
      $user_image_tmp = $_FILES['user_image']['tmp_name'];
      move_uploaded_file($user_image_tmp,"../images/$user_image");
      $user_role=$_POST['user_role'];
      $query = "INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_image,user_role)";
      $query .= " VALUES ('$username','$user_password','$user_firstname','$user_lastname','$user_email','$user_image','$user_role')";
      $query_result = mysqli_query($connection,$query);
      if(!$query_result){
        echo DIE(mysqli_error($connection));
      }
  }
}


function deleteUser(){
  global $connection;
  if (isset($_GET['delete'])) {
    $user_id = $_GET['delete'];

    $query = "DELETE FROM users WHERE user_id=$user_id";
    $query_result = mysqli_query($connection,$query);
    if(!$query_result){
      echo "asdasd" . DIE(mysqli_error($connection));
    }
  }
}

function fetchEditFieldsUser(){
  global $connection,$username,$user_password,$user_firstname,$user_lastname,$user_email,$user_image,$user_role,$user_randSalt;
    if($_GET['edit']){
    $user_id = $_GET['edit'];
    $query = "SELECT * FROM users WHERE user_id=$user_id";
    $query_result = mysqli_query($connection,$query);
    if(!$query_result){
      echo DIE(mysqli_error($connection));
    }
    while ($row=mysqli_fetch_assoc($query_result)) {

      $username = $row["username"];
      $user_password=$row['user_password'];
      $user_firstname=$row['user_firstname'];
      $user_lastname=$row['user_lastname'];
      $user_email=$row['user_email'];
      $user_role=$row['user_role'];
      $user_image=$row['user_image'];
  }}
}



function editUser(){
  global $connection,$password;
  if(isset($_POST['updateUser'])){
    $user_id=$_GET['edit'];
    $username = $_POST["username"];
    $password=$_POST['user_password'];
    $query = "SELECT user_randSalt FROM users";
    $query_result=mysqli_query($connection,$query);
    if(!$query_result)
      echo DIE(mysqli_error($connection));
    while($row = mysqli_fetch_array($query_result)){
    $salt = $row['user_randSalt'];
  }
    $user_password = crypt($password,$salt);
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_email=$_POST['user_email'];
    $user_role=$_POST['user_role'];
    $user_image=$_FILES['user_image']['name'];
    $query = "SELECT * FROM users WHERE user_id=$user_id";
    $query_result = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($query_result)) {
      $db_image = $row['user_image'];
      $db_password =$row['user_password'];
    }
    if(empty($user_image)){
        $user_image = $db_image;
    }
    else {
      $user_image_tmp = $_FILES['user_image']['tmp_name'];
      move_uploaded_file($user_image_tmp,"../images/$user_image");
    }
    if($password != $db_password)
    $query = "UPDATE users SET username='$username', user_password='$user_password', user_firstname='$user_firstname', user_lastname='$user_lastname', user_image='$user_image', user_email='$user_email', user_role='$user_role' WHERE user_id={$user_id}";
    else
    $query = "UPDATE users SET username='$username', user_firstname='$user_firstname', user_lastname='$user_lastname', user_image='$user_image', user_email='$user_email', user_role='$user_role' WHERE user_id={$user_id}";
    $query_result = mysqli_query($connection,$query);


  }
}

function fetchFieldsProfile(){
  global $connection,$username,$user_password,$user_firstname,$user_lastname,$user_email,$user_image;
    $query = "SELECT * FROM users WHERE username='$username'";
    $query_result = mysqli_query($connection,$query);
    if(!$query_result){
      echo DIE(mysqli_error($connection));
    }
    while ($row=mysqli_fetch_assoc($query_result)) {

      $username = $row["username"];
      $user_password=$password;
      if(empty($user_password)){
        $user_password = $row['user_password'];
      }
      $user_firstname=$row['user_firstname'];
      $user_lastname=$row['user_lastname'];
      $user_email=$row['user_email'];
      $user_role=$row['user_role'];
      $user_image=$row['user_image'];
  }
}



function editProfile(){
  global $connection;
  if(isset($_POST['updateProfile'])){
    $old_username=$_SESSION['username'];
    $username = $_POST["username"];
    $user_password=$_POST['user_password'];
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_email=$_POST['user_email'];
    $user_image=$_FILES['user_image']['name'];
    if(empty($user_image)){
      $query = "SELECT * FROM users WHERE username='$old_username'";
      $query_result = mysqli_query($connection,$query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $user_image = $row['user_image'];
      }
    }
    else {
      $user_image_tmp = $_FILES['user_image']['tmp_name'];
      move_uploaded_file($user_image_tmp,"../images/$user_image");
    }
    $query = "UPDATE users SET username='$username', user_password='$user_password', user_firstname='$user_firstname', user_lastname='$user_lastname', user_image='$user_image', user_email='$user_email' WHERE username='$old_username'";
    $query_result = mysqli_query($connection,$query);


  }
}


?>
