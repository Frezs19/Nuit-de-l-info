<?php
session_start();

require_once(dirname(__FILE__).'/../model/listDAO.class.php');

$db = new ListDAO();

$idListe=$_GET["id"];
$idBenevole=$_SESSION["id"];

$db->accepterListe($idBenevole,$idListe);

header('Location: mesListes.ctrl.php');


?>