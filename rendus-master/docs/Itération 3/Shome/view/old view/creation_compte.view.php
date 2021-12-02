<?php
$url = '../controler/creation_compte.controler.php';
$url2 = 'creation_compte.view.php';
if (isset($_SESSION['mail']) && isset($_SESSION['mdp'])) {
  echo "mail : ".$_SESSION['mail']."<br>";
  echo "mdp : ".$_SESSION['mdp']."<br>";
}
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Créer un compte</title>
  </head>
  <body>
    <h1><b> Creation d'un compte :</b></h1>
    <form class="" action=<?php echo $url ?> method="post">
      <table border="1" cellspacing="1" cellpadding="2">
        <tr><td> <b>Email </b></td><td> <input type="email" name="mail" value=""> </td></tr>
        <tr><td> <b>Mot de passe </b></td><td> <input type="password" name="mdp" value=""> </td></tr>
        <tr><td> <b>Nom </b></td><td> <input type="text" name="nom" value=""> </td></tr>
        <tr><td> <b>Prenom </b></td><td> <input type="text" name="prenom" value=""> </td></tr>
        <tr><td> <b>Telephone </b></td><td> <input type="tel" name="tel" value=""> </td></tr>
        <tr><td> <b>Adresse </b></td><td> <input type="text" name="adresse" value=""> </td></tr>
        <tr><td> <b>Code Postal </b></td><td> <input type="text" name="codePostal" value=""> </td></tr>
      </table>
      <input type="submit" name="button" value="Valider">
    </form>
  </body>
</html>
