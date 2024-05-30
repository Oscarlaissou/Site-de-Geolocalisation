


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Affichage des Données</title>
    <style>

.box{
    margin-top: 90px;
    border-radius: 10px;
    border: 1px solid;
    height: auto;
    width: 900px;
}
    table {
    width: 100%;
    border-collapse: collapse;
}

/* Centrer le contenu */
body {
    display: flex;
    justify-content: center;
    align-items: center;
    /* height: 100vh; /* Ajustez selon vos besoins */
    margin: 0; */
}

/* Changement de couleur de fond pour l'en-tête de la table */
.table-header {
    background-color: #004AAD; /* Couleur de fond souhaitée */
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

</style>
</head>
<body>
<section>
    <div class="box" >
    <table >
<thead class="table-header">
      <tr>
        <th class="text-center">Nom & Prenom</th>
        <th class="text-center">Nom de la structure</th>
        <th class="text-center">Numero de Telephone</th>
        <th class="text-center">Ville</th>
        <th class="text-center">Quartier</th>
      </tr>
    </thead>
    <?php
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
    $bdd = new PDO('mysql:dbname=geolocalisation;host=localhost;port=3306;charset=utf8', 'root', '');
} catch (PDOException $error) {
    echo "Connection échouée: ". $error->getMessage();
    exit;
}

// Récupération de la valeur sélectionnée depuis le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedVille = $_POST['ville'];

    // Préparation de la requête SQL
    $sql = "SELECT nom,structure,numero,ville,quartier  FROM maintenancier WHERE ville = :selectedVille";
    $stmt = $bdd->prepare($sql);
    $stmt->bindValue(':selectedVille', $selectedVille); // Utilisation de bindValue au lieu de bindParam

    // Exécution de la requête avec la valeur sélectionnée
    $stmt->execute();

    // Récupération des résultats
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($results)) {
        // Accès à la première (et unique) entrée du tableau
        $uniqueResult = current($results);
        // Affichage de la valeur de la clé 'ville'
        echo "<tr>";
        echo "<td>". htmlspecialchars($uniqueResult['nom']). "</td>";
        echo "<td>". htmlspecialchars($uniqueResult['structure']). "</td>";
        echo "<td>". htmlspecialchars($uniqueResult['numero']). "</td>";
        echo "<td>". htmlspecialchars($uniqueResult['ville']). "</td>";
        echo "<td>". htmlspecialchars($uniqueResult['quartier']). "</td>";
        echo "</tr>";
        


    } else {
        echo "<option>Ville non trouvée</option>";
    }
    // Fermeture du curseur
    $stmt->closeCursor();
}
?>
</table>
    </div>
</section>


</body>
</html>

