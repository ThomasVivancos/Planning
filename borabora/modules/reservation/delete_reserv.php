<?php
//j'importe mon fichier de connexion sql
$racine = $_SERVER['DOCUMENT_ROOT'];
require_once $racine .'/borabora/connexion.php';

$numres = $_GET['numres']; //j'affecte à ma variable le numéro de réservation récupéré dans le lien

//requête qui supprime dans réservation mais qui va aussi supprimer dans comprend_reservation
//car j'ai ajouté un triggers qui lorsque je supprime dans la table réservation, ça supprime dans comprend_reservation
$req_delete_reservation = 'DELETE FROM reservation WHERE numres = '.$numres.';';

//Je vérifie si ma requête à bien fonctionner sinon j'affiche un message d'erreur.
if(mysqli_query($cnx,$req_delete_reservation) == 1){
	header ('location: view_reservation.php');
}
else{
	echo "Erreur lors de la suppresion de la réservation.";
}

?>