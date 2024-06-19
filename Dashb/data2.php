<?php
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
    $bdd = new PDO('mysql:dbname=geolocalisation;host=localhost;port=3306;charset=utf8', 'root', '');
} catch (PDOException $error) {
    echo "Connection failed". $error->getMessage();
}
$sql = "SELECT * FROM maintenancier";
$result = $bdd->query($sql);

$data = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

echo json_encode($data);
?>
