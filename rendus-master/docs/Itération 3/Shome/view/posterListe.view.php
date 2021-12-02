<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Shome - Ma nouvelle liste</title>
  <link rel="icon" href="img/logo.png" />
  <link rel="shortcut icon" href="img/logo.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/posterListe.css">
  <link rel="stylesheet" href="fonts/fonts.css">
  <link href="css/hamburgers-master/dist/hamburgers.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/posterListe.js"></script>
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

  <div>
    <div id="titre">
      <img src="img/liste.png" id="liste">
      <h1>Ma nouvelle liste</h1>
    </div>
  </div>

  <form action="../controler/gestionListes.ctrl.php?action=posterListe" method="post">
    <div id="listeProduit">
      <div class="produit" id="produit1">
        <div class="center">
          <input type="text" name="produit[1][principal][nom]"  placeholder="Nom du produit *" autofocus required class="input">
          <input type="text" name="produit[1][principal][marque]" placeholder="Marque du produit" class="input">
        </div>

        <div class="center">
          <input type="number" name="produit[1][principal][prixMax]" placeholder="Prix maximum en € *" required class="input">
          <input type="text" name="produit[1][principal][quantite]" placeholder="Quantité désiré" class="input">
        </div>

        <div class="center substituants">
          <input type="text" name="produit[1][substituant][nom]" placeholder="Nom du substituant *" autofocus class="input substituant">
          <input type="text" name="produit[1][substituant][marque]" placeholder="Marque du substituant" class="input substituant">
        </div>

        <div class="center substituants ">
          <input type="number" name="produit[1][substituant][prixMax]" placeholder="Prix maximum en € *" class="input substituant">
          <input type="text" name="produit[1][substituant][quantite]" placeholder="Quantité désiré" class="input substituant">
        </div>

        <div class="center">
          <div class="substituer" onclick="afficherSubstituant(1);" id="buttons1">
            <span class="tooltiptext">Vous pouvez ajouter un produit "substitut" que le bénévole pourra acheter dans le cas où votre premier choix n'est pas disponible</span>
            <img src="img/shuffle.png" class="logo-sm">
            <p>Substituer ?</p>
          </div>
          <div class="supprimerSubstituant" id="subdel1" onclick="supprimerSubstituant(1);">
            <img src="img/wrong.png" class="logo-sm">
          </div>
          <div class="supprimerProduit" id="subproduit1" onclick="supprimerProduit(1);">
            <img src="img/bin.png" class="logo-sm">
          </div>
        </div>
      </div>  
    </div>

    <div class="ajouterProduit" onclick="ajouterProduit();">
      <img src="img/add-button.png" class="logo-sm">
      <p>Ajouter un produit</p>
    </div>

    <input type="submit" value="Poster ma liste de course" id="boutonPoster">
  </form>

  <footer>
    <a href=""><img src="../view/img/logo_blanc.png" class="logo-sm"></a>
    <a href="mailto:projet.M3301@outlook.fr?subject=A%20propos%20de%20Shome">Nous contacter</a>
    <a href="../view/credit.view.php">Crédits Illustrations</a>
    <a href="../view/charte.view.php">Charte d'utilisation</a>
    <a href="../view/CGU.view.php">CGU</a>
</footer>

</body>

</html>
