<?php



$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
   // $bdd = new PDO($sql, $username, $password, $dsn_Options);
   $bdd = new PDO('mysql:dbname=geolocalisation;host=localhost;port=3306;charset=utf8', 'root', '');
} catch (PDOException $error) {
    echo "Connection echouer" . $error->getMessage();
}
    $id = $_GET['id'];
    $sql = "DELETE FROM maintenancier WHERE id = $id";
     $result = $bdd->query($sql);
     header("location:../mainten.php");
?>
