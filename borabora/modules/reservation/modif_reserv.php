<?php
$racine = $_SERVER['DOCUMENT_ROOT'];
require_once $racine .'/borabora/connexion.php';
$numRes = $_GET['numres'];
$req_select_reservation = 'SELECT * FROM reservation WHERE numRes = "'.$numRes.'";';
$res_reservation=mysqli_query($cnx,$req_select_reservation) or die(mysqli_error($cnx));
while ($data = mysqli_fetch_array($res_reservation))
{
	$debRes = $data['debRes'];
	$dateRes = $data['dateRes'];
	$numSoin = $data['numSoin'];
	$numCabine = $data['numCabine'];
	$numEmp = $data['numEmp'];
	$timedeb = gmdate("i:s", $debRes);

}

//Recupère les numéros de cabine pour la liste déroulante
$req_select_cabine = 'SELECT * FROM cabines;';
$res_cabine = mysqli_query($cnx,$req_select_cabine) or die(mysqli_error($cnx));

//Recupère le nom et prenom de l'employé pour la liste déroulante
$req_select_emp = 'SELECT * FROM employes;';
$res_emp = mysqli_query($cnx,$req_select_emp) or die(mysqli_error($cnx));

$req_select_soin = 'SELECT numSoin, libelleSoin FROM soins;';
$res_soin = mysqli_query($cnx,$req_select_soin) or die(mysqli_error($cnx));
?>

<html>
  <head>
		<script src="/borabora/js/jquery-1.7.min.js"></script>
		<script src="/borabora/js/jquery.easing.1.3.js"></script>
		<script src="/borabora/js/cufon-yui.js"></script>
		<script src="/borabora/js/cufon-replace.js"></script>
		<script src="/borabora/js/fonts/Bilbo_400.font.js"></script>
		<script src="/borabora/js/fonts/bharatic.cufonfonts.js"></script>
		<script src="/borabora/js/fonts/redressed.cufonfonts.js"></script>
		<script src="/borabora/js/tms-0.4.1.js"></script>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" media="screen" href="/borabora/css/grid_12.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="/borabora/css/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Lato:300italic' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" type="text/css" media="screen" href="/borabora/css/button.css" />
  </head>
  <body>
    <?php include_once $racine .'/borabora/modules/menu/header_gest.php' ?>


	<?php $url = "req_modif_reserv.php?numres=" . $numRes; ?>
<form action=<?php echo $url ?> method="POST">

<table align="center">
		
		<tr>
			<td><h1><p class="text-3"> Modification d'une reservation </p></h1></td>
		</tr>

		<tr>
			<td>Le soin : </td>
			<td>
				<select name="soins">
					<?php 
					while ($data = mysqli_fetch_array($res_soin))
					{	
						echo '<option ';
						if($numSoin==$data['numSoin'])
						{
						echo 'selected="selected" ';
						}
					 	echo 'value="'.$data['numSoin'].'">'.$data['numSoin'].' - '.$data['libelleSoin'].'</option>';
					}
					?>
				</select>
			</td>
		</tr>

		<tr>
			<td>Date de la réservation </td>
			<td><input type='date' name='datereserv' value=<?php echo $dateRes; ?>></td>
		</tr>

		<tr>
			<td>Heure de la réservation </td>
			<td><input type='time' name='heurereserv' value=<?php echo $timedeb; ?>></td>
		</tr>
		
		<tr>
			<td>Numero de la cabine : </td>
			<td>
				<select name="numcabine">
					<?php 
					while ($data = mysqli_fetch_array($res_cabine))
					{
						echo '<option ';
						if($numCabine==$data['numCabine'])
						{
						echo 'selected="selected" ';
						}
					 	echo 'value="'.$data['numCabine'].'">'.$data['numCabine'].'</option>';
					}
					?>
				</select>
			</td>
		</tr>

		<tr>
			<td>Employé :</td>
			<td>
				<select name="numemp">
					<?php 
					while ($data = mysqli_fetch_array($res_emp))
					{
						echo '<option ';
						if($numEmp==$data['numEmp'])
						{
						echo 'selected="selected" ';
						}
					 	echo 'value="'.$data['numEmp'].'">'.$data['prenomEmp'].' '.$data['nomEmp'].'</option>';
					}
					?>
				</select>
			</td>
		</tr>
			<?php $url = "req_modif_reserv.php?numres=" . $numRes; ?>
            <td><br /><br /><br /><center><a href=<?php echo $url ?> > <button class='bouton'>Modifier</button></center></a></td>
		</tr>
</table>
</div>
</form>
</html>