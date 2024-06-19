<?php
   session_start();


?>
<link rel="stylesheet" href="styl.css">

<div class="sidebar"  style="background-color:#004AAD;">
        <div class="side-header">
            <!-- <h3>M<span>odern</span></h3> -->
            <img src="../img/logo1.png" width="160" height="180" alt="Swiss Collection"> 
        </div>
        
        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url(img/logo.png)"></div>
                <!-- <h4>David Green</h4>
                <small>Art Director</small> -->
                <?php

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['email'])) {
    // Afficher un message de bienvenue et un bouton de déconnexion
    echo "<p class='session-info'>"; 
        echo "<span class='welcome-message text-white'>Bienvenue " . $_SESSION['email'] . " !</span>"; 
    echo "</p>";
    
    if (isset($errorMessage)) {
        echo "<p class='error'>$errorMessage</p>";
    }
}
?>
                <div>
              
</div>
            </div>

            <div class="side-menu" style="" >
                <ul>
               
                    <li>
                       <a href="index.php" class="active">
                            <span class="las la-home"></span>
                            <small style="text-white" >Dashboard</small>
                        </a>
                    </li>
                    <li>
                       <a href="utilisateurs.php" >
                            <span class="las la-user-alt"></span>
                            <small style="text-white">Profil</small>
                        </a>
                    </li>
                    <li>
                       <!-- <a href="">
                            <span class="las la-envelope"></span>
                            <small>Mailbox</small>
                        </a>
                    </li> -->
                    <li>
                       <a href="mainten.php">
                            <span class="las la-clipboard-list"></span>
                            <small style="text-white">Maintenancier</small>
                        </a>
                    </li>
                    <li>
                       <!-- <a href="">
                            <span class="las la-shopping-cart"></span>
                            <small>Orders</small>
                        </a>
                    </li>
                    <li>
                       <a href="">
                            <span class="las la-tasks"></span>
                            <small>Tasks</small>
                        </a>
                    </li> -->

                </ul>
            </div>
        </div>
    </div>

    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="./styl.css"></link>
    
