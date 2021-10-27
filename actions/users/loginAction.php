<?php
session_start();
require('actions/database.php');

// Validation du formulaire
if(isset($_POST['validate'])) { // isset = Vérifie si cette variable POST existe

  // Vérifier si l'user a bien complété tous les champs
  if(!empty($_POST['pseudo']) AND !empty($_POST['password'])) { // empty = Vérifie si cette variable POST n'est pas vide (!)
    
    // Les données de l'user
    $user_pseudo = htmlspecialchars($_POST['pseudo']);
    $user_password = htmlspecialchars($_POST['password']);

    // Vérifier si l'utilisateur existe (si le pseudo est correct)
    $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
    $checkIfUserExists->execute(array($user_pseudo));

  if($checkIfUserExists->rowCount() > 0) {

      // Récupérer les données de l'utilisateur
      $usersInfos = $checkIfUserExists->fetch();
      // Vérifier si le mot de passe est correct
      if(password_verify($user_password, $usersInfos['mdp'])) {
        session_start();
        // Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales Sessions
        $_SESSION['auth'] = true;
        $_SESSION['id'] = $usersInfos['id_users'];
        $_SESSION['lastname'] = $usersInfos['nom'];
        $_SESSION['firstname'] = $usersInfos['prenom'];
        $_SESSION['pseudo'] = $usersInfos['pseudo'];

        // Rediriger l'utilisateur vers la page d'accueil
        header('Location: index.php');

      }else {
        $errorMsg = "Votre pseudo ou votre mot de passe est incorrect";
      }

  }else {

    $errorMsg = "Votre pseudo ou votre mot de passe est incorrect";

   }


  }else {
    $errorMsg = "Veuillez compléter tous les champs";
  }

}
