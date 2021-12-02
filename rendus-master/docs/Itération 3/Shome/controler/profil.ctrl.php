<?php
session_start();

require_once(dirname(__FILE__).'/../model/listProduits.class.php');
require_once(dirname(__FILE__).'/../model/listDAO.class.php');
require_once(dirname(__FILE__).'/../model/userDAO.class.php');
require_once(dirname(__FILE__).'/../model/view.class.php');

$db = new ListDAO();
$userDAO = new userDAO();

$id=$_SESSION["id"];
$currentUser = $userDAO->getUserById($id);

$view = new View();

$view->assign("user",$currentUser);

$view->display('profil.view.php');

?>
