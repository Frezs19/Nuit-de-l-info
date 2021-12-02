<?php
session_start();

require_once(dirname(__FILE__).'/../model/listDAO.class.php');

$db = new ListDAO();

$contenu = $_POST['produit'];

//echo var_dump($contenu);

$db->addList($_SESSION["id"],$contenu);

header('Location: ../view/mainpage.view.php');


exit();

?>