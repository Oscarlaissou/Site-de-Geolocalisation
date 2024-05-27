<link rel="stylesheet" href="style.css"></link>
<link rel="stylesheet" href="css/bootstrap.min.css">
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
        <th class="text-center">Nom & Prenom</th>
        <th class="text-center">Nom de la structure</th>
        <th class="text-center">Numero</th>
        <th class="text-center">Longitude</th>
        <th class="text-center">Lattitude</th>
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
        <td><?= $row["nom"] ?></td>
        <td><?= $row["structure"] ?></td>
        <td><?= $row["numero"] ?></td>
        <td><?= $row["longitude"] ?></td>
        <td><?= $row["lattitude"] ?></td>
        <td>
          <button class="btn btn-primary" style="height:40px" onclick="editMaintainer('<?= $row['id'] ?>')">Edit</button>
          <button class="btn btn-danger" style="height:40px" onclick="deleteMaintainer('<?= $row['id'] ?>')">Delete</button>
        </td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Maintainer
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
          <form enctype='multipart/form-data' action="./controller/addMaintainerController.php" method="POST">
            <div class="form-group">
              <label>Name:</label>
              <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
              <label>Structure:</label>
              <input type="text" class="form-control" name="structure" required>
            </div>
            <div class="form-group">
              <label>Phone:</label>
              <input type="text" class="form-control" name="phone" required>
            </div>
            <div class="form-group">
              <label>Longitude:</label>
              <input type="text" class="form-control" name="longitude" required>
            </div>
            <div class="form-group">
              <label>Latitude:</label>
              <input type="text" class="form-control" name="latitude" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Maintainer</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>