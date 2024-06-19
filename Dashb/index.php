<?php
session_start();
if (isset($_SESSION['email'])) {
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Modern Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styl.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
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
                <small>Accueil / Tableau de bord</small>
            </div>
            
            <div class="page-content">
            <?php     
            try {
   // $bdd = new PDO($sql, $username, $password, $dsn_Options);
   $bdd = new PDO('mysql:host=localhost;dbname=geolocalisation;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);
} catch (PDOException $error) {
    echo "Connection echouer" . $error->getMessage();
}
?>
<div id="main-content" class="container allContent-section py-4">
    <div class="row">
        <!-- Colonne pour Total utilisateurs -->
        <div class="col-sm-3">
            <div class="card" style="background-color:#004AAD;">
                <i class="fa fa-users mb-2" style="font-size: 70px;"></i>
                <h4 style="color:white; font-size: 27px;">Total utilisateurs</h4>
                <h5 style="color:white;"><?php
                    $sql="SELECT COUNT(*) as total FROM utilisateurs";
                    $result=$bdd->query($sql);
                    $count=0;
                    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $row) {
                        $count=$row['total'];
                    }
                    echo $count;
               ?>  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-people" viewBox="0 0 16 16" style="margin-left:10px;" >
               <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
             </svg>  </h5>
            </div>
            <div class="card" style="background-color:#004AAD; width:300px;">
                <h4 style="color:white; font-size: 24px;">Total Maintenanciers</h4>
                <h5 style="color:white;"><?php
                    $sql="SELECT COUNT(*) as total FROM maintenancier";
                    $result=$bdd->query($sql);
                    $count=0;
                    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $row) {
                        $count=$row['total'];
                    }
                    echo $count;
               ?> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-person-arms-up" viewBox="0 0 16 16"   style="margin-left:10px;">
               <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
               <path d="m5.93 6.704-.846 8.451a.768.768 0 0 0 1.523.203l.81-4.865a.59.59 0 0 1 1.165 0l.81 4.865a.768.768 0 0 0 1.523-.203l-.845-8.451A1.5 1.5 0 0 1 10.5 5.5L13 2.284a.796.796 0 0 0-1.239-.998L9.634 3.84a.7.7 0 0 1-.33.235c-.23.074-.665.176-1.304.176-.64 0-1.074-.102-1.305-.176a.7.7 0 0 1-.329-.235L4.239 1.286a.796.796 0 0 0-1.24.998l2.5 3.216c.317.316.475.758.43 1.204Z"/>
             </svg></h5>
              
            </div>
           
            </div>
            <?php     
  
  $dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
  
  try {
     // $bdd = new PDO($sql, $username, $password, $dsn_Options);
     $bdd = new PDO('mysql:dbname=geolocalisation;host=localhost;port=3306;charset=utf8', 'root', '');
  } catch (PDOException $error) {
      echo "Connection echouer" . $error->getMessage();
  }
  ?>
  <div>
   
    <table class="table">
      <thead>
      <h2>Maintenancier les plus recents</h2>
        <tr>
        
          <th class="text-center">Nom & Prenom</th>
          <th class="text-center">Nom de la structure</th>
          <th class="text-center">Numero de Telephone</th>
          <th class="text-center">Ville</th>
          <th class="text-center">Quartier</th>
          <th class="text-center">Longitude</th>
          <th class="text-center">Lattitude</th>
          <th class="text-center">Description</th>
        </tr>
      </thead>
      <tbody>
        <?php
         $sql = "SELECT * FROM maintenancier ORDER BY id DESC";
          $result = $bdd->query($sql);
          while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <tr>
    
          <td><?= $row["nom"] ?></td>
          <td><?= $row["structure"] ?></td>
          <td><?= $row["numero"] ?></td>
          <td><?= $row["ville"] ?></td>
          <td><?= $row["quartier"] ?></td>
          <td><?= $row["longitude"] ?></td>
          <td><?= $row["lattitude"] ?></td>
          <td><?= $row["description"] ?></td>
        </tr>
        <?php
          }
  
        ?>
      </tbody>
    </table>
  
            
        
    </div>
</div>


         </main>
    
    </div>
</body>
</html>
<?php
} else {
    header("Location:../Se connecter/Sign_in.html");
}
?>