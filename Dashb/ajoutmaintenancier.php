<?php
$nom=$_POST['nom'];
$structure=$_POST['structure'];
$numero=$_POST['numero'];
$ville=$_POST['ville'];
$quartier=$_POST['quartier'];
$longitude=$_POST['longitude'];
$lattitude=$_POST['lattitude'];
$message="Insertion reussit";
try {
    $bdd = new PDO('mysql:dbname=geolocalisation;host=localhost;port=3306;charset=utf8', 'root', '');
    // Préparation de la requête avec des paramètres nommés pour éviter les injections SQL
    $req = "INSERT INTO maintenancier (`nom`, `structure`, `numero`,`ville`,`quartier`, `longitude`,`lattitude`) VALUES (:nom, :structure, :numero,:ville, :quartier, :longitude,:lattitude)";
    $stmt = $bdd->prepare($req);

    // Exécution de la requête avec les paramètres
    $stmt->execute([':nom' => $nom, ':structure' => $structure, ':numero' => $numero, ':ville' => $ville, ':quartier' => $quartier ,':longitude' => $longitude , ':lattitude' => $lattitude]);

    // Vérification du succès de l'insertion
    if ($stmt->rowCount() > 0) {
header("location:index.php");
    } else {
        echo "<script>alert('Echec d'insertion');</script>";
    }

} catch (PDOException $error) {
    echo "Connection échouée : ". $error->getMessage();
}

?>