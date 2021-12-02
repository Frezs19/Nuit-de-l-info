<?php
session_start();
require_once(dirname(__FILE__).'/../model/listProduits.class.php');
require_once(dirname(__FILE__).'/../model/listDAO.class.php');
require_once(dirname(__FILE__).'/../model/userDAO.class.php');
require_once(dirname(__FILE__).'/../model/view.class.php');
require_once(dirname(__FILE__).'/../model/user.class.php');

$db = new ListDAO();
$userDAO = new userDAO();

//récuperation de l'id du user :
$id=$_SESSION["id"];
$currentUser = $userDAO->getUserById($id);

setlocale(LC_ALL,'fr_FR.utf8','fra');

$annonces = array();


$view = new View();

if(isset($_POST['tel'])&& $_POST['tel'] != $currentUser->getTel()){ // Si le tel a été modifier alors le mettre a jour dans la bd :
    $tel = $_POST['tel'];
    $userDAO->modifTel($tel,$currentUser);
}
if(isset($_POST['adresse'])&& $_POST['adresse'] != $currentUser->getAdresse()){ // Si l'adresse a été modifier alors le mettre a jour dans la bd :
    $adresse = $_POST['adresse'];
    $userDAO->modifAdresse($adresse,$currentUser);
}
if(isset($_POST['codepostal'])&& $_POST['codepostal'] != $currentUser->getCodePostal()){ // Si le code postal a été modifier alors le mettre a jour dans la bd :
    $codePostal= $_POST['codepostal'];
    $userDAO->modifCodePostal($codePostal,$currentUser);
}
if(isset($_POST['mdp']) && ($_POST['mdp'] =! 1)){ // Si le mot de passe a été modifier alors le mettre a jour dans la bd :
    $mdp= $_POST['mdp'];
    $mdp =password_hash($mdp,PASSWORD_BCRYPT,['const'=>13]);
    $userDAO->modifMdp($mdp,$currentUser);
}

if(isset($_POST['mdp']) && isset($_POST['mdp'])!= null ){
    $mdp= $_POST['mdp'];
    $mdp =password_hash($mdp,PASSWORD_BCRYPT,['const'=>13]);
}

if(isset($_POST['Nmdp']) && $_POST['Nmdp'] != "" && $_POST['Amdp'] != ""){
    $Amdp= $_POST['Amdp'];
    $Nmdp= $_POST['Nmdp'];
    if(password_verify($Amdp,$currentUser->getMdp())){
        $Nmdp =password_hash($Nmdp,PASSWORD_BCRYPT,['const'=>13]);
        $userDAO->modifMdp($Nmdp,$currentUser);
    }

}


$currentUser = $userDAO->getUserById($id);
$view->assign("user",$currentUser);

$view->display('modifierProfil.view.php');

?>
