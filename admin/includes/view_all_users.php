
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>User ID</th>
      <th>Username</th>
      <th>Password</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Image</th>
      <th>Role</th>
      <th>Random Salt</th>
    </tr>
  </thead>


  <tbody>
    <?php
    $query = 'SELECT * FROM users';
    $query_result = mysqli_query($connection,$query);
    while ($row=mysqli_fetch_assoc($query_result)) {
      $user_id=$row['user_id'];
      $username = $row["username"];
      $user_password=$row['user_password'];
      $user_firstname=$row['user_firstname'];
      $user_lastname=$row['user_lastname'];
      $user_email=$row['user_email'];
      $user_image=$row['user_image'];
      $user_role=$row['user_role'];
      $user_randSalt =$row['user_randSalt'];
      ?>
      <tr>
        <td><?php echo $user_id?></td>
        <td><?php echo "$username"; ?></td>
        <td><?php echo "$user_password"; ?></td>
        <td><?php echo "$user_firstname"; ?></td>
        <td><?php echo "$user_lastname"; ?></td>
        <td><?php echo "$user_email"; ?></td>
        <td><img src="../images/<?php echo $user_image?>" width="200" height="100"></td>
        <td><?php echo "$user_role"; ?></td>
        <td><?php echo "$user_randSalt"; ?></td>
        <td><a href="users.php?delete=<?php echo $user_id?>">Delete</a></td>
        <td><a href="users.php?source=edit_user&edit=<?php echo $user_id?>">Edit</a></td>
        </tr>


    <?php } ?>


  </tbody>

</table>
