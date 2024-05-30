<?php


session_start(); 

$bdd = new PDO('mysql:dbname=geolocalisation;host=localhost;port=3306;charset=utf8', 'root', '');

if (isset($_POST['valider'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $motDePasse = ($_POST['password']);

        $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = ? AND password = ?");
        $req->execute(array($email, $motDePasse));

        if ($req->rowCount() > 0) {
            $_SESSION['email'] = $email; 
            header("location:../Dashb/index.php"); 

        } else {
          echo "<script>
          window.addEventListener('load', function() {
              alert('Ce compte n\\'existe pas!');
          });
          </script>";
              header("location:../Se connecter/Sign_up.html");
             
          
        }
    }
}

if (isset($_SESSION['email'])) {
 
  echo "Bienvenue " . $_SESSION['email'] . " !";
  echo "<a href='logout.php'>Déconnexion</a>";
}
if (isset($errorMessage)) {
  echo "<p class='error'>$errorMessage</p>"; 
}


   


$email_error = '';
$password_error = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les données soumises par le formulaire
  $email = $_POST['email'];
  $motDePasse = $_POST['password'];

  // Vérifier si les champs sont vides
  if (empty($email) || empty($motDePasse)) {
    echo '<script>alert("Veuillez remplir tous les champs."); history.back();</script>';
    exit; // Arrêter l'exécution du script
  }

  // Vérifier si l'e-mail contient "@gmail.com"
  if (!strpos($email, '@gmail.com')) {
    echo '<script>alert("L\'e-mail doit contenir @gamil.com"); history.back();</script>';
    exit; // Arrêter l'exécution du script
  }

  // Vérifier la longueur du mot de passe
  if (strlen($motDePasse) < 8) {
    $password_error = 'Le mot de passe doit contenir au moins 8 caractères';
  }

  // Vérifier s'il y a au moins une majuscule
  if (!preg_match('/[A-Z]/', $motDePasse)) {
    $password_error = 'Le mot de passe doit contenir au moins une majuscule';
  }

  // Vérifier s'il y a au moins un caractère spécial
  if (!preg_match('/[\W_]/', $motDePasse)) {
    $password_error = 'Le mot de passe doit contenir au moins un caractère spécial';
  }

  // Vérifier s'il y a au moins un chiffre
  if (!preg_match('/\d/', $motDePasse)) {
    $password_error = 'Le mot de passe doit contenir au moins un chiffre';
  }

  // Si le mot de passe ne respecte pas les critères, afficher un message d'erreur et renvoyer à la page précédente
  if (!empty($password_error)) {
    echo '<script>alert("' . $password_error . '"); history.back();</script>';
    exit; // Arrêter l'exécution du script
  }

  // La requete pour envoyer les donnees du formulaire vers l'API comme body de la requete
  $email = $_POST['email'];
  $motDePasse = $_POST['password'];
}
?>