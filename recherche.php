<?php
session_start();
if (isset($_SESSION['email'])) {
   ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Affichage des maintenanciers</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <!-- <link rel="stylesheet" href="Dashb/style.css">
    <link rel="stylesheet" href="Dashb/styl.css"> -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    
</head>

    <style>
        .footer {
            margin-top: 100px;
            width: 100%;
        }
        .box {
            margin-top: 90px;
            border-radius: 10px;
            height: auto;

            width: 900px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 4px solid;
            border-color: black;
        }
        
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
        }
        
        #map {
            height: 500px;
            width: 100%;
            margin-top: 50px;
        }
        .card {
        display: inline-block; 
       
    }
    .card-container {
    display: flex;
    flex-wrap: nowrap; /* Empêche le passage à la ligne */
    overflow-x: auto; /* Permet le défilement horizontal si les cartes dépassent l'écran */
    background-color: white;
   
    
    
}

.card-body {
    flex: 0 0 auto; /* Ne se rétrécit pas, ne grandit pas, et prend sa largeur naturelle */
    margin-right: 10px; /* Espacement entre les cartes */
    background-color: #004AAD;
    height: 340px;
    padding:20px;
    margin: 20px;
    border-radius: 10px;
    display: inline-block;
    justify-content: space-between;
    align-items: center;
}
.card-text{
    color: white;
    font-size: 25px;
}

  
    </style>
</head>
<body>
    <?php include "header.php";?>
    <section>
        <div style="height:20px;" >

        </div>
    </section>

    <section>
    <div class="container mt-5">
        <h2>Maintenanciers</h2>
        <?php
        $dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        try {
            $bdd = new PDO('mysql:dbname=geolocalisation;host=localhost;port=3306;charset=utf8', 'root', '');
        } catch (PDOException $error) {
            echo "Connection échouer ". $error->getMessage();
        }

        $ville = $_POST['ville'];
        $quartier = $_POST['quartier'];
        $sql = "SELECT * FROM maintenancier WHERE ville =? AND quartier =?";
        $stmt = $bdd->prepare($sql);
        $stmt->bindValue(1, $ville, PDO::PARAM_STR);
        $stmt->bindValue(2, $quartier, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $locations[] = array(
                'lattitude' => $row['lattitude'],
                'longitude' => $row['longitude'],
                'nom' => $row['nom'],
                'structure' => $row['structure'],
                'numero' => $row['numero'],
                'ville' => $row['ville'],
                'quartier' => $row['quartier'],
                'description' => $row['description']
            );
      
       ?>
    
      
       <div class="card-container">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title text-white" style="font-size:25px;">
    <?= htmlspecialchars($row["nom"])?>
</h5>
<p class="card-text">
<i class="fas fa-home ml-2"></i> <!-- Icône de maison pour la structure -->
    <strong>Structure:</strong> <?= htmlspecialchars($row["structure"])?>

    <br>
    <i class="fas fa-phone ml-2"></i> <!-- Icône de téléphone pour le numéro -->

    <strong>Téléphone:</strong> <?= htmlspecialchars($row["numero"])?>
</p>
<p class="card-text">
<i class="fas fa-map-marker-alt ml-2"></i> <!-- Icône de localisation pour la ville et le quartier -->
    <strong class="card-text text-white">Ville: <?= htmlspecialchars($row["ville"])?> | Quartier: <?= htmlspecialchars($row["quartier"])?></strong>
    
</p>
<p class="card-text">
<i class="fas fa-info-circle ml-2"></i> <!-- Icône d'information pour la description -->

    Description: <?= htmlspecialchars($row["description"])?>
</p>

            </div>
        </div>
        <?php
         }
         // À ce stade, vous pouvez continuer à traiter les résultats comme d'habitude
     } else {
         // Aucun résultat trouvé, affichez un message à l'utilisateur
echo '<p style="text-align:center; font-size:30px; color:#FF0000; margin-top:100px;">Aucun maintenancier trouvé pour la ville '.$ville.' et le quartier '.$quartier.'</p>';

      ?>
    <?php }
    
    ?>
    
</div>
</section>


    <div id="map"></div>
    

<script>



// Fonction pour obtenir et suivre la localisation actuelle de l'appareil
function watchLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(updateMarkers, showError);
    } else { 
        alert("Geolocalisation non supportée par ce navigateur.");
    }
}

function updateMarkers(position) {
    var startLat = position.coords.latitude;
    var startLon = position.coords.longitude;

    // Mettre à jour la vue de la carte avec la nouvelle localisation
    var map = L.map('map').setView([startLat, startLon], 15); // Ajustez le zoom selon vos besoins

    // Ajouter le fond de carte OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
 // Ajouter un marqueur pour la position initiale
 L.marker([startLat, startLon])
     .addTo(map)
     .bindPopup("Votre Position Actuelle")
     .openPopup();

    // Tableau pour stocker les waypoints
    var waypoints = [[startLat, startLon]];

    // Ajouter les autres localisations des marqueurs
    <?php foreach ($locations as $location):?>
    waypoints.push([<?= $location['lattitude']?>, <?= $location['longitude']?>]);
    <?php endforeach;?>
    <?php foreach ($locations as $location):?>
    L.marker([<?= $location['lattitude']?>, <?= $location['longitude']?>])
      .addTo(map)
      .bindPopup(`
            <strong>Nom :</strong> <?= htmlspecialchars($location['nom'])?><br>
            <strong>Structure :</strong> <?= htmlspecialchars($location['structure'])?><br>
            <strong>Numéro :</strong> <?= htmlspecialchars($location['numero'])?><br>
            <strong>Ville :</strong> <?= htmlspecialchars($location['ville'])?><br>
            <strong>Quartier :</strong> <?= htmlspecialchars($location['quartier'])?><br>
            <strong>Description :</strong> <?= htmlspecialchars($location['description'])?>
        `);
    <?php endforeach;?>

  

        // Initialiser le contrôle de routage avec les waypoints
        L.Routing.control({
            waypoints: waypoints,
            routeWhileDragging: true
        }).addTo(map);
        <?php foreach ($locations as $location):?>
L.marker([<?= $location['lattitude']?>, <?= $location['longitude']?>])
   .addTo(map)
   .bindPopup(`
        <strong>Nom :</strong> <?= htmlspecialchars($location['nom'])?><br>
        <strong>Structure :</strong> <?= htmlspecialchars($location['structure'])?><br>
        <strong>Numéro :</strong><a href="https://wa.me/<?= htmlspecialchars($location['numero'])?>/?text=Salut! puis je avoir d'amples information sur vous"><?= htmlspecialchars($location['numero'])?></a> <strong>Contactez moi sur Whatsapp</strong> <br>
        <strong>Ville :</strong> <?= htmlspecialchars($location['ville'])?><br>
        <strong>Quartier :</strong> <?= htmlspecialchars($location['quartier'])?><br>
        <strong>Description :</strong> <?= htmlspecialchars($location['description'])?>
    `);
<?php endforeach;?>
    
      // Mettre à jour la vue de la carte et les marqueurs en cas de changement de localisation
   map.on('moveend', function() {
        // Vous pouvez ajouter ici une logique pour mettre à jour les marqueurs ou les waypoints en fonction de la nouvelle localisation
    });
}

 

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            alert("Permission de geolocalisation refusée");
            break;
        case error.POSITION_UNAVAILABLE:
            alert("Localisation non disponible");
            break;
        case error.TIMEOUT:
            alert("Temps d'attente dépassé");
            break;
        case error.UNKNOWN_ERROR:
            alert("Erreur inconnue");
            break;
    }
}

// Appeler watchLocation pour commencer à surveiller la localisation en temps réel
watchLocation();


</script>


    <section class="footer" >
        <?php include "footer.php";?>
    </section>

</body>
</html>
<?php

} else {
   
    include "header.php";
    $dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    try {
        $bdd = new PDO('mysql:dbname=geolocalisation;host=localhost;port=3306;charset=utf8', 'root', '');
    } catch (PDOException $error) {
        echo "Connection échouer ". $error->getMessage();
    }

    $ville = $_POST['ville'];
$quartier = $_POST['quartier'];
$sql = "SELECT COUNT(*) FROM maintenancier WHERE ville = ? AND quartier = ?";
$stmt = $bdd->prepare($sql);
$stmt->bindValue(1, $ville, PDO::PARAM_STR);
$stmt->bindValue(2, $quartier, PDO::PARAM_STR);
$stmt->execute();
$count = $stmt->fetchColumn();
$count_color = "blue";
$count_font_size = "40px";

   
echo '<p style="text-align:center; font-size:25px; margin-top:150px">Nous avons trouvé <span style="color:' . $count_color . '; font-size:' . $count_font_size . ';">' . $count . '</span> maintenanciers dans la zone sélectionnée</p>';
    echo '<p style="text-align:center; font-size:25px; margin-top:150px" >Pour avoir d\'amples informations sur le maintenancier  veillez vous connecter</p>';
    echo '<p style="text-align:center; margin-bottom:150px"><a href="Se connecter/Sign_in.html"  class="btn btn-primary nav-btn" aria-label="Se connecter">Se Connecter</a></p>';
}


?>

