<?php
session_start();

require_once(dirname(__FILE__).'/../model/listProduits.class.php');
require_once(dirname(__FILE__).'/../model/listDAO.class.php');
require_once(dirname(__FILE__).'/../model/userDAO.class.php');
require_once(dirname(__FILE__).'/../model/view.class.php');

$db = new ListDAO();
$userDAO = new userDAO();

$currentUser = $userDAO->getUserById($_SESSION["id"]);
$listesProches=$db->getListesProches($currentUser->getCodePostal());

setlocale(LC_ALL,'fr_FR.utf8','fra');

$view = new View();

$view->assign("listesProches",$listesProches);

$view->assign("currentUser",$currentUser);

$view->display('consulterListes.view.php');

?>
