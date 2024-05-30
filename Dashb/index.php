
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Modern Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styl.css">
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
               ?></h5>
            </div>
            <div class="card" style="background-color:#004AAD; width:300px;">
                <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
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
               ?></h5>
            </div>
            <div class="card" style="background-color:#004AAD; width:300px;">
                <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                <h4 style="color:white; font-size: 24px;">Total orders</h4>
                <h5 style="color:white;">
                <?php
                    // $sql="SELECT COUNT(*) as total FROM maintenancier";
                    // $result=$bdd->query($sql);
                    // $count=0;
                    // $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                    // foreach ($rows as $row) {
                    //     $count=$row['total'];
                    // }
                    // echo $count;
               ?>
               </h5>
            </div>
            
        
    </div>
</div>


         </main>
    
    </div>
</body>
</html>