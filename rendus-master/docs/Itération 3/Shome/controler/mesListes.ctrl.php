<?php
session_start();

require_once(dirname(__FILE__).'/../model/listProduits.class.php');
require_once(dirname(__FILE__).'/../model/listDAO.class.php');
require_once(dirname(__FILE__).'/../model/userDAO.class.php');
require_once(dirname(__FILE__).'/../model/view.class.php');

$db = new ListDAO();
$userDAO = new userDAO();
$view = new View();

$id=$_SESSION["id"];

$currentUser = $userDAO->getUserById($id);
$view->assign("user",$currentUser);

setlocale(LC_ALL,'fr_FR.utf8','fra');


if ($currentUser->getType()=="client"){
    $client=true;
    $listesFavorites=$db->getListesFavorites($id);
    $listesPostees=$db->getListesPostees($id);
    $listesEnCours=$db->getListesEncoursClient($id);
    $listesTerminees=$db->getListesTermineesClient($id);
    $view->assign("listesFavorites",$listesFavorites);
    $view->assign("listesPostees", $listesPostees);
}else{
    $client=false;
    $listesEnCours=$db->getListesEncoursBenevole($id);
    $listesTerminees=$db->getListesTermineesBenevole($id);
}

$view->assign("listesEnCours",$listesEnCours);
$view->assign("listesTerminees", $listesTerminees);
$view->assign("client",$client);
$view->assign("currentUser",$currentUser);

$view->display('mesListes.view.php');

?>