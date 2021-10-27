<?php
require('actions/users/loginAction.php');
include 'includes/header.php'; 
include('includes/navbar.php');?>
<br>
<br>
<div class="container">
  <form method="POST">
    <?php  
      if(isset($errorMsg)) {
        echo '<p>'.$errorMsg.'</p>';
      }
    ?>

    <div class="form-group mb-3">
      <label for="pseudo">Pseudo</label>
      <input type="text" id="pseudo" class="form-control" name="pseudo">
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password">
    </div>

    <button type="submit" class="btn btn-primary" name="validate">Se connecter</button>

    <br><br>
    <a href="signUp.php"><p>Je n'ai pas de compte je m'inscris</p></a>
  </form>
</div>

<?php include 'includes/footer.php' ?>
