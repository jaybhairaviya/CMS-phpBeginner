<?php ob_start(); ?>
<?php session_start(); ?>
<?php
if(isset($_SESSION['user_role'])){
  if($_SESSION['user_role']!='admin')
    header("Location: ../index.php");
}
else {
    header("Location: ../index.php");
}
 ?>

 <!-- Code of Users online facility -->
 <?php
 $session = session_id();
 $time = time();
 $timeout_in_secs = 60;
 $time_out = $time - 60;
 $query =mysqli_query($connection,"SELECT * FROM users_online WHERE session='{$session}'");
 $count=mysqli_num_rows($query);
 //if present session not present in database than insert it
 if($count == 0){
   $query = mysqli_query($connection,"INSERT INTO users_online(session,time) VALUES('{$session}','{$time}')");
 }
 // if present session is present than update the time to present time
 else{
   $query = mysqli_query($connection,"UPDATE users_online SET time='{$time}' WHERE session='{$session}'");
 }
 //deleting entries where time has passed timeout
 $query = mysqli_query($connection,"DELETE FROM users_online WHERE time < $time_out");
 // selecting entries from table where time has not passed the timeout
  $query=mysqli_query($connection,"SELECT * FROM users_online WHERE time > $time_out");
  $online_count=mysqli_num_rows($query);

  ?>

<head>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <style media="screen">
    #load{
  width:100%;
  height:100%;
  position:fixed;
  z-index:9999;
  background:url("https://www.creditmutuel.fr/cmne/fr/banques/webservices/nswr/images/loading.gif") no-repeat center center rgba(0,0,0,0.25)
}
    </style>
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<script type="text/javascript">
document.onreadystatechange = function () {
var state = document.readyState;
if (state == 'complete') {
    setTimeout(function(){
       document.getElementById('load').style.visibility="hidden";
    },1000);
}
}
</script>
<div id="load"></div>
