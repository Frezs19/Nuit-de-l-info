<?php
session_start();

require_once(dirname(__FILE__).'/../model/listProduits.class.php');
require_once(dirname(__FILE__).'/../model/listDAO.class.php');
require_once(dirname(__FILE__).'/../model/userDAO.class.php');
require_once(dirname(__FILE__).'/../model/view.class.php');

$db = new ListDAO();
$userDAO = new userDAO();

$idBenevole=$_GET["idBenevole"];

$benevole = $userDAO->getUserById($idBenevole);

$view = new View();

$view->assign("user",$benevole);

$view->display('voirProfil.view.php');

?>
