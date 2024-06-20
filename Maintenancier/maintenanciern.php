
<?php
session_start();
if (isset($_SESSION['email'])) {
   ?>
<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Cotisation</title>
    <link rel="stylesheet" href="stylen.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  
  <div class="container">
            <!-- <img src="logo1.png" alt="" width="200px" height="150px" > -->

   
    <div class="title fw-light" style="font-size: 50px; text-align: center; color: #004AAD;">AJOUTER MAINTENANCIERS</div>
    <div class="content">
      <form method="post" action="ajoutmaintenancier.php">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nom & Prénoms</span>
            <input type="text" class="form-control" id="nom" placeholder="Nom & Prénoms" name="nom" required>

          </div>
          <div class="input-box">
            <span class="details">Nom de la structure</span>
            <input type="text" class="form-control" id="structure" placeholder="Nom de la structure" name="structure" required>
          </div>
          <div class="input-box">
            <span class="details">Numero de Telephone</span>
            <input type="number" class="form-control" id="numero" placeholder="237 693 96 92 24" name="numero" required>
          </div>
          <div class="input-box">
            <span class="details">Ville</span>
            <input type="text" class="form-control" id="ville" placeholder="ville" name="ville" required>
          </div>
          <div class="input-box">
            <span class="details">Quartier</span>
            <input type="text" class="form-control" id="quartier" placeholder="quartier" name="quartier" required>
          </div>
          <div class="input-box">
            <span class="details">Description</span>
            <textarea class="form-control" id="description" rows="4" cols="45" placeholder="description" name="description" required></textarea>
          </div>
          <div class="input-box">
            <span class="details">Longitude</span>
            <input type="text" class="form-control" id="longitude" placeholder="123" name="longitude" required>
          </div>
          <div class="input-box">
            <span class="details">Latitude</span>
            <input type="text" class="form-control" id="latitude" placeholder="123" name="latitude" required>
            <label>Pour obtenir la longitude et lattitude cliquez sur ce lien <a href="https://www.coordonnees-gps.fr/">Cliquez ici</a> </label>
          </div>
         
        <div class="button">
          <input type="submit" value="Ajouter" style="margin-left: 250px; width: 200px;">
        </div>
        <div class="button"   style="margin-right: 350px; width: 200px;" >
        <a href="../Accueil.php"><input type="button" value="Annuler"></a>
          </div>
</div>
  </div>
</body>
</html>
<?php
} else {
    header("Location:../Se connecter/Sign_in.html");
}
?>