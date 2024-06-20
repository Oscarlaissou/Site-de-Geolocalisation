<?php
session_start();
?>
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
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>

   <style>
       #map {
            height: 500px;
            width: 100%;
            margin-top: 50px;
        }
    .btn-primary{
    background-color: 004AAD;
    color: #fff;
}

.search-button {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='45' height='45' fill='white' class='bi bi-search' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: center;
    padding: 10px;
    border: none;
    cursor: pointer;
    background-color: transparent;
    margin-left: 25px;
    margin-top: -10px;
}
 

   </style>
</head>
<?php
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
    $bdd = new PDO('mysql:dbname=geolocalisation;host=localhost;port=3306;charset=utf8', 'root', '');
} catch (PDOException $error) {
    echo "Connection échouer ". $error->getMessage();
}
$villes = array(); // Tableau vide pour stocker les villes
$sql1 = "SELECT DISTINCT ville FROM maintenancier ";
$stmt1 = $bdd->prepare($sql1);

$stmt1->execute();
while ($donnees1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
    $villes[] = $donnees1;
}
$quartiers = array(); // Tableau vide pour stocker les villes
$sql2 = "SELECT  DISTINCT quartier FROM maintenancier ";
$stmt2 = $bdd->prepare($sql2);

$stmt2->execute();
while ($donnees2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    $quartiers[] = $donnees2;
}



?>
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
                        <a class="nav-link fw-bold" href="#" style="color:#004AAD;" aria-label="Accueil">ACCUEIL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#" aria-label="À propos">A PROPOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="Maintenancier/maintenanciern.php" aria-label="Maintenancer">MAINTENANCIER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#" aria-label="Suggestions">SUGGESTIONS</a>
                    </li>
                    <li class="nav-item">
                        <!-- Bouton de connexion stylisé différemment -->
                        <!-- <a href="Se connecter/Sign_in.html"><button class="btn btn-primary nav-btn" aria-label="Se connecter">Se Connecter</button></a> -->
                        <?php
                    
                    if (isset($_SESSION['email'])) {
                        if ($_SESSION['role'] == "admin") {
                            echo'<a href="Dashb/index.php"><button class="btn btn-primary nav-btn" aria-label="Se connecter">Mon compte</button></a>';
                        }else {
                            echo'<a href="#"><button class="btn btn-primary nav-btn" aria-label="Se connecter">'.$_SESSION['email'].'</button></a>';
                            echo '<a href="Se connecter/logout1.php" style="text-decoration:none;">';
echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-box-arrow-right text-black" viewBox="0 0 16 16">';
echo '<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1.5-.5h8a.5.5 0 0 1.5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>';
echo '<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0.708.708z"/>';
echo '</svg></a></div>';
                        }
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
  <main>
<section>
    <div class="background-image" style="width:100%; height: 100%;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-responsive text-white text-center">
                        L'expérience & L'art Reparation
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <img src="img/barre.png" class="img-fluid" style="padding-bottom: 10px;" alt="">
                </div>
            </div>
        </div>
        <div class="recherche">
            <form action="recherche.php" method="POST">
            <div class="d-flex align-items-center justify-content-center flex-wrap" style="padding: 20px;">
                <h2 class="text-white" style="font-size: 30px; text-align: center; margin-bottom: 20px;margin-right: 10px;">Rechercher Maintenancier</h2>
                <div class="d-flex flex-wrap justify-content-center">
                    <select name="ville" id="ville" class="form-select me-4 mb-3" style="width: 220px; margin-left: 15px;">
                    <option value="">Sélectionnez une ville</option>
                    <?php foreach ($villes as $ville):?>
                        <option value="<?= htmlspecialchars($ville['ville'])?>"><?= htmlspecialchars($ville['ville'])?></option>
                         <?php endforeach;?>
                        </select>

                    <select name="quartier" id="quartier" class="form-select mb-3" style="width: 220px;margin-left: -10px; ">
                    <option   value="">Sélectionnez un quartier</option>
                    <?php foreach ($quartiers as $quartier):?>
                        <option value="<?= htmlspecialchars($quartier['quartier'])?>"><?= htmlspecialchars($quartier['quartier'])?></option>
                         <?php endforeach;?>
                        </select>
                </div>
                <div class="d-flex justify-content-center">
                <div class="search-container">
    <input type="submit" value="          " class="search-button">
    
</div>
                </div>
            </div>
        </form>
        </div>
    
</section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center" style="color: #004AAD; margin-top: 30px; margin-bottom: 40px;">A PROPOS</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="apropos">
        <div class="row">
        <div class="col">
<img class="img-responsive w-80 h-60 " style="margin-left: 20px;"  src="img/img.jpg" alt="" >
        </div>
        <div class="col">
<p class="par">
    Trouver Maintenancier a créé pour vous un service de recherche intuitif, entièrement gratuit . Une application web accessible tout support, facile à utiliser, vous permettant de rechercher et trouver votre maintenancier grâce à la   géolocalisation.Voici l'extrait modifié en utilisant la maintenance informatique :
  Maintenir l'utile et l'agréable pour maintenance appropriée et optimisée !
</p>
        </div>
    </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center" style="color: #004AAD; margin-top: 30px; margin-bottom: 40px;">GEOLOCALISATION</h1>
                </div>
            </div>
            <div class="row geolocalisation " style="height:500px ;width:1350px" >
                <!-- <div class="col-12 col-md-6 offset-md-3" > -->
                    <!-- <img src="img/geo.jpeg" alt="" class=" img-fluid " style="margin-top: 20px;width:500px; height: 330px;"> -->
                    <section>
                    <div id="map" style="height: 420px; width:1330px;" ></div>

                    <script>
document.addEventListener("DOMContentLoaded", function() {
    // Initialiser la carte sur le Cameroun
    var map = L.map('map');

    // Ajouter le fond de carte OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Fonction pour récupérer les données des maintenanciers
    function fetchMaintainersData(callback) {
        fetch('map.php') // Remplacez par le chemin vers votre fichier PHP
        .then(response => response.json())
        .then(data => callback(data))
        .catch(error => console.error('Error:', error));
    }

    // Ajouter les marqueurs sur la carte une fois les données récupérées
    fetchMaintainersData(function(locations) {
        var bounds = L.latLngBounds(); // Commencez par un objet vide pour les limites
        locations.forEach(function(location) {
            var marker = L.marker([location.lattitude, location.longitude])
            .addTo(map)
            .bindPopup(location.nom); // Assurez-vous que le nom est disponible dans les données

            // Étendez les limites pour inclure le nouveau marqueur
            bounds.extend(marker.getLatLng());
        });

        // Ajustez la vue de la carte pour se concentrer sur les marqueurs
        map.fitBounds(bounds, { padding: [20, 20] });    });
});
</script>

                </div>
            </div>
        </div>
    </section>
    <section>
        <div>
            <H1 class="text-align-center" style="color: 004AAD; margin-top: 80px;margin-bottom: 80px;">CATEGORIES</H1> 
 
        </div>
        <div class="row images "> 
            <div class="col image"> 
                <div class="image-container"> 
                    <img src="img/R.jpeg" alt="" class="img overlay-image " style="padding-bottom: 10px;"> 
                    <div class="overlay">
                         <div class="content"> 
                            <h5>Laptop</h5>
                             </div> 
                                </div> 
                                    </div> 
                                        </div> 
                             <div class="col"> 
                                <div class="image-container"> 
                                    <img src="img/computer-643039_1920.jpg" alt="" class="img overlay-image"  style="padding-bottom: 10px;">
                                     <div class="overlay"> 
                                        <div class="content"> 
                                        <h5>Desktop</h5> 
                                        </div>  
                                            </div> 
                                                </div>  
                                                        </div>
                                         <div class="col"> <div class="image-container"> <img src="img/OIP (2).jpeg" alt="" class="img overlay-image " style="padding-bottom: 10px;" > 
                                            <div class="overlay"> 
                                            <div class="content"> <h5>Téléphone</h5> 
                                                </div> 
                                                    </div> 
                                                        </div>
                                                            </div>
                                                                 </div>
        
    </section>
    <section class="section">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12 col-md-4">
                    <h6 class="text-center mt-3" style="font-size: 25px; font-family: arima madurai;">Suggestions / Laisser un commentaire</h6>
                </div>
                <div class="col-12 col-md-4">
                    <textarea name="" id="" class="form-control mt-3" rows="5"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary mt-3" style="margin-left: auto; margin-right: auto; display: block;">Soumettre</button>
                </div>
            </div>
        </div>
    </section>
  </main>
  
  <footer>
    <div class="container">
        <div class="row flex-column flex-md-row">
            <div class="col-md-4">
                <img src="img/logo2.png" alt="" width="140px" height="170px" style="margin-bottom: -40px;margin-top: -50px; margin-left: 91px;">
                <aside>
                    <div class="container">
                        <ul class="social-icons list-unstyled">
                            <li><a href="#" class="facebook"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="bi bi-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="bi bi-instagram"></i></a></li>
                            <li><a href="#" class="youtube"><i class="bi bi-youtube"></i></a></li>
                        </ul>
                    </div>
                </aside>
                <p class="mb-0 text-white" style="margin-left: 95px;"> © 2024, Trouver maintenancier Tous droits réservés</p>
            </div>
            <div class="col-md-4">
                <div>
                    <h2 class="text-white" style="margin-top:10px ;">Services</h2>
                    <p href="" class="text-white" style="font-size: 15px;">Prestation de Services</p>
                    <p href="" class="text-white" style="font-size: 15px;">Reparation & Vente</p>
                </div>
            </div>
            <div class="col-md-4">
                <h2 class="text-white" style="margin-top: 10px;">Contacts</h2>
                <p href="" class="text-white" style="font-size: 15px;">oscar.azayimnili@ucac-icam.com</p>
                <p href="" class="text-white" style="font-size: 15px;">693969224</p>
            </div>
        </div>
    </div>
    <script>
        
    </script>
</footer>
<script src="jquery/jquery-3.7.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>