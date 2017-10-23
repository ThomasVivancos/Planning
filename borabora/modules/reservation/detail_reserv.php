<?php
//J'importe ma connexion sql
$racine = $_SERVER['DOCUMENT_ROOT'];
require_once $racine .'/borabora/connexion.php';

//je fais une recherche dans ma table reservation 
$req_select_reserv = 'SELECT numRes, libelleSoin, dateRes, tempsSoin, numCabine, prixSoin,  prenomEmp FROM reservation R, Employes E, Soins S WHERE numRes='.$_GET['numres'].' AND R.numEmp = E.numEmp AND R.numSoin = S.numSoin;';
$res_reserv = mysqli_query($cnx, $req_select_reserv) or die(mysqli_error($cnx)); 
$data = mysqli_fetch_array($res_reserv);

	$numres = $data['numRes'];
	$soin = $data['libelleSoin'];
	$dateres = $data['dateRes'];	
	$debres = $data['tempsSoin'];
	$numcabine = $data['numCabine'];
	$nomemp = $data['prenomEmp'];
	$prixsoin = $data['prixSoin'];	



?>
<html>
  <head>
    <link rel='stylesheet' media='screen' href='/borabora/css/button.css'>
    <?php include_once $racine .'/borabora/include/head.php' ?>
  </head>
  <body>
    <?php include_once $racine .'/borabora/modules/menu/header_gest.php' ?>

<div class="container_12 top">  
    <h2>Detail de la reservation numero <?php echo $numres ." : " .$soin; ?></h2></p> 
  <br/><br/>
	<?php
		echo "Date : Le ".$dateres //Renvoie la date de la réservation
	?>
	<br/>
	<?php
		echo "Durée : " .$debres ." minutes "//Renvoie l'heure de la réservation
	?>
	<br/>
	<?php
		echo "Cabine :  ".$numcabine //Renvoie le num de la cabine
	?>
	<br/>
	<?php
		echo "Employé :  " .$nomemp //Renvoie le nom de l'employé
	?>
	<br/>
	<?php
		echo "Tarif du soin : ".$prixsoin //Renvoie le tarif de la réservation
	?>
	<br/>
              <tr>
								<?php $url = "modif_reserv.php?numres=" . $numres; ?>
                <td width='10'  align='center'> <a href=<?php echo $url ?> > <button class='bouton1'>Modifier</button></a> </td>
              </tr>

</div>




