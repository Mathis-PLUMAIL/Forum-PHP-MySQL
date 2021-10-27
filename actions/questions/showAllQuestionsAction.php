<?php
require('actions/database.php');

// Récupérer les questions par défaut sans la recherche
$getAllQuestions = $bdd->query("SELECT * FROM questions ORDER BY id_questions DESC LIMIT 5");

// Vérifier si une recherche a été rentrée par l'utilisateur
if(isset($_GET['search']) AND !empty($_GET['search'])) {

  // La recherche
  $usersSearch = $_GET['search'];

  // Récupérer toutes les questions qui correspondent à la recherche en fonction du titre
  $getAllQuestions = $bdd->query('SELECT * FROM questions WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id_questions DESC ');

}