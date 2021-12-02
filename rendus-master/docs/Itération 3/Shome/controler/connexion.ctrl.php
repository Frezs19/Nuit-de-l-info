<?php
session_start();
require_once(dirname(__FILE__).'/../model/user.class.php');
require_once(dirname(__FILE__).'/../model/userDAO.class.php');

// Instantiation des variables :
$mail = $_POST['email'];
$mdp = $_POST['password'];
$listUser = new UserDAO();
$listUser->updateUsers();
$users = $listUser->getUsers();
$success=false;
//Cherche dans tout les users lequel correspond à ($mail,$mdp) :
foreach ($users as $user) {
  if ($user->getMail() == $mail && password_verify($mdp,$user->getMdp())){
      $id = $user->getId();
      $_SESSION['id'] = $id;
      $_SESSION['nom'] = $user->getNom();
      $_SESSION['prenom'] = $user->getPrenom();
      $_SESSION['type'] = $user->getType();
      $success=true;
  }
}
// Connexion ou notification d'erreur :
if ($success){
  header('Location: ../view/mainpage.view.php');
}else{
  header('Location: ../view/mainpage.view.php?login=failed');
}

$listUser->CloseCon();
exit();
?>
