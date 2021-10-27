<?php 
// require('actions/users/securityAction.php'); ?>
<?php
session_start();
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php require('actions/questions/showAllQuestionsAction.php'); ?>

<br><br>
<div class="container">
  <form action="" method="GET">
    <div class="form-group row mx-auto">
      <div class="col-8">
        <input type="search" class="form-control" name="search">
      </div>
      <div class="col-4">
        <button class="btn btn-success" type="submit">Rechercher</button>
      </div>
    </div>
  </form>
  <br>
  <?php 
    while($question = $getAllQuestions->fetch()) {
      ?>
        <div class="card">
          <div class="card-header">
            <a href="article.php?id=<?= $question['id_questions']; ?>">
              <?= $question['titre']; ?>
            </a>
          </div>
          <div class="card-body">
            <?= $question['description']; ?>
          </div>
          <div class="card-footer">
            Publié par <a href="profile.php?id=<?= $question['id_auteur']; ?>"><?= $question['pseudo_auteur']; ?></a> le <?= $question['date_publication']; ?>
          </div>
        </div>
        <br>
      <?php
    }
  ?>
</div>
