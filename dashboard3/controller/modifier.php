<?php

    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $structure= $_POST['structure'];
    $numero= $_POST['numero'];
    $longitude= $_POST['longitude'];
    $lattitude= $_POST['lattitude'];

$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
   // $bdd = new PDO($sql, $username, $password, $dsn_Options);
   $bdd = new PDO('mysql:dbname=geolocalisation;host=localhost;port=3306;charset=utf8', 'root', '');
} catch (PDOException $error) {
    echo "Connection echouer" . $error->getMessage();
}
    $sql = "DELETE FROM maintenancier WHERE id = $id";
    
    $update = "UPDATE maintenancier SET 
        nom=$nom, 
        structure=$structure,
        numero=$numero,
        longitude=$longitude,
        lattitude=$lattitude
        WHERE id=$id";
     $result = $bdd->query($update);
     header("location:../index.php");

?>