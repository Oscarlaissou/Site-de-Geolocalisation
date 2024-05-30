<?php
session_start();

// Détruire la session
session_destroy();
session_unset();
// Supprimer le cookie d'e-mail
setcookie('email', '', time() - 3600); // Expiration immédiate

// Rediriger vers la page de session
header('Location: ../Se connecter/Sign_in.html');
exit;
?>