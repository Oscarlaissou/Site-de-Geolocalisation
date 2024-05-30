<?php
 // <!-- sidebar start -->
    
 include "sidebar.php";
 // <!-- sidebar end-->
 ?>
 <div class="main-content">
 <?php
 //   <!-- header start -->
   include "header.php";
     // <!-- header end -->
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
   // $bdd = new PDO($sql, $username, $password, $dsn_Options);
   $bdd = new PDO('mysql:dbname=geolocalisation;host=localhost;port=3306;charset=utf8', 'root', '');
} catch (PDOException $error) {
    echo "Connection echouer" . $error->getMessage();
}
?>
<div >
  <h2>Utilisateurs</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Nom</th>
        <th class="text-center">Email</th>
      </tr>
    </thead>
    <?php
        $sql = "SELECT * FROM utilisateurs";
        $result = $bdd->query($sql);
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      ?>
    <tr>
    <tr>
        <td><?= $row["nom"] ?></td>
        <td><?= $row["email"] ?></td>
        <td>
    <?php
           
        }

    ?>
  </table>