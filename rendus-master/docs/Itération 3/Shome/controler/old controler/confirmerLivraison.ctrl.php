<?php
session_start();

require_once(dirname(__FILE__).'/../model/listDAO.class.php');

$db = new ListDAO();

$idListe=$_GET["id"];

$db->terminerListe($idListe);

header('Location: mesListes.ctrl.php');


?>