<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Shome - Charte</title>
  <link rel="icon" href="img/logo.png" />
  <link rel="shortcut icon" href="img/logo.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/charte.css">
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
      <a href=""><span>Mot de passe oubli?? ?</span></a>
    </form>
  </div>

<div class="charte-shome">
  <div class="back-img">
    </div>
</div>

<section class="charte">
  <p class='charte-intro'>Afin que les livraisons se fassent dans les meilleurs conditions possibles nous vous demandons de bien respecter ces consignes pour le bien de tous !</p>
  <section class="charte-b??n??vole">
    <h1><b>B??n??vole</b> </h1>
    <section class="charte-b??n??vole1">
      <h3><b>Faire preuve de bonne foi</b></h3>
      <p>Je donne de r??elles informations sur mon profil, j'accepte une liste de courses seulement si je suis s??r de pouvoir la livrer.</p>
    </section>
    <section class="charte-b??n??vole2">
      <h3><b>Etre efficace</b></h3>
      <p>Je m'engage ?? r??aliser les courses dans les meilleurs d??lais possibles.</p>
    </section>
    <section class="charte-b??n??vole3">
      <h3><b>Prendre soin des courses</b></h3>
      <p>Je m???assure de livrer les courses telles qu???elles m???ont ??t?? transmises par le magasin : compl??tes et intactes. Je veille ??galement ?? respecter la cha??ne du froid pour les produits frais et surgel??s.</p>
    </section>
    <section class="charte-b??n??vole4">
      <h3><b>Garder secret les donn??es des personnes livr??es</b></h3>
      <p>je ne fais pas usage des donn??es dont j???ai eu connaissance. Ainsi, je veille ?? ne pas conserver les donn??es transmises par la personne livr??e (adresse postale, num??ro de t??l??phone, adresse e-mail, etc...).</p>
    </section>
  </section>
  <section class="charte-client">
    <h1>Client</h1>
    <section>
      <h3><b>Clair et Pr??cis</b></h3>
      <p>Je remplis ma liste de courses de fa??on claire et pr??cise afin d'??viter tout malentendu avec le b??n??vole.</p>
    </section>
    <section>
      <h3><b>Personne de confiance</b></h3>
      <p>Je paye la somme exacte de ma liste de courses sauf erreur du b??n??vole sachant que ma liste ??tait tr??s claire.</p>
    </section>
  </section>

  </section>

</section>

<footer>
    <a href=""><img src="../view/img/logo_blanc.png" class="logo-sm"></a>
    <a href="mailto:projet.M3301@outlook.fr?subject=A%20propos%20de%20Shome">Nous contacter</a>
    <a href="../view/credit.view.php">Cr??dits Illustrations</a>
    <a href="../view/charte.view.php">Charte d'utilisation</a>
    <a href="../view/CGU.view.php">CGU</a>
</footer>

</body>

</html>
