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
  <h1><b>Conditions générales d'utilisation du site Shome</b></h1>
  <section class="preambule">
    <h3><b>Préambule</b></h3>
    <p>Les présentes conditions générales d'utilisation sont conclues entre :<br>
        &nbsp;&nbsp;&nbsp;- le gérant du site internet, ci-après désigné « l’Éditeur »,<br>
        &nbsp;&nbsp;&nbsp;- toute personne souhaitant accéder au site et à ses services, ci-après appelé « l’Utilisateur ».</p>
  </section>

  <section class="article 1">
      <h3><b>Article 1 - Principes </b></h3>
        <p>Les présentes conditions générales d'utilisation ont pour objet l'encadrement juridique de l’utilisation du site Shome et de ses services.<br>
          Le site Internet shome est un service : </p>
        <ul>
            <li>d'aide à la personne</li>
            <li>située à Grenoble, France</li>
            <li>adresse URL du site : 2.7.7.134/</li>
            <li>Email : projet.M3301@outlook.fr</li>
        </ul>
        <p>Les conditions générales d'utilisation doivent être acceptées par l'Utilisateur lors de son inscription.</p>
  </section>

  <section class="article 2">
        <h3><b>Article 2 - Evolution et durée des CGU</b></h3>
        <p>Les présentes conditions générales d'utilisation sont conclues pour une durée indéterminée. Le contrat produit ses effets à l'égard de l'Utilisateur à compter du début de l’utilisation du service.<br>
          Le site Shome se réserve le droit de modifier les clauses de ces conditions générales d’utilisation à tout moment et sans justification.</p>
  </section>

  <section class="article 3">
        <h3><b>Article 3 - Accès au site</b></h3>
        <p>Tout Utilisateur ayant accès à internet peut accéder gratuitement et depuis n’importe où au site Shome. Les frais supportés par l’Utilisateur pour y accéder (connexion internet, matériel informatique, etc.) ne sont pas à la charge de l’Éditeur.<br>
        Le site et ses différents services peuvent être interrompus ou suspendus par l’Éditeur, notamment à l’occasion d’une maintenance, sans obligation de préavis ou de justification.</p>
  </section>

  <section class="article 4">
        <h3><b>Article 4  - Responsabilités </b></h3>
        <p>La responsabilité de l'Éditeur ne peut être engagée en cas de défaillance, panne, difficulté ou interruption de fonctionnement, empêchant l'accès au site ou à une de ses fonctionnalités.<br>
        Le matériel de connexion au site utilisée est sous l'entière responsabilité de l'Utilisateur qui doit prendre toutes les mesures appropriées pour protéger le matériel et les données notamment d'attaques virales par Internet. L'utilisateur est par ailleurs le seul responsable des sites et données qu'il consulte.</p>

        <p>L'Éditeur n'est pas responsable des dommages causés à l'Utilisateur, à des tiers et/ou à l'équipement de l'Utilisateur du fait de sa connexion ou de son utilisation du site et l'Utilisateur renonce à toute action contre l'Éditeur de ce fait.<br>
        Si l'Éditeur venait à faire l'objet d'une procédure amiable ou judiciaire à raison de  l'utilisation du site par l'Utilisateur, il pourra retourner contre lui pour obtenir indemnisation de tous les préjudices, sommes, condamnations et frais qui pourraient découler de cette procédure.</p>

  </section>

  <section class="article 5">
        <h3><b>Article 5  - Propriété intellectuelle</b></h3>
        <p>Tous les documents techniques, produits, photographies, textes, logos, dessins, vidéos, etc., sont soumis à des droits d'auteur et sont protégés par le Code de la propriété intellectuelle. Lorsqu'ils sont remis à nos clients, ils demeurent la propriété exclusive de Shome, seul titulaire des droits de propriété intellectuelle sur ces documents, qui doivent lui être rendus à sa demande.<br>
        Nos clients s'engagent à ne faire aucun usage de ces documents, susceptible de porter atteinte aux droits de propriété industrielle ou intellectuelle du fournisseur et s'engagent à ne les divulguer à aucun tiers, en dehors d'une autorisation expresse et préalable donnée par l'Editeur.</p>
  </section>

  <section class="article 6">
        <h3><b>Article 6  - Liens hypertextes</b></h3>
        <p>La mise en place par l'Utilisateur de tous liens hypertextes vers tout ou partie du site est strictement interdite.</p>
  </section>

  <section class="article 7">
        <h3><b>Article 7 - Protection des données personnelles</b></h3>
        <article class="Données collectées">
          <h4>Données collectées </h4>
          <p>Les données à caractère personnel qui sont collectées sur ce site sont les suivantes :<br>
              &nbsp;&nbsp;&nbsp;-<b>ouverture du compte :</b> lors de la création du compte de l'utilisateur : nom; prenom; adresse mail; numero de telephone; adresse géographique; code postal;<br>
              &nbsp;&nbsp;&nbsp;-<b>connexion :</b> lors de la connexion de l'utilisateur au site web, celui-ci enregistre, notamment, son adresse mail ainsi que son mot de passe.<br>
              &nbsp;&nbsp;&nbsp;-<b>profil :</b> l'utilisation des prestations prévues sur le site web permet de renseigner un profil, pouvant comprendre une adresse et un numéro de téléphone ;<br>
              &nbsp;&nbsp;&nbsp;-<b>cookies :</b>  les cookies sont utilisés, dans le cadre de l'utilisation du site. L'utilisateur a la possibilité de désactiver les cookies à partir des paramètres de son navigateur.</p>
        </article>

        <article class="Utilisation des données personnelles ">
          <h4>Utilisation des données personnelles </h4>
          <p>Les données personnelles collectées auprès des utilisateurs ont pour objectif la mise à disposition des services du site web, leur amélioration et le maintien d'un environnement sécurisé. Plus précisément, les utilisations sont les suivantes :<br>
              &nbsp;&nbsp;&nbsp;- accès et utilisation du site web par l'utilisateur;<br>
              &nbsp;&nbsp;&nbsp;- gestion du fonctionnement et optimisation du site web;<br>
              &nbsp;&nbsp;&nbsp;- proposition à l'utilisateur de la possibilité de communiquer avec d'autres utilisateurs du site web ;
          </p>
        </article>

        <article class="Sécurité et confidentialité">
          <h4>Sécurité et confidentialité </h4>
          <p>Le site web met en oeuvre des mesures organisationnelles, techniques, logicielles et physiques en matière de sécurité du numérique pour protéger les données personnelles contre les altérations,
            destructions et accès non autorisés. Toutefois, il est à signaler qu'internet n'est pas un environnement complètement sécurisé et le site web ne peut pas garantir la sécurité de la transmission ou du stockage des informations sur internet.</p>
        </article>

        <article class="Mise en oeuvre des droits des utilisateurs">
          <h4>Mise en oeuvre des droits des utilisateurs</h4>
          <p>En application de la réglementation applicable aux données à caractère personnel, les utilisateurs disposent des droits suivants : </p>
          <ul>
              <li>le droit d’accès : ils peuvent exercer leur droit d'accès, pour connaître les données personnelles les concernant. Dans ce cas, avant la mise en œuvre de ce droit, le site web peut demander une preuve de l'identité de l'utilisateur afin d'en vérifier l'exactitude. </li>
              <li>le droit de rectification : si les données à caractère personnel détenues par le site web sont inexactes, ils peuvent demander la mise à jour des informations.</li>
              <li>le droit de suppression des données : les utilisateurs peuvent demander la suppression de leurs données à caractère personnel, conformément aux lois applicables en matière de protection des données. </li>
              <li>le droit de s’opposer au traitement des données : les utilisateurs peuvent s’opposer à ce que ses données soient traitées conformément aux hypothèses prévues par le RGPD.  </li>
              <li>le droit à la portabilité : ils peuvent réclamer que le site web leur remette les données personnelles qui lui sont fournies pour les transmettre à un nouveau site web.</li>
          </ul>
        </article>
  </section>

  <section class="article 8">
    <h3>Article 8  - Cookies</h3>
    <p>Le site Shome peut collecter automatiquement des informations standards. Toutes les informations collectées indirectement ne seront utilisées que pour suivre le volume, le type et la configuration du trafic utilisant ce site, pour en développer la conception et l'agencement et à d'autres fins administratives et de planification et plus généralement pour améliorer le service que nous vous offrons.</p>
  </section>

</div>


  <section class='charte-client'>

  </section>

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
