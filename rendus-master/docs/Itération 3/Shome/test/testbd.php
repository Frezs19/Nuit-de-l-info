<?php
// Affiche tout les utilisateurs
// Inclusion du modèle
require_once(dirname(__FILE__).'/../model/listProduits.class.php');
require_once(dirname(__FILE__).'/../model/listDAO.class.php');
require_once(dirname(__FILE__).'/../model/user.class.php');
require_once(dirname(__FILE__).'/../model/userDAO.class.php');
$listUser = new UserDAO();
$listUser->updateUsers();

$listLists = new ListDAO();
$listLists->updateLists();

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="design/style.css">
    <title></title>
  </head>
  <body>
    <header>
      <h1> Liste des utilisateurs :</h1>
    </header>
    <p><b>Nombre d'utilisateur :</b> <?php echo $listUser->getNbUsers()?></p>
      <table width="100%" border="1" cellspacing="1" cellpadding="7">
            <tr>
              <td><b> Id_user</b></td>
              <td><b> Mail</b></td>
              <td><b> Nom</b></td>
              <td><b> Prenom</b></td>
              <td><b> Adresse</b></td>
              <td><b> Tel</b></td>
              <td><b> Mdp</b></td>
            </tr>
        <?php foreach ($listUser->getUsers() as $user) : ?>
            <tr>
                <td><?php echo $user->getId();?></td>
                <td><?php echo $user->getMail();?></td>
                <td><?php echo $user->getNom();?></td>
                <td><?php echo $user->getPrenom();?></td>
                <td><?php echo $user->getAdresse();?></td>
                <td><?php echo $user->getTel();?></td>
                <td><?php echo $user->getMdp();?></td>
            </tr>
        <?php endforeach; ?>
      </table>
      <h1> Liste des listes :</h1>
    </header>
    <p><b>Nombre de listes :</b> <?php echo $listLists->getNbLists()?></p>
      <table width="100%" border="1" cellspacing="1" cellpadding="7">
            <tr>
              <td><b> Id_List</b></td>
              <td><b> ID_User</b></td>
              <td><b> Date Creation</b></td>
              <td><b> Date Modification</b></td>
              <td><b> Etat</b></td>
              <td><b> Favoris</b></td>
              <td><b> Liste</b></td>
            </tr>
        <?php foreach ($listLists->getLists() as $list) : ?>
            <tr>
                <td><?php echo $list->getIdList();?></td>
                <td><?php echo $list->getIdUser();?></td>
                <td><?php echo $list->getDateCreation();?></td>
                <td><?php echo $list->getDateModification();?></td>
                <td><?php echo $list->getEtat();?></td>
                <td><?php echo $list->getFavoris();?></td>
                <td><?php echo $list->getListProduits();?></td>
            </tr>
        <?php endforeach; ?>
      </table>
  </body>
</html>
