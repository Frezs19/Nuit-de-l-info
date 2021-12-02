<?php
session_start();

require_once(dirname(__FILE__).'/../model/listDAO.class.php');

$db = new ListDAO();

$idListe = $_GET["idListe"];
$action=$_GET["action"];

switch($action){
    case "supprimerFavoris":
        $db->supprimerFavoris($idListe);
        break;
    case "ajouterFavoris":
        $db->ajouterFavoris($idListe);
        break;
    case "confirmerLivraison":
        $db->terminerListe($idListe);
        break;
    case "posterListe":
        $contenu = $_POST['produit'];
        $db->addList($_SESSION["id"],$contenu);
        break;
    case "accepterListe":
        $idBenevole=$_SESSION["id"];
        $db->accepterListe($idBenevole,$idListe);
        break;
    case "supprimerListe":
        $db->supprimerListe($idListe);
        break;
    case "modifierListe":
        $contenu = $_POST['produit'];
        $db->updateList($idListe,$contenu);
        break;
    case "annulerListe":
        $idBenevole=$_SESSION["id"];
        $db->annulerListe($idBenevole,$idListe);
        break;
    default:
        header('Location: mesListes.ctrl.php');
}


header('Location: mesListes.ctrl.php');


?>