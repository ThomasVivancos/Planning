<?php
$racine = $_SERVER['DOCUMENT_ROOT'];
require_once $racine .'/borabora/connexion.php';

//on recupère les variables du formulaire avec la méthode POST
$numres = $_GET['numres'];
$dateres = $_POST['datereserv'];
//$debres = $_POST['heurereserv']/60;
$numcab = $_POST['numcabine'];
$emp = $_POST['numemp'];
$heureres = $_POST['heurereserv'];
$tabHeure = explode(':', $heureres);
$heureres = $tabHeure[0]*60;
$heureres = $heureres + $tabHeure[1];
$numsoin = $_POST['soins'];
$finres = 0;



$req_update_reservation = 'UPDATE reservation 
SET debRes="'.$heureres.'", finRes="'.$finres.'", dateRes="'.$dateres.'", numSoin='.$numsoin.', numCabine='.$numcab.', numEmp='.$emp.' WHERE numRes='.$numres.';';
if(mysqli_query($cnx,$req_update_reservation) or die (mysqli_error($cnx)) == 1){
	header ('location: view_reservation.php');
}


?>