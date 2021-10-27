<?php 
session_start();
// MVC : Model = requetes, View = affichage html, Controller = action et liaison 

require('actions/database.php');

// Validation du formulaire
if(isset($_POST['validate'])) { // isset = Vérifie si cette variable POST existe

  // Vérifier si l'user a bien complété tous les champs
  if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password'])) { // empty = Vérifie si cette variable POST n'est pas vide (!)
    
    // Les données de l'user
    $user_pseudo = htmlspecialchars($_POST['pseudo']);
    $user_lastname = htmlspecialchars($_POST['lastname']);
    $user_firstname = htmlspecialchars($_POST['firstname']);
    $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Vérifier si l'utilisateur existe déjà sur le site
    $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
    $checkIfUserAlreadyExists->execute(array($user_pseudo));

    if($checkIfUserAlreadyExists->rowCount() == 0 ) {

      // Insérer l'utilisateur dans la bdd
      $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, mdp) VALUES(?, ?, ?, ?)');
      $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

      // Récupérer les informations  de l'utilisateur
      $getInfosOfThisUserReq = $bdd->prepare('SELECT id_users, pseudo, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo = ?');
      $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));

      $userInfos = $getInfosOfThisUserReq->fetch();

      // Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales Sessions
      $_SESSION['auth'] = true;
      $_SESSION['id'] = $userInfos['id_users'];
      $_SESSION['lastname'] = $userInfos['nom'];
      $_SESSION['firstname'] = $userInfos['prenom'];
      $_SESSION['pseudo'] = $userInfos['pseudo'];

      // Redirige vers page d'accueil
      header('Location: index.php');

    }else {
      $errorMsg = "L'utilisateur existe déjà sur le site";
    }

  }else {
    $errorMsg = "Veuillez compléter tous les champs";
  }

}
