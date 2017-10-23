<?php 
session_start();
?>
<header> 
  <div> 
    <div>                 	
      <h1 class="text-3a"><a href="/">Le BORA<span>-BORA</span></a></h1>
     <br /><font color="white"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <?php  
        echo "Bienvenue ".$_SESSION['prenomEmp']. " " .$_SESSION['nomEmp'];
      ?>
     </font></b>
      <nav>  
        <ul class="menu">
          <li<?php echo $_SERVER['SCRIPT_NAME'] == '/menu_gest.php' ? ' class="current"' : '' ?>>
            <a href="/borabora/modules/menu/menu_gest.php">Accueil</a>
          </li>
          <li<?php echo $_SERVER['SCRIPT_NAME'] == '/reservation.php' ? ' class="current"' : '' ?>>
            <a href="/borabora/modules/reservation/view_reservation.php">Reservation</a>
          </li>
          <li<?php echo $_SERVER['SCRIPT_NAME'] == '/planningemp.php' ? ' class="current"' : '' ?>>
            <a href="/borabora/modules/reservation/planningemp.php">Planning</a>
          </li>
           <li<?php echo $_SERVER['SCRIPT_NAME'] == '/compte.php' ? ' class="current"' : '' ?>>
            <a href="/borabora/compte.php">Mon compte</a>
          </li>
          <li<?php echo $_SERVER['SCRIPT_NAME'] == '/deconnexion.php' ? ' class="current"' : '' ?>>
            <a href="/borabora/deconnexion.php">Deconnexion</a>
          </li>
        </ul>
      </nav>
   
      <div class="clear">
         
      </div>
    </div>
  </div>
</header>