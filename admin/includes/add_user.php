<script type="text/javascript">
// checking form validity
$(document).ready(function(){
  var inputs = $('input,textarea');
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
    console.log('aaa');
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



<div class="col-xs-12">
  <form class="" action="users.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
      <label for="user_password">Password</label>
      <input type="text" name="user_password" class="form-control">
    </div>
    <div class="form-group">
      <label for="user_firstname">First Name</label>
      <input type="text" name="user_firstname" class="form-control">
    </div>
    <div class="form-group">
      <label for="user_lastname">Last Name</label>
      <input type="text" name="user_lastname" class="form-control">
    </div>
    <div class="form-group">
      <label for="user_email">Email</label>
      <input type="email" name="user_email" class="form-control">
    </div>

    <div class="form-group">
      <label for="user_image">Image</label>
      <input type="file" name="user_image" >
    </div>
    <div class="form-group">
      <label for="user_role">Role</label>
      <select class="form-control" name="user_role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>
    </div>

    <div class="form-group">
      <input type="submit" disabled name="addUser" value="Add User" class="btn btn-primary">
    </div>
  </form>
</div>
