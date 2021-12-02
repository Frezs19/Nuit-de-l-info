<?php
session_start();

require_once(dirname(__FILE__).'/../model/listDAO.class.php');
require_once(dirname(__FILE__).'/../model/view.class.php');

$db = new ListDAO();

$idListe=$_GET["idListe"];

$liste = $db->getListById($idListe);


$view = new view();
$view->assign("liste",$liste);
$view->display("reposterListe.view.php");

exit();

?>