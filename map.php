<?php
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geolocalisation";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$sql = "SELECT nom, lattitude, longitude FROM maintenancier"; // Modifiez cette requête selon votre structure de base de données
$result = $conn->query($sql);

$maintainers = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $maintainers[] = $row;
    }
} else {
    echo "0 results";
}
echo json_encode($maintainers);
$conn->close();
?>
