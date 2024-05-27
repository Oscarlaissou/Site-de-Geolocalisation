<?php
   session_start();


?>
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #004AAD;">
    
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="./assets/images/logo2.png" width="200" height="200" alt="Swiss Collection" style="margin-top:-50px;" >
    </a>
    <p class="text-white text-center"  style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:50px;"  > L'expérience & L'art de la Reparation</p>
    <P class="text-white text-center" style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:20px;" >By Oscar Choco</P>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        <?php           
        if(isset($_SESSION['user_id'])){
          ?>
          <a href="" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
         </a>
          <?php
        } else {
            ?>
            <a href="../Se connecter/logout.php" style="text-decoration:none;">
                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>

            <?php
        } ?>
    </div>  
</nav>
