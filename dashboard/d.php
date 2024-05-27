<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styl.css"> 
   
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="boxicons/css/boxicons.min.css" rel="stylesheet">
    <style>
      .session-info{
        margin-left: 700px;
      }
      .logout-button{
        color: white;
        background-color: #004AAD;
        
        border-radius: 10px;
        text-align: center;
      }
      .logout-butto{
        color: white;
        background-color: #004AAD;
        margin-left: 50px;
        border-radius: 10px;
        text-align: center;
      }
      .welcome-message{
        font-size: 20px;
      }
    </style>
</head>
<body >


   
  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="logo2.png" alt="" class="img-fluid rounded-circle">
        <h1 class="text-white"><a href="">DASHBOARD</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="../Accueil1.html" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="d.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Profil</span></a></li>
          <!-- <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li> -->
          <li><a href="maintenancieradmin.html" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Maintenancier</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav>
    </div>
  </header>
  <main id="hero">
    <div class="hero-container">
    <div class="main">
        <h2 class="pro "> MON PROFIL</h2>
        <div class="profil">
        <?php

session_start(); // Démarrer la session

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['email'])) {
    // Afficher un message de bienvenue et un bouton de déconnexion
    echo "<p class='session-info'>"; 
        echo "<span class='welcome-message'>Bienvenue " . $_SESSION['email'] . " !</span>"; 
        echo "<button class='logout-butto' ><a href='../Se connecter/logout.php' class='logout-button'> Déconnexion</a></button>"; 
    echo "</p>";
    
    if (isset($errorMessage)) {
        echo "<p class='error'>$errorMessage</p>";
    }
}

?>


             <div class="profil-info">
  
                <form class="formulaire-1">
                    <div class="drop-zone">
                        <div class="tr"></div>
                      <span class="drop-zone__prompt m-3 ">Glisser /Deposer</span>        
                      <input type="file" name="" class="drop-zone__input">
                    </div>
                    <div class="formulaire">
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" placeholder="Name" required><br>
                    <label for="surnom">Prénom:</label>
                    <input type="text" id="surnom" name="surnom" placeholder="Surname" required><br>
                    <label for="adresse">Localisation:</label>
                    <input type="text" id="adresse" name="adresse" placeholder="Adresse" required><br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Email" required><br>
                    <label for="password">Mot de passe:</label>
                    <input type="password" id="password" name="passwoard" placeholder="Password" required><br>
                    <input type="submit" class="valide" value="Valider" >
                </div>
                </form>
            </div>
        </div>
        </div> 
</div>
</div>

  </main>
  <script src="js.js"></script>
</body>
</html>