<?php require('action/admin/loginAdminAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>
<body>
<br></br>
<form class="container" method="POST">
  <?php
  if(isset($errorMsg)){echo '<p>'.$errorMsg.'</p>';} ?>
  <h3>connectez vous en tant qu'administrateur</h3>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Pseudo</label>
    <input type="text" class="form-control" name="pseudo">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" >
  </div>
  <button type="submit" class="btn btn-primary" name="validate">se connecter</button>
</form>
<br>
<a href="login.php"><p>connectez vous en tant qu' utilisateur </p></a>
</body>
</html>