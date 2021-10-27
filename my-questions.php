<?php
require('actions/users/securityAction.php');
require('actions/questions/myQuestionsAction.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<br><br>
<div class="container">
  <?php 
    while($question = $getAllMyQuestions->fetch()) {
      ?>
        <div class="card">
          <h5 class="card-header">
            <a href="article.php?id=<?= $question['id_questions']; ?>">
              <?= $question['titre']; ?>
            </a>
          </h5>
          <div class="card-body">
            <p class="card-text">
              <?= $question['description']; ?>
            </p>
            <a href="article.php?id=<?= $question['id_questions']; ?>" class="btn btn-primary">Accéder à la question</a>
            <a href="edit-question.php?id=<?= $question['id_questions']; ?>" class="btn btn-warning">Modifier la question</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
              Supprimer la question
            </button>

            <!-- Modal Suppression -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body text-center">
                    Êtes-vous sur de vouloir supprimer cette question ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id_questions']; ?>" class="btn btn-danger">Supprimer la question</a>
                  </div>
                </div>
              </div>
            </div>
            <!--END Modal Suppression -->

          </div>
        </div>
        <br>
      <?php
    }
  ?>
</div>

<?php include('includes/footer.php'); ?>
