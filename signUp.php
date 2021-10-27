<?php require('actions/users/signUpAction.php'); ?>
<?php include 'includes/header.php'; ?>

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

    <div class="form-group mb-3">
      <label for="nom">Nom</label>
      <input type="text" id="nom" class="form-control" name="lastname">
    </div>

    <div class="form-group mb-3">
      <label for="prenom">Prénom</label>
      <input type="text" id="prenom" class="form-control" name="firstname">
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>

    <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>

    <br><br>
    <a href="login.php"><p>J'ai déjà un compte je me connecte</p></a>

  </form>
</div>

<?php require 'includes/footer.php'; ?>
