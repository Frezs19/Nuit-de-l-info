<?php
session_start();

require_once(dirname(__FILE__).'/../model/listDAO.class.php');
require_once(dirname(__FILE__).'/../model/view.class.php');
require_once(dirname(__FILE__).'/../model/user.class.php');

$listDAO = new listDAO();

$id=$_SESSION["id"];

$listDAO->deleteUser($id);

session_destroy();

header('Location: ../view/mainpage.view.php');

?>