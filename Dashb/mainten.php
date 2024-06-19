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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

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
  <table id="maintenancierTable" class="table table-striped table-bordered" style="width:100%">
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
    </tbody>
</table>
<script>
$(document).ready(function() {
    $('#maintenancierTable').DataTable({
        ajax: {
            url: 'data2.php', // Remplacez par l'URL de votre script PHP
            type: 'POST',
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'nom' },
            { data: 'structure' },
            { data: 'numero' },
            { data: 'ville' },
            { data: 'quartier' },
            { data: 'longitude' },
            { data: 'lattitude' },
            { data: 'description' },
            { data: null, defaultContent: '', title: "Actions", className: "text-center", orderable: false, searchable: false },
        ],
        responsive: true,
        dom: '<"top"i>rt<"bottom"flp><"clear">',
        order: [[ 0, "asc" ]], // Tri inverse par Id pour afficher les plus récents en premier
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10/i18n/French.json"
        },
        columnDefs: [{
            targets: -1, // Cible la dernière colonne pour les actions
            render: function(data, type, row) {
                return `
                    <a href="controller/modifier.php?id=${row.id}" class="btn btn-primary" style="height:40px">
                    <i class="bi bi-pencil"></i>
                    </a>
                    <a href="controller/supprimer.php?id=${row.id}" class="btn btn-danger" style="height:40px">
                    <i class="bi bi-trash"></i>
                    </a>`;
            }
        }]
    });
});
</script>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

</body>
</html>