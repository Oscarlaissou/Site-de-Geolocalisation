<?php
// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$motDePasse = ($_POST['password']);
$role = ($_POST['role']);

try {
    $bdd = new PDO('mysql:dbname=geolocalisation;host=localhost;port=3306;charset=utf8', 'root', '');
    // Préparation de la requête avec des paramètres nommés pour éviter les injections SQL
    $req = "INSERT INTO utilisateurs (`nom`, `prenom`, `email`, `password` ,`role`) VALUES (:nom, :prenom, :email, :password, :role)";
    $stmt = $bdd->prepare($req);

    // Exécution de la requête avec les paramètres
    $stmt->execute([':nom' => $nom, ':prenom' => $prenom, ':email' => $email, ':password' => $motDePasse, ':role' => $role]);

    // Vérification du succès de l'insertion
    if ($stmt->rowCount() > 0) {
header("location:Sign_in.html");
    } else {
        echo "<script>alert('Echec d'insertion');</script>";
    }

} catch (PDOException $error) {
    echo "Connection échouée : ". $error->getMessage();
}

// Validation des données
$email_error = '';
$password_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification si les champs sont vides
    if (empty($email) || empty($motDePasse)) {
        echo '<script>alert("Veuillez remplir tous les champs."); history.back();</script>';
        exit;
    }

    // Vérification si l'e-mail contient "@gmail.com"
    if (!strpos($email, '@gmail.com')) {
        echo '<script>alert("L\'e-mail doit contenir @gmail.com"); history.back();</script>';
        exit;
    }

    // Accumulation des erreurs de mot de passe
    if (strlen($motDePasse) < 8) {
        $password_error.= 'Le mot de passe doit contenir au moins 8 caractères<br>';
    }
    if (!preg_match('/[A-Z]/', $motDePasse)) {
        $password_error.= 'Le mot de passe doit contenir au moins une majuscule<br>';
    }
    if (!preg_match('/[\W_]/', $motDePasse)) {
        $password_error.= 'Le mot de passe doit contenir au moins un caractère spécial<br>';
    }
    if (!preg_match('/\d/', $motDePasse)) {
        $password_error.= 'Le mot de passe doit contenir au moins un chiffre<br>';
    }

    // Affichage des erreurs de mot de passe
    if (!empty($password_error)) {
        echo '<script>alert("'. $password_error. '"); history.back();</script>';
        exit;
    }
}
?>
