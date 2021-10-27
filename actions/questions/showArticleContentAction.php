<?php
require('actions/database.php');

// Vérifier si l'id de la question est rentrée dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])) {

  // Récupérer l'identifiant de la question
  $idOfTheQuestion = $_GET['id'];

  // Vérifier si la question existe
  $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id_questions = ?');
  $checkIfQuestionExists->execute(array($idOfTheQuestion));

  if($checkIfQuestionExists->rowCount() > 0 ) {

    // Récupérer les données de la question
    $questionInfos = $checkIfQuestionExists->fetch();

    // Stocker les données de la question dans des variables
    $question_title = $questionInfos['titre'];
    $question_content = $questionInfos['contenu'];
    $question_id_author = $questionInfos['id_auteur'];
    $question_pseudo_author = $questionInfos['pseudo_auteur'];
    $question_publication_date = $questionInfos['date_publication'];

  }else {
    $errorMsg = "Aucune question n'a été trouvé";
  }

}else {
  $errorMsg = "Aucune question n'a été trouvé";
}
