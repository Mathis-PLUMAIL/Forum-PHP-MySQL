<?php 
require('actions/users/securityAction.php');
require('actions/questions/publishQuestionAction.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<br>
<br>
<div class="container">
  <form method="POST">

    <?php  
      if(isset($errorMsg)) {

        echo '<p>'.$errorMsg.'</p>';

      }elseif(isset($successMsg)) {

        echo '<p>'.$successMsg.'</p>';
        
      }
    ?>

    <div class="form-group mb-3">
      <label for="pseudo">Titre de la question</label>
      <input type="text" id="pseudo" class="form-control" name="title">
    </div>

    <div class="form-group mb-3">
      <label for="nom">Description de la question</label>
      <textarea type="text" id="nom" class="form-control" name="description"></textarea>
    </div>

    <div class="form-group mb-3">
      <label for="prenom">Contenu de la question</label>
      <textarea type="text" id="prenom" class="form-control" name="content"></textarea>
    </div>

    <button type="submit" class="btn btn-primary" name="validate">Publier la question</button>

  </form>
</div>

<?php include('includes/footer.php'); ?>
