<?php
$racine = $_SERVER['DOCUMENT_ROOT'];
require_once $racine .'/borabora/connexion.php';

$req = "SELECT MAX(numRes) as numres FROM reservation;";
$res = mysqli_query($cnx,$req) or die (mysqli_error($cnx));
$ligne = mysqli_fetch_array($res);
//on recupère les variables du formulaire avec la méthode POST
$numres = $ligne['numres'] + 1;
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



$req_insert_reservation = 'INSERT INTO reservation 
VALUES("'.$numres.'","'.$heureres.'","'.$finres.'","'.$dateres.'","'.$numsoin.'","'.$numcab.'","'.$emp.'");';

if(mysqli_query($cnx,$req_insert_reservation) or die (mysqli_error($cnx)) == 1){
	header ('location: view_reservation.php');
}


?>