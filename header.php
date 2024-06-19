<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="styl.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link href="assets/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link href="assets/boxicons/css/boxicons.min.css" rel="stylesheet">
   <style>
    .btn-primary{
    background-color: 004AAD;
    color: #fff;
}
   </style>
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
           
                <img src="img/logo1.png" class="logo" alt="Logo" >
            
           
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="Accueil.php" style="color:#004AAD;" aria-label="Accueil">ACCUEIL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#" aria-label="À propos">A PROPOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="Maintenancier/maintenanciern.html" aria-label="Maintenancer">MAINTENANCIER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#" aria-label="Suggestions">SUGGESTIONS</a>
                    </li>
                    <li class="nav-item">
                        <!-- Bouton de connexion stylisé différemment -->
                        <?php
                        if (isset($_SESSION['email'])) {
                           echo'<a href="Dashb/index.php"><button class="btn btn-primary nav-btn" aria-label="Se connecter">Mon compte</button></a>';
                        } else {
                            echo'<a href="Se connecter/Sign_in.html"><button class="btn btn-primary nav-btn" aria-label="Se connecter">Se Connecter</button></a>';

                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    
        </header>
</footer>
<script src="jquery/jquery-3.7.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>