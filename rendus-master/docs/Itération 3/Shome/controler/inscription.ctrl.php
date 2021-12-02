<?php
session_start();
require_once(dirname(__FILE__).'/../model/user.class.php');
require_once(dirname(__FILE__).'/../model/userDAO.class.php');

//Récuperation des infos :
$mail = $_POST['email'];
$mdp = $_POST['password'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$tel = $_POST['numtel'];
$adresse = $_POST['adresse'];
$codePostal= $_POST['codepostal'];
$type = $_POST['type'];

//Hachage du mdp :
$mdp =password_hash($mdp,PASSWORD_BCRYPT,['const'=>13]); 

$listUser = new UserDAO();
$listUser->updateUsers();

if($listUser->mailExist($mail) == 1 ){  // Vérification si le mail est deja utilisé.
  echo "Un compte existe déjà avec le mail $mail.";
  $listUser->CloseCon();
}elseif ($listUser->telExist($tel) == 1 ) { // Vérification si le numéro de tel est deja utilisé.
  echo "Numéro de téléphone deja utilisé.";
  $listUser->CloseCon();

}else{
  try { //Essaye de créer et d'ajouter un nouveau user a la bd :
    $listUser->addUser($mail,$nom,$prenom,$adresse,$tel,$mdp,$codePostal,$type);
    $listUser->updateUsers();
    $user = $listUser->getUserByMail($mail);
    // Instanciation des variables de session :
    $_SESSION['id'] = $user->getId();
    $_SESSION['nom'] = $user->getNom();
    $_SESSION['prenom'] = $user->getPrenom();
    $_SESSION['type'] = $user->getType();
    $listUser->CloseCon();

    header('Location: ../view/mainpage.view.php');
    exit();
  } catch (\Exception $e) {
    throw new \Exception("Erreur lors de la création du compte.", 1);
  }
}

 ?>
