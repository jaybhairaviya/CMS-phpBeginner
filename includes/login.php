<?php include 'connection.php'; ?>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['user_password'];
  $username = mysqli_real_escape_string($connection,$username);
  $password=mysqli_real_escape_string($connection,$password);
  $query = "SELECT * FROM users WHERE username='{$username}'";
  $query_result = mysqli_query($connection,$query);
  $row_count = mysqli_num_rows($query_result);
  if($row_count==0){
      header('Location: ../index.php');
  }
  else
  {
  while ($row=mysqli_fetch_assoc($query_result)) {
    $db_username = $row['username'];
    $db_password = $row['user_password'];
    $db_email=$row['user_email'];
    $db_firstname = $row['user_firstname'];
    $db_lastname = $row['user_lastname'];
    $db_userrole=$row['user_role'];
    }
    if($db_username == $username && $db_password == $password){
    $_SESSION['username'] = $db_username;
    $_SESSION['password']=$db_password;
    $_SESSION['user_role']=$db_userrole;
    header('Location: ../admin');
  }
  else{
    header('Location: ../index.php');
  }


  }
}


?>
