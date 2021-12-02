<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Shome - Inscription
  </title>
  <link rel="icon" href="img/logo.png" />
  <link rel="shortcut icon" href="img/logo.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/inscription.css">
  <link rel="stylesheet" href="fonts/fonts.css">
  <link href="css/hamburgers-master/dist/hamburgers.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</head>

<body>

  <nav class="navbar navbar-expand-md justify-content-right" id="menu">
    <!-- Brand -->
    <a class="navbar-brand" href="mainpage.view.php">
      <img src="img/logo.png" class="logo-sm">
    </a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler hamburger hamburger--spin" type="button" data-toggle="collapse"
      data-target="#collapsibleNavbar" onClick="hamburgerClick();" id="hamburger">
      <span class="navbar-toggler-icon hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <span class="navbar-text mr-auto" id="navbarTitre">
        Shome
      </span>
      <ul class="navbar-nav">
        <?php if (isset($_SESSION['id'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="../controler/mesListes.ctrl.php" id="boutonListes">Mes listes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../controler/profil.ctrl.php"><?php echo $_SESSION["prenom"].' '.$_SESSION["nom"]?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../controler/deconnexion.ctrl.php">Deconnexion</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" onclick="InscriptionToConnexion();" id="boutonConnexion">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inscription.view.php" id="boutonInscription">Inscription</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>

<div class="page">
  <div id="titre">
    <h1>Inscription</h1>
  </div>

  <form action="../controler/inscription.ctrl.php" method="post">
    <img src="../view/img/user.png" class="logo-md">

    <label for="nom" class="idLabel">Nom (*)</label><br>
    <input type="text" id="nom" name="nom" placeholder="Nom"  class="nom" required><br>

    <label for="prenom" class="idLabel">Prénom (*)</label><br>
    <input type="text" id="prenom" name="prenom" placeholder="Prénom"  class="prenom" required><br>

    <label for="email" class="idLabel">E-mail (*)</label><br>
    <input type="email" id="email" name="email" placeholder="Exemple : abd@exemple.com"  class="email" required><br>

    <label for="numtel" class="idLabel">Numéro de télephone (*)</label><br>
    <input type="tel" id="numtel" name="numtel" placeholder="Exemple : 06 66 66 66 66"  class="numtel" required pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" title="Format : 06 66 66 66 66"><br>

    <label for="password" class="idLabel">Mot de passe (*)</label><br>
    <input type="password" id="password" name="password" placeholder="Mot de passe" class="identifiants" required onkeyup="confirmerMDP();"><br>

    <label for="confirmPassword" class="idLabel">Confirmer le mot de passe (*)</label><br>
    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Mot de passe" class="identifiants" required onkeyup="confirmerMDP();"><br>

    <label for="adresse" class="idLabel">Adresse (*)</label><br>
    <input type="adresse" id="adresse" name="adresse" placeholder="Exemple : 3, rue de l'imagination, Grenoble" required><br>

    <label for="codepostal" class="idLabel">Code Postal (*)</label><br>
    <input type="text" id="codepostal" name="codepostal" placeholder="Code postal" class="codepostal" required pattern="[0-9]{2}(?:\s|)[0-9]{3}" title="Format : 38000"><br>

    <label for="type" class="idLabel">Client ou Bénévole</label><br>
    <select id="type" name="type">
      <option value="benevole">Benevole</option>
      <option value="client">Client</option>
    </select>

    <label for="cgu" class="idLabel">Je certifie avoir plus de 18 ans et accepte les <a target="_blank" href="../view/CGU.view.php">CGU</a> et la <a target="_blank" href="../view/charte.view.php">Charte d'utilisation</a></label><br>
    <input type="checkbox" name="cgu" id="cgu" required>

    <input type="submit" value="S'incrire" id="validerInscription">
    <label>Les champs (*) sont obligatoires</label>
  </form>

</div>


<footer>
    <a href=""><img src="../view/img/logo_blanc.png" class="logo-sm"></a>
    <a href="mailto:projet.M3301@outlook.fr?subject=A%20propos%20de%20Shome">Nous contacter</a>
    <a href="../view/credit.view.php">Crédits Illustrations</a>
    <a href="../view/charte.view.php">Charte d'utilisation</a>
    <a href="../view/CGU.view.php">CGU</a>
</footer>

</body>

</html>
