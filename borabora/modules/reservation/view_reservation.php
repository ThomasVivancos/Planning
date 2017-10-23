<?php
$racine = $_SERVER['DOCUMENT_ROOT'];
require_once $racine .'/borabora/connexion.php';

$req_select_reserv = "select numRes, libelleSoin from reservation R, Soins S Where R.numSoin = S.numSoin And Date_format(DateRes,'%u') = Date_format(curdate(),'%u');";
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

      <table>
          <?php
          while ($data = mysqli_fetch_array($res_reserv))
          {
            $numres = $data['numRes'];
            $description = $data['libelleSoin'];

   
          echo "
              <tr>
                <td width='50'  align='center'> ".$numres." </td>
                <td width='400'  align='center'>".$description."</td>
                <td width='10'  align='center'> <a href=detail_reserv.php?numres=$numres> <button class='bouton1'>Détails</button></a> </td>
                <td width='10'  align='center'> <a href=delete_reserv.php?numres=$numres> <button class='bouton1'>Supprimer</button></a> </td>
              </tr>";

          }
          ?>
          
      </table>
</div>
<br /><br />
      <?php echo '<center><a href=/borabora/modules/reservation/ajout_reserv.php> <button class="bouton">Ajouter une reservation</button></a></center>';
 echo '<center><a href=/borabora/modules/reservation/planningemp.php> <button class="bouton">Consulter le planning</button></a></center>'; ?>

