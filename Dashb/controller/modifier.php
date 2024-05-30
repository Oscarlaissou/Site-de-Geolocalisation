

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de Modification</title>
    <!-- <link href="../bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../boxicons/css/boxicons.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       .modal-content {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,.1);
        }
       .modal-header {
            background-color: #007bff;
            color: white;
        }
       .modal-header h5 {
            margin-bottom: 0;
        }
       .modal-footer {
            display: flex;
            justify-content: space-between;
            padding-top: 20px;
            padding-bottom: 20px;
        }
       .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
       .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
       .table {
            width: 100%;
            border-collapse: collapse;
        }
       .table th,.table td {
            text-align: left;
            padding: 12px 15px;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
       .table tr:nth-child(even) {
            background-color: #f8f9fa;
        }
       .table tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
<?php
// Récupérer l'ID de l'élément à modifier depuis l'URL ou un autre moyen
$id = isset($_GET['id'])? $_GET['id'] : '';

// Connexion à la base de données
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
    $bdd = new PDO('mysql:dbname=geolocalisation;host=localhost;port=3306;charset=utf8', 'root', '');
} catch (PDOException $error) {
    echo "Connection échouée". $error->getMessage();
    exit;
}

// Récupérer les données de l'élément à modifier
$query = "SELECT * FROM maintenancier WHERE id=?";
$stmt = $bdd->prepare($query);
$stmt->execute([$id]);
$data = $stmt->fetch();

// Initialiser les variables avec les données récupérées
$nom = $data['nom']?? '';
$structure = $data['structure']?? '';
$numero = $data['numero']?? '';
$ville=$data['ville']?? '';
$quartier=$data['quartier']?? '';
$longitude = $data['longitude']?? '';
$lattitude = $data['lattitude']?? '';
?>
<!-- Modal pour afficher et modifier les données -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Modifier Maintenancier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="" id="editForm">
          <input type="hidden" name="id" value="<?php echo htmlspecialchars($id);?>">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">  <i class="bi bi-person"></i> Nom</th>
                <td><input type="text" name="nom" value="<?php echo htmlspecialchars($nom);?>" required></td>
              </tr>
              <tr>
                <th scope="row"> <i class="bi bi-building"></i> Structure</th>
                <td><input type="text" name="structure" value="<?php echo htmlspecialchars($structure);?>" required></td>
              </tr>
              <tr>
                <th scope="row"> <i class="bi bi-telephone"></i> Numéro</th>
                <td><input type="number" name="numero" value="<?php echo htmlspecialchars($numero);?>" required></td>
              </tr>
              <tr>
                <th scope="row">ville</th>
                <td><input type="text" name="ville" value="<?php echo htmlspecialchars($ville);?>" required></td>
              </tr>
              <tr>
                <th scope="row">quartier</th>
                <td><input type="text" name="quartier" value="<?php echo htmlspecialchars($quartier);?>" required></td>
              </tr>
              <tr>
                <th scope="row">Longitude</th>
                <td><input type="text" name="longitude" value="<?php echo htmlspecialchars($longitude);?>" required></td>
              </tr>
              <tr>
                <th scope="row">Latitude</th>
                <td><input type="text" name="lattitude" value="<?php echo htmlspecialchars($lattitude);?>" required></td>
              </tr>
            </tbody>
          </table>
          <button type="submit" name="submit" class="btn btn-primary mt-3">Sauvegarder Modifications</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" name="exit" id="exitButton" >Annuler</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/js/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




<script>
$(document).ready(function(){
  $('#editModal').modal('show'); // Affiche le modal automatiquement
});
$(document).ready(function(){
    $('#exitButton').click(function(){
        window.location.href = '../mainten.php';
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $structure = $_POST['structure'];
    $numero = $_POST['numero'];
    $ville=$_POST['ville'];
    $quartier=$_POST['quartier'];
    $longitude = $_POST['longitude'];
    $lattitude = $_POST['lattitude'];
 
   
    try {
        $updateQuery = "UPDATE maintenancier SET nom=?, structure=?, numero=?, ville=?, quartier=?, longitude=?, lattitude=? WHERE id=?";
        $stmt = $bdd->prepare($updateQuery);
        $stmt->execute([$nom, $structure, $numero, $ville, $quartier, $longitude, $lattitude, $id]);

        // echo "Modification réussie!";
       echo '<meta http-equiv="refresh" content="0; URL=../mainten.php">';
exit;

    } catch (PDOException $error) {
        echo "Erreur lors de la modification: ". $error->getMessage();
    }
}
?>