<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Shome - Accueil</title>
  <link rel="icon" href="img/logo.png" />
  <link rel="shortcut icon" href="img/logo.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
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

      <?php if (isset($_GET["login"]) && $_GET["login"]=="failed"):?>
        <div>
          <label class="idLabel" id="incorrect">Le mot de passe ou l'email est incorrect</label><br>
        </div>
        <script>openConnexionWindow()</script>
      <?php endif; ?>

      <input type="submit" value="Se connecter" id="connectButton">
      <a href="motPasseOublier.view.php"><span>Mot de passe oublié ?</span></a>
    </form>
  </div>

  <div id="description">
      <h1>Vos courses livrées chez vous par un bénévole</h1>
      <h2>Gratuit, simple et fiable.</h2>
  </div>

  <div class="container-fluid">

    <div class="row justify-content-center fruit" >

      <!-- Div Client -->
      <?php if (isset($_SESSION['id']) && $_SESSION["type"]=="client"): ?>
        <div class="col-md-4 section" id="client" onclick="location.href='posterListe.view.php';">
      <?php elseif(isset($_SESSION['id']) && $_SESSION["type"]=="benevole"): ?>
        <div class="col-md-4 section" id="client" onclick="location.href='posterListe.view.php';" style="display: none">
      <?php else: ?>
        <div class="col-md-4 section" id="client" onclick="openConnexionWindow();">
      <?php endif; ?>
        <h1>Je veux poster une annonce</h1>
        <img src="img/liste.png" id="liste">
        <h2>1</h2>
        <p>Je me connecte ou m'inscrit si ce n'est pas encore fait</p>
        <h2>2</h2>
        <p>Je poste une annonce</p>
        <h2>3</h2>
        <p>Un bénévole prend en charge ma commande et me livre</p>
        <h2>4</h2>
        <p>Je rembourse le bénévole et je confirme la livraison</p>
      </div>


      <!-- Div Benevole  -->
      <?php if (isset($_SESSION['id']) && $_SESSION["type"]=="benevole"): ?>
        <div class="col-md-4 section" id="benevole" onclick="location.href='../controler/consulterListes.ctrl.php';">
      <?php elseif(isset($_SESSION['id']) && $_SESSION["type"]=="client"): ?>
        <div class="col-md-4 section" id="benevole" onclick="location.href='../controler/consulterListes.ctrl.php';" style="display: none">
      <?php else: ?>
        <div class="col-md-4 section" id="benevole" onclick="openConnexionWindow();">
      <?php endif; ?>
        <h1>Je suis bénévole</h1>
        <img src="img/charity.png" id="charity">
        <h2>1</h2>
        <p>Je me connecte ou m'inscrit si ce n'est pas encore fait</p>
        <h2>2</h2>
        <p>Je consulte les annonces</p>
        <h2>3</h2>
        <p>Je choisis une annonce et je la livre</p>
        <h2>4</h2>
        <p>Une fois remboursé, je confirme la livraison</p>
      </div>

    </div>

    <h1 id ="whyUseTitle">Pourquoi utiliser Shome ?</h1>
    <div class="row whyUse">
      <div class="class-sm-4 arg">
        <img src="img/multiple.png" alt="Choix multiple" class="logo-md">
        <h1>Personnalisable</h1>
        <p>Commandez où vous voulez !</p>
      </div>

      <div class="class-sm-4 arg">
        <img src="img/euro.png" alt="Euro" class="logo-md">
        <h1>Gratuit</h1>
        <p>La livraison est faite par un bénévole donc gratuite !</p>
      </div>

      <div class="class-sm-4 arg">
        <img src="img/shield.png" alt="bouclier" class="logo-md">
        <h1>Fiable</h1>
        <p>Tout les bénévoles sont gérés exclusivement par l'association ""</p>
      </div>
    </div>

    <div class="row justify-content-center aboutUs">
      <div class="col-lg-6 d-flex justify-content-center">
        <img src="img/team.png" id="team">
      </div>

      <div class="col-lg-6" id="titleAboutUs">
        <h1>Qui sommes-nous ?</h1>
        <h2>On se présente !</h2>
      </div>
    </div>

    <div class="aboutUs">
        <p id="presentation">
          Nous sommes un groupe de 6 étudiants en IUT Informatique à l'université Grenoble Alpes.
          Nous avons lancé ce site web dans le cadre d'un projet de fin d'étude. Ce projet nous tient à coeur
          car il permet d'aider des personnes dans le besoin (particulièrement pendant la période du Covid).
        </p>
    </div>

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
