


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Modern Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styl.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
   <input type="checkbox" id="menu-toggle">
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
        ?>
        <main>
            
            <div class="page-header">
                <h1>Tableau de bord</h1>
                <small>Accueil / Utilisateurs</small>
            </div>
            
            <div class="page-content">
            <?php
 
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
   // $bdd = new PDO($sql, $username, $password, $dsn_Options);
   $bdd = new PDO('mysql:dbname=geolocalisation;host=localhost;port=3306;charset=utf8', 'root', '');
} catch (PDOException $error) {
    echo "Connection echouer" . $error->getMessage();
}
?>
<div  >
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

  <!-- <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="styl.css">

          </div>
         </main>
    
    </div>
    <!-- <script src="js/bootstrap.bundle.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>