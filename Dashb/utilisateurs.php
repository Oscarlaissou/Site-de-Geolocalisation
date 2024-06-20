


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
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
  <div class="container mt-5">
    <table id="example" class="table display" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">Id</t>
                <th class="text-center">Nom</th>
                <th class="text-center">Email</th>
                <th class="text-center">Role</th>
            </tr>
        </thead>
    </table>
</div>
   
  </table>

  <!-- <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="styl.css">

          </div>
         </main>
    
    </div>
    <!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        ajax: {
            url: 'data.php', // Replace with your PHP script URL
            type: 'POST',
            dataSrc: ''
        },
        columns: [
          { data: 'id' },
            { data: 'nom' },
            { data: 'email' },
            { data: 'role' }
        ],
        responsive: true,
        dom: '<"top"i>rt<"top"flp><"clear">',
        // order: [[ 1, "asc" ]],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10/i18n/French.json"
        }
    });
});
</script>
    <!-- <script src="js/bootstrap.bundle.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>