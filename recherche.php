<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Affichage des maintenanciers</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
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
        }
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
        }
        .table-header {
            background-color: #004AAD;
            color: white;
            font-size: 24px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 24px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        #map {
            height: 500px;
            width: 100%;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <?php include "header.php";?>

    <section>
        <div class="box">
            <h2>Maintenanciers</h2>
            <table class="table">
                <thead class="table-header">
                    <tr>
                        <th class="text-center">Nom & Prenom</th>
                        <th class="text-center">Nom de la structure</th>
                        <th class="text-center">Numero de Telephone</th>
                        <th class="text-center">Ville</th>
                        <th class="text-center">Quartier</th>
                    </tr>
                </thead>
                <tbody>
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

                    $locations = array();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $locations[] = array(
                            'lattitude' => $row['lattitude'],
                            'longitude' => $row['longitude'],
                            'nom' => $row['nom'],
                            'structure' => $row['structure'],
                            'numero' => $row['numero'],
                            'ville' => $row['ville'],
                            'quartier' => $row['quartier']
                        );
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($row["nom"])?></td>
                        <td><?= htmlspecialchars($row["structure"])?></td>
                        <td><?= htmlspecialchars($row["numero"])?></td>
                        <td><?= htmlspecialchars($row["ville"])?></td>
                        <td><?= htmlspecialchars($row["quartier"])?></td>
                    </tr>
                    <?php
                        
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <div id="map"></div>

<script>
    // Initialiser la carte avec les coordonnées du premier enregistrement
    var map = L.map('map').setView([<?php echo $locations[0]['lattitude']; ?>, <?php echo $locations[0]['longitude']; ?>], 30);

    // Ajouter le fond de carte OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    <?php foreach ($locations as $location):?>
L.marker([<?= $location['lattitude']?>, <?= $location['longitude']?>])
   .addTo(map)
   .bindPopup(`
        <strong>Nom :</strong> <?= htmlspecialchars($location['nom'])?><br>
        <strong>Structure :</strong> <?= htmlspecialchars($location['structure'])?><br>
        <strong>Numéro :</strong> <?= htmlspecialchars($location['numero'])?><br>
        <strong>Ville :</strong> <?= htmlspecialchars($location['ville'])?><br>
        <strong>Quartier :</strong> <?= htmlspecialchars($location['quartier'])?>
    `);
<?php endforeach;?>

</script>


    <section class="footer" >
        <?php include "footer.php";?>
    </section>
</body>
</html>