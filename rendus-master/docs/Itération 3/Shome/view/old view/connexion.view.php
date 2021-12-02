<?php
session_start();
$url = '../controler/connexion.controler.php';


 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connection</title>
  </head>
  <body>
    <h1>Connexion</h1>
    <form class="" action=<?php echo $url ?> method="post">
      <table border="1" cellspacing="1" cellpadding="2">
        <tr><td> <b>Email </b></td><td> <input type="email" name="mail" value=""> </td></tr>
        <tr><td> <b>Mot de passe </b></td><td> <input type="password" name="mdp" value=""> </td></tr>
      </table>
        <input type="submit" name="button" value="Valider">
    </form>
  </body>
</html>
