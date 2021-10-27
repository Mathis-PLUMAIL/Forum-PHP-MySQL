<?php
require('actions/users/securityAction.php');
require('actions/questions/getInfosOfEditedQuestionAction.php');
require('actions/questions/editQuestionAction.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<br>
<br>
<div class="container">
  <?php if(isset($errorMsg)) { echo '<p>'.$errorMsg.'</p>'; } ?>
  <?php 
    if(isset($question_content)) { 
      ?>
        <form method="POST">
          <div class="form-group mb-3">
            <label for="pseudo">Titre de la question</label>
            <input type="text" id="pseudo" class="form-control" name="title" value="<?= $question_title; ?>">
          </div>

          <div class="form-group mb-3">
            <label for="nom">Description de la question</label>
            <textarea type="text" id="nom" class="form-control" name="description"><?= $question_description; ?></textarea>
          </div>

          <div class="form-group mb-3">
            <label for="prenom">Contenu de la question</label>
            <textarea type="text" id="prenom" class="form-control" name="content"><?= $question_content; ?></textarea>
          </div>

          <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>
        </form>
      <?php
    }
  ?>
</div>

<?php include('includes/footer.php'); ?>
