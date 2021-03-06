<!DOCTYPE html>
<html lang="en">

<head>
  <title>Shome - Mon profil</title>
  <link rel="icon" href="../view/img/logo.png" />
  <link rel="shortcut icon" href="../view/img/logo.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../view/css/profil.css">
  <link rel="stylesheet" href="../view/fonts/fonts.css">
  <link href="../view/css/hamburgers-master/dist/hamburgers.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../view/js/main.js"></script>
</head>

<body>

  <nav class="navbar navbar-expand-md justify-content-right" id="menu">
    <!-- Brand -->
    <a class="navbar-brand" href="../view/mainpage.view.php">
      <img src="../view/img/logo.png" class="logo-sm">
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

  <div id="titre">
    <h1>Mon Profil</h1>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="profil ">
        
        <img src="../view/img/user.png" class="logo-md">
        <h1>Mon compte</h1>
        
        <form action="modifierProfil.controler.php" method="post">
          <label for="nom">Nom</label><br>
          <input type="text" name="nom" class="input" value=<?=$user->getNom()?> readonly><br>

          <label for="prenom">Prenom</label><br>
          <input type="text" name="prenom" class="input" value=<?=$user->getPrenom()?> readonly><br>

          <label for="email">Adresse Email</label><br>
          <input type="email" name="email" class="input" value=<?=$user->getMail()?> readonly><br>

          <label for="tel">T??l??phone</label><br>
          <input type="tel" name="tel" class="input" value=<?=$user->getTel()?> readonly><br>

          <label for="codepostal">Code postal</label><br>
          <input type="number" name="codepostal" class="input" value=<?=$user->getCodePostal()?> readonly><br>

          <label for="adresse">Adresse</label><br>
          <input type="text" name="adresse" class="input" value="<?=$user->getAdresse()?>" readonly><br>

          <input type="submit" value="Modifier" id="Modifier">
        </form>
        <form action="../controler/supprimerCompte.ctrl.php" onsubmit="return confirm('Etes vous s??r de vouloir supprimer votre compte ? Cette action effacera toutes vos informations de notre base de donn??es et sera irr??versible.');">
          <input type="submit" value="Supprimer mon compte" id="Modifier">
        </form>
      </div>
    </div>
  </div>

  <footer>
    <a href=""><img src="../view/img/logo_blanc.png" class="logo-sm"></a>
    <a href="mailto:projet.M3301@outlook.fr?subject=A%20propos%20de%20Shome">Nous contacter</a>
    <a href="../view/credit.view.php">Cr??dits Illustrations</a>
    <a href="../view/charte.view.php">Charte d'utilisation</a>
    <a href="../view/CGU.view.php">CGU</a>
</footer>

</body>

</html>
