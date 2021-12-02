<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Shome - CGU</title>
  <link rel="icon" href="img/logo.png" />
  <link rel="shortcut icon" href="img/logo.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/CGU.css">
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
          <a class="nav-link" onclick="openConnexionWindow();" id="boutonConnexion">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inscription.view.php" id="boutonInscription">Inscription</a>
        </li>
      <?php endif; ?>
      </ul>
    </div>
  </nav>

  <!-- Fenetre de connexion-->
  <div id="connexionWindow" style="height: 0em;">
    <form action="../controler/connexion.ctrl.php" method="post">
      <div>
        <label for="email" class="idLabel">Identifiant</label><br>
        <input type="text" id="email" name="email" placeholder="Email" class="identifiants">
      </div>

      <div>
        <label for="password" class="idLabel">Mot de passe</label><br>
        <input type="password" id="password" name="password" placeholder="Mot de passe" class="identifiants">
      </div>

      <input type="submit" value="Se connecter" id="connectButton">
      <a href=""><span>Mot de passe oublié ?</span></a>
    </form>
  </div>


<div class="CGU">
  <h1><b>Crédits des illustrations</b></h1>
  <section class="article 1">
        Icônes fait par <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> de <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> : 
        <br><img src="img/shuffle.png"class="logo-md">
        <img src="../view/img/bin.png"class="logo-md">
        <img src="../view/img/wrong.png"class="logo-md">
        <img src="../view/img/add-button.png"class="logo-md">
        <img src="../view/img/charity.png"class="logo-md">
        <img src="../view/img/euro.png"class="logo-md">
        <img src="../view/img/multiple.png"class="logo-md">
        <img src="../view/img/placeholder.png"class="logo-md">
        <img src="../view/img/shield.png"class="logo-md">
        <img src="../view/img/user.png"class="logo-md">
        <img src="../view/img/wrong.png"class="logo-md">
        <img src="../view/img/liste.png"class="logo-md">
        <img src="../view/img/star.png"class="logo-md">
        <br>Vecteur de fond créé par  <a href="https://www.freepik.com/vectors/background">macrovector - www.freepik.com</a> : 
        <br><img src="../view/img/food.jpg" class="logo-md">
        <br>Illustration créé par <a href="https://www.freepik.com/vectors/cartoon">vectorjuice - www.freepik.com</a> :
        <br><img src="../view/img/team.png">
        <br>
        Icônes fait par <a href="https://www.flaticon.com/authors/vectors-market" title="Vectors Market">Vectors Market</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> : 
        <br><img src="../view/img/speech-bubble.png" class="logo-md">
  </section>

<footer>
    <a href=""><img src="../view/img/logo_blanc.png" class="logo-sm"></a>
    <a href="mailto:projet.M3301@outlook.fr?subject=A%20propos%20de%20Shome">Nous contacter</a>
    <a href="../view/credit.view.php">Crédits Illustrations</a>
    <a href="../view/charte.view.php">Charte d'utilisation</a>
    <a href="../view/CGU.view.php">CGU</a>
</footer>

</body>

</html>
