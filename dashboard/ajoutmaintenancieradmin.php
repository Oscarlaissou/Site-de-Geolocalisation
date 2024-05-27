<?php
$nom=$_POST['nom'];
$structure=$_POST['structure'];
$numero=$_POST['numero'];
$longitude=$_POST['longitude'];
$lattitude=$_POST['lattitude'];

try {
    $bdd = new PDO('mysql:dbname=geolocalisation;host=localhost;port=3306;charset=utf8', 'root', '');
    // Préparation de la requête avec des paramètres nommés pour éviter les injections SQL
    $req = "INSERT INTO maintenancier (`nom`, `structure`, `numero`, `longitude`,`lattitude`) VALUES (:nom, :structure, :numero, :longitude,:lattitude)";
    $stmt = $bdd->prepare($req);

    // Exécution de la requête avec les paramètres
    $stmt->execute([':nom' => $nom, ':structure' => $structure, ':numero' => $numero, ':longitude' => $longitude , ':lattitude' => $lattitude]);

    // Vérification du succès de l'insertion
    if ($stmt->rowCount() > 0) {
header("location:d.php");
    } else {
        echo "<script>alert('Echec d'insertion');</script>";
    }

} catch (PDOException $error) {
    echo "Connection échouée : ". $error->getMessage();
}

?>