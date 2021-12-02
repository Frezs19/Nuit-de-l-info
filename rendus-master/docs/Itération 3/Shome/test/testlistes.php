<?php
require_once(dirname(__FILE__).'/../model/listProduits.class.php');
require_once(dirname(__FILE__).'/../model/listDAO.class.php');
$listLists = new ListDAO();
$listLists->updateLists();
try {
  $listLists->addList(1,'Pain?Brioche|jambon|riz');
  echo 'insertion réussi';
} catch (\Exception $e) {
  echo 'erreur';
}



 ?>
