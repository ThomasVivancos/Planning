<?php
$racine = $_SERVER['DOCUMENT_ROOT'];
require_once $racine .'/borabora/connexion.php';

$req_select_reserv = "select * from reservation;";
$res_reserv = mysqli_query($cnx, $req_select_reserv) or die(mysqli_error($cnx)); 


?>   

<html>
  <head>
    <link rel='stylesheet' media='screen' href='/borabora/css/button.css'>
    <?php include_once $racine .'/borabora/include/head.php' ?>
  </head>
  <body>
    <?php include_once $racine .'/borabora/modules/menu/header_gest.php' ?>

    <style>
        table {           
            width: 100%;
            height: 20%;          
        }

        th, td {
            text-align: center;

        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
<div class="container_12 top">  
    <div class="grid_12 box-2 pad-1">
        <div>
             <p class="text-3"> Les reservations : </p> 
        </div>
    </div>

      <link rel="stylesheet" type="text/css" media="screen" href="planning.css" />

   <script type="text/javascript">
   function effacerstart() {
    document.getElementById(2).style.display='none';
    document.getElementById(3).style.display='none';
    document.getElementById(4).style.display='none';
    document.getElementById(5).style.display='none';
  }
     function effacer(idpla) {
          document.getElementById(idpla).style.display='none';
          }
     function afficher(idpla) {
       
          document.getElementById(idpla).style.display='block';
          }
      afficher(1);effacer(2);effacer(3);effacer(4);effacer(5);
     </script>


     <center> <FORM action="cal.php" method="POST">
<INPUT type= "radio" name="cabine" value=0 checked onclick="afficher(1),effacer(2),effacer(3),effacer(4),effacer(5)"> Eva
<INPUT type= "radio" name="cabine" value=1 onclick="afficher(2),effacer(1),effacer(3),effacer(4),effacer(5)"> Kate
<INPUT type= "radio" name="cabine" value=2 onclick="afficher(3),effacer(2),effacer(1),effacer(4),effacer(5)"> Alain
<INPUT type= "radio" name="cabine" value=3 onclick="afficher(4),effacer(2),effacer(3),effacer(1),effacer(5)"> Ali
</FORM>
</center>
 
  <?php
  include $racine .'/borabora/include/planning.php';
 include $racine .'/borabora/include/PlanningCellule.php';
require_once $racine .'/borabora/connexion.php';



  $req_select_soin1 = "Select NumRes, (Date_format(DateRes,'%w')-1) as jour, DebRes, (DebRes + TempsSoin + 20) as finsoin, libelleSoin, TempsSoin, numCabine
            From Soins S, reservation R
            Where S.numSoin = R.numSoin 
            And Date_format(DateRes,'%u') = Date_format(curdate(),'%u')
            And NumEmp = 1
            Group by DateRes, DebRes;";
  $res_soin1 = mysqli_query($cnx, $req_select_soin1) or die(mysqli_error($cnx)); 
  
  While ($ligne = mysqli_fetch_array($res_soin1)){
    $contenusCelules1[] = new PlanningCellule($ligne['jour'], $ligne['DebRes'], $ligne['finsoin'], '#900', '<b>'.$ligne['libelleSoin'].'</b><br />Duree : '.$ligne['TempsSoin'].' min <br /> Cabine '.$ligne['numCabine']);
  }
  

  $req_select_soin2 = "Select NumRes, (Date_format(DateRes,'%w')-1) as jour, DebRes, (DebRes + TempsSoin + 20) as finsoin, libelleSoin, TempsSoin, numCabine
            From Soins S, reservation R 
            Where S.numSoin = R.numSoin 
            And Date_format(DateRes,'%u') = Date_format(curdate(),'%u')
            And NumEmp = 2
            Group by DateRes, DebRes;";
  $res_soin2 = mysqli_query($cnx, $req_select_soin2) or die(mysqli_error($cnx)); 
  
  While ($ligne = mysqli_fetch_array($res_soin2)){
    $contenusCelules2[] = new PlanningCellule($ligne['jour'], $ligne['DebRes'], $ligne['finsoin'], '#900', '<b>'.$ligne['libelleSoin'].'</b><br />Duree : '.$ligne['TempsSoin'].' min <br /> Cabine '.$ligne['numCabine']);
  }


  $req_select_soin3 = "Select NumRes, (Date_format(DateRes,'%w')-1) as jour, DebRes, (DebRes + TempsSoin + 20) as finsoin, libelleSoin, TempsSoin, numCabine
            From Soins S, reservation R 
            Where S.numSoin = R.numSoin 
            And Date_format(DateRes,'%u') = Date_format(curdate(),'%u')
            And NumEmp = 3
            Group by DateRes, DebRes;";
  $res_soin3 = mysqli_query($cnx, $req_select_soin3) or die(mysqli_error($cnx)); 
  
  While ($ligne = mysqli_fetch_array($res_soin3)){
    $contenusCelules3[] = new PlanningCellule($ligne['jour'], $ligne['DebRes'], $ligne['finsoin'], '#900', '<b>'.$ligne['libelleSoin'].'</b><br />Duree : '.$ligne['TempsSoin'].' min <br /> Cabine '.$ligne['numCabine']);
  }


  $req_select_soin4 = "Select NumRes, (Date_format(DateRes,'%w')-1) as jour, DebRes, (DebRes + TempsSoin + 20) as finsoin, libelleSoin, TempsSoin, numCabine
            From Soins S, reservation R 
            Where S.numSoin = R.numSoin 
            And Date_format(DateRes,'%u') = Date_format(curdate(),'%u')
            And NumEmp = 4
            Group by DateRes, DebRes;";
  $res_soin4 = mysqli_query($cnx, $req_select_soin4) or die(mysqli_error($cnx)); 
  
  While ($ligne = mysqli_fetch_array($res_soin4)){
    $contenusCelules4[] = new PlanningCellule($ligne['jour'], $ligne['DebRes'], $ligne['finsoin'], '#900', '<b>'.$ligne['libelleSoin'].'</b><br />Duree : '.$ligne['TempsSoin'].' min <br /> Cabine '.$ligne['numCabine']);
  }

  $contenusCelules1[] = new PlanningCellule(5, 1205,1210, '#0007000A', '');
  $contenusCelules2[] = new PlanningCellule(5, 1205,1210, '#0007000A', '');
  $contenusCelules4[] = new PlanningCellule(5, 1205,1210, '#0007000A', '');
  $contenusCelules3[] = new PlanningCellule(5, 1205,1210, '#0007000A', '');
 ?>
 


<span id=1>
  <div id="planning">
   <?php
  $planning1 = new Planning(0,6,480,1200,5,$contenusCelules1);
  $planning1->afficherHtmlTable();
  ?>
  </div>
 <input name="cabine1"></span>

 <span id=2>
 <div id="planning">
 <?php
 $planning2 = new Planning(0,6,480,1200,5,$contenusCelules2);
 $planning2->afficherHtmlTable();
 ?>
 </div>
 <input name="cabine2"></span>

 <span id=3>
 <div id="planning">
 <?php
 $planning3 = new Planning(0,6,480,1200,5,$contenusCelules3);
 $planning3->afficherHtmlTable();
 ?>
 </div>
 <input name="cabine3"></span>

 <span id=4>
 <div id="planning">
 <?php
 $planning4 = new Planning(0,6,480,1200,5,$contenusCelules4);
 $planning4->afficherHtmlTable();
 ?>
 </div>
 <input name="cabine4"></span>

   
  <?php
echo '<script type="text/javascript">effacerstart();</script>';
?>


</div>
<br /><br />
      <?php echo '<center><a href=/borabora/modules/reservation/ajout_reserv.php> <button class="bouton">Ajouter une reservation</button></a></center>'; ?>

