
<?php
session_start();
if (isset($_SESSION['email'])) {
   ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="boxicons/css/boxicons.min.css" rel="stylesheet">
    <title>Maintenancier</title>
</head>
<body> 
   
    <div class="container">     
        <div class="cont">
            <form method="post" action="ajoutmaintenancier.php">
                <div class="col-1">
                    <img src="logo1.png" alt="" width="250px" height="200px" style="margin-left: 100px;margin-top: -40px;">
                                </div>
                <div class=" p-2">
                    <h2 style="font-size: 40px; text-align: center; color: #004AAD;">INFORMATIONS</h2>
                </div>
                <div class="w-612px h-99px p-2">
                    <div><label for=""> Nom & Prénoms</label></div>
                    <input class=" w-100 " type="text" placeholder="Nom & Prénoms" name="nom" id="" required>
                </div>
                <div class="w-612px h-99px p-2">
                    <div><label for=""> Nom de la structure</label></div>
                    <input class=" w-100 " type="text" placeholder="Nom de la structure" name="structure" id="" required>
                </div>
                
                <div class=" container2 h-99px p-2">
                    <div><label for="">Numéro de Téléphone</label></div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill text-primary" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                      </svg>   
                    <input class=" numero" type="number"  placeholder="237 693 96 92 24" name="numero" id="numero" required>
                </div>
                <div class="w-596px h-83px p-2">
                    <div class="w-612px h-99px p-2">
                        <div><label for=""> Ville</label></div>
                        <input class=" w-100 " type="text" placeholder="ville" name="ville" id="" required>
                    </div>
                    <div class="w-612px h-99px p-2">
                        <div><label for=""> quartier</label></div>
                        <input class=" w-100 " type="text" placeholder="quartier" name="quartier" id="" required>
                    </div>
                    <div class="row ">
                        <div> <label for="" class="pos">Position Géographique</label></div>
                        <div class="col container1">
                            <div> <label for="" style="margin-left: 70px;">Longitude</label></div>
                            <input class=" w-25 " type="text" placeholder="123" name="longitude" id="longitude" required style="margin-left: 70px;">
                        </div>
                        <div class="col-md-6">

                            <div><label for="" style="margin-left: 50px;">Lattitude</label></div>
                          
                          <input class=" w-25 " type="text" placeholder="123" name="lattitude" id="lattitude" required style="margin-left: 50px;">
                        </div>
                        <div class="w-612px h-99px p-2">
                            <div><label for=""> Description</label></div>
                            <input class=" w-100 " type="text" placeholder="description" name="description" id="" required>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-check p-2 m-4">
                            <input class="form-check-input" type="checkbox" id="saveDefaultMethod">
                            <label class="form-check-label " for="saveDefaultMethod">
                                Enregistrer les informations
                            </label>
                        </div>
                    </div>
                    <div class="row">    
                        <button name="valider"  class=" button  fw-bold text-white" onclick="valider()"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-plus text-white" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                          </svg>Ajouter </button>
                    </div>
                    <div class=" ">
                      <div class="col">
                        <a href="../Accueil1.html" class="text-primary">back</a>
                    </div>
                    <div class="col-md-12">

                        <p class="text-success p-3 text-end">
                            Secure connection
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill text-success" viewBox="0 0 16 16">
                              <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                            </svg>
                          </p>
                          </div>
                </div>
                

            </form>
                
        </div>
    </div>
    <script src="maintenancier.js"></script>
</body>
</html>
<?php
} else {
    header("Location:../Se connecter/Sign_in.html");
}
?>

