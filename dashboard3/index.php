<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
       <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
</head>
<body >
    
<?php
            include "./adminHeader.php";
            include "./sidebar.php";
           
            // include_once "./config/dbconnect.php";
        ?>
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
            <div class="col-sm-3">
                <div class="card" style="background-color:#004AAD;"  >
                    <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white; font-size: 27px; " >Total utilisateurs</h4>
                    <h5 style="color:white;">
                    <?php
                       $sql="SELECT COUNT(*) as total FROM utilisateurs"; // Modifié pour compter les lignes directement
                       $result=$bdd->query($sql); // Utilisez $bdd au lieu de $conn
                       
                       $count=0;
                       $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                       foreach ($rows as $row) {
                           // Traiter chaque ligne ici
                       }
                       
                               $count=$row['total']; // Utilisez la clé 'total' pour accéder au nombre total de lignes
                       echo $count;
                       ?></h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="background-color:#004AAD; width:300px; ">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px; "></i>
                    <h4 style="color:white; font-size: 24px; " >Total Maintenanciers</h4>
                    <h5 style="color:white;">
                    <?php
                       $sql="SELECT COUNT(*) as total FROM maintenancier"; // Modifié pour compter les lignes directement
                       $result=$bdd->query($sql); // Utilisez $bdd au lieu de $conn
                       
                       $count=0;
                       $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                       foreach ($rows as $row) {
                           // Traiter chaque ligne ici
                       }
                       
                               $count=$row['total']; // Utilisez la clé 'total' pour accéder au nombre total de lignes
                       echo $count;
                       ?>
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="card" style="background-color:#004AAD;">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Products</h4>
                    <h5 style="color:white;">
                    <?php
                       
                    //    $sql="SELECT * from product";
                    //    $result=$conn-> query($sql);
                    //    $count=0;
                    //    if ($result-> num_rows > 0){
                    //        while ($row=$result-> fetch_assoc()) {
                   
                    //            $count=$count+1;
                    //        }
                    //    }
                    //    echo $count;
                   ?>
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="background-color:#004AAD;">
                    <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total orders</h4>
                    <h5 style="color:white;">
                    <?php
                       
                    //    $sql="SELECT * from orders";
                    //    $result=$conn-> query($sql);
                    //    $count=0;
                    //    if ($result-> num_rows > 0){
                    //        while ($row=$result-> fetch_assoc()) {
                   
                    //            $count=$count+1;
                    //        }
                    //    }
                    //    echo $count;
                   ?>
                   </h5>
                </div>
            </div>
        </div>
        
    </div>
            
        <?php
            if (isset($_GET['category']) && $_GET['category'] == "success") {
                echo '<script> alert("Category Successfully Added")</script>';
            }else if (isset($_GET['category']) && $_GET['category'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
            if (isset($_GET['size']) && $_GET['size'] == "success") {
                echo '<script> alert("Size Successfully Added")</script>';
            }else if (isset($_GET['size']) && $_GET['size'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
            if (isset($_GET['variation']) && $_GET['variation'] == "success") {
                echo '<script> alert("Variation Successfully Added")</script>';
            }else if (isset($_GET['variation']) && $_GET['variation'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
        ?>


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>