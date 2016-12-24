<!DOCTYPE html>
<html>
  <?php include 'includes/header.php'; ?>
  <?php include 'includes/connection.php'; ?>
  <body>
    <?php
    if(isset($_POST['register'])){
      $user_email = $_POST['email'];
      $username =$_POST['username'];
      $user_password = $_POST['password'];
      $username = mysqli_real_escape_string($connection,$username);
      $user_password = mysqli_real_escape_string($connection,$user_password);
      $user_email = mysqli_real_escape_string($connection,$user_email);
      $user_password = password_hash($user_password,PASSWORD_DEFAULT,array('cost'=> 10));
      $query = "INSERT INTO users(username,user_password,user_email) VALUE('$username','$user_password','$user_email')";
      $query_result =mysqli_query($connection,$query);
      if(!$query_result)
        echo DIE(mysqli_error($connection));
    }

     ?>
    <form class="form-horizontal" action='' method="POST">
      <fieldset style="text-align:center;">
        <div id="legend">
          <legend class="">Register</legend>
        </div>
        <div class="control-group">
          <!-- Firstname -->
          <label class="control-label"  for="firstname">Firstname</label>
          <div class="controls">
            <input type="text" name="firstname" class="input-xlarge" required="required">
            <p class="help-block">Please provide your Firstname</p>
          </div>
        </div>
        <div class="control-group">
          <!-- Lastname -->
          <label class="control-label"  for="lastname">Lastname</label>
          <div class="controls">
            <input type="text" name="lastname" class="input-xlarge" required="required">
            <p class="help-block">Please provide your lastname</p>
          </div>
        </div>
        <div class="control-group">
          <!-- Username -->
          <label class="control-label"  for="username">Username</label>
          <div class="controls">
            <input type="text" name="username" placeholder="" class="input-xlarge" required="required">
            <p class="help-block">Please provide your username</p>
          </div>
        </div>

        <div class="control-group">
          <!-- E-mail -->
          <label class="control-label" for="email">E-mail</label>
          <div class="controls">
            <input type="email" name="email" placeholder="" class="input-xlarge" required="required">
            <p class="help-block">Please provide your E-mail</p>
          </div>
        </div>

        <div class="control-group">
          <!-- Password-->
          <label class="control-label" for="password">Password</label>
          <div class="controls">
            <input type="password" name="password" placeholder="" class="input-xlarge" required="required">
            <p class="help-block">Please enter your password</p>
          </div>
        </div>

        <div class="control-group">
          <!-- Password -->
          <label class="control-label"  for="password_confirm">Password (Confirm)</label>
          <div class="controls">
            <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge" required="required">
            <p class="help-block">Please confirm password</p>
          </div>
        </div>

        <div class="control-group">
          <!-- Button -->
          <div class="controls">
            <button class="btn btn-success" type="submit" name="register">Register</button>
          </div>
        </div>
      </fieldset>
    </form>
  </body>
</html>
