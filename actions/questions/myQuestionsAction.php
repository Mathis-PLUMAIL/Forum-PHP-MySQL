<?php
require('actions/database.php');

$getAllMyQuestions = $bdd->prepare('SELECT id_questions, titre, description FROM questions WHERE id_auteur = ? ORDER BY id_questions DESC');
$getAllMyQuestions->execute(array($_SESSION['id']));
