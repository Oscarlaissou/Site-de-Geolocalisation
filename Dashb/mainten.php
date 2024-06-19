<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Modern Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styl.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
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
                <small>Accueil / Maintenanciers</small>
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
<div>
  <h2>Maintenancier</h2>
  <table class="table">
    <thead>
      <tr>
      <th class="text-center">Id</th>
        <th class="text-center">Nom & Prenom</th>
        <th class="text-center">Nom de la structure</th>
        <th class="text-center">Numero de Telephone</th>
        <th class="text-center">Ville</th>
        <th class="text-center">Quartier</th>
        <th class="text-center">Longitude</th>
        <th class="text-center">Lattitude</th>
        <th class="text-center">Description</th>
        <th class="text-center" colspan="2">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT * FROM maintenancier";
        $result = $bdd->query($sql);
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <tr>
      <td><?= $row["id"] ?></td>
        <td><?= $row["nom"] ?></td>
        <td><?= $row["structure"] ?></td>
        <td><?= $row["numero"] ?></td>
        <td><?= $row["ville"] ?></td>
        <td><?= $row["quartier"] ?></td>
        <td><?= $row["longitude"] ?></td>
        <td><?= $row["lattitude"] ?></td>
        <td><?= $row["description"] ?></td>
        <td>
          <a href="controller/modifier.php?id=<?= $row['id'] ?>" class="btn btn-primary"  style="height:40px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
</svg></a>
  <a href="controller/supprimer.php?id=<?= $row['id'] ?>"class="btn btn-danger" style="height:40px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg></a>
        </td>
      </tr>
      <?php
        }

      ?>
    </tbody>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Ajouter Maintenancier  <i class="bi bi-person-add"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Nouveau Maintenancier</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' action="./ajoutmaintenancier.php" method="POST">
            <div class="form-group">
              <label> <i class="bi bi-person"></i> Nom:</label>
              <input type="text" class="form-control" name="nom" required>
            </div>
            <div class="form-group">
              <label> <i class="bi bi-building"></i> Structure:</label>
              <input type="text" class="form-control" name="structure" required>
            </div>
            <div class="form-group">
              <label><i class="bi bi-telephone"></i> Numero Telephone:</label>
              <input type="text" class="form-control" name="numero" required  >
            </div>
            <div class="form-group">
              <label>Ville:</label>
              <input type="text" class="form-control" name="ville" required>
            </div>
            <div class="form-group">
              <label>Quartier:</label>
              <input type="text" class="form-control" name="quartier" required>
            </div>
            <div class="form-group">
              <label>Longitude:</label>
              <input type="text" class="form-control" name="longitude" required>
            </div>
            <div class="form-group">
              <label>Lattitude:</label>
              <input type="text" class="form-control" name="lattitude" required>
            </div>
            <div class="form-group">
              <label>Description:</label>
              <input type="text" class="form-control" name="description" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="valider" style="height:40px">Ajouter <i class="bi bi-plus-circle"></i></button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Fermer</button>
        </div>
      </div>
    </div>
  </div>
</div>
         </main>
    
    </div>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>