<?php ob_start(); ?>
<?php session_start(); ?>
<?php
if(isset($_SESSION['user_role'])){
$_SESSION['username']= null;
$_SESSION['password']= null;
$_SESSION['user_role']= null;
header("location:../../index.php");
}
 ?>
