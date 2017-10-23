<?php $racine = $_SERVER['DOCUMENT_ROOT'] ?><!DOCTYPE html>

<html>
	<head>
		<?php include_once $racine .'/borabora/include/head.php' ?>
	</head>
	<body>
	<?php include_once $racine .'/borabora/modules/menu/header_gest.php' ?>

<?php
include("connexion.php");
$req_select_uti = "SELECT * FROM Employes WHERE numEmp='".$_SESSION['numEmp']."'";
$res_uti=mysqli_query($cnx, $req_select_uti) or die(mysqli_error($cnx));

		while ($data = mysqli_fetch_assoc($res_uti))
		{
			$nom = $data['nomEmp'];
			$prenom = $data['prenomEmp'];
			$log = $data['login'];
			$mdp = $data['mdp'];
		}

?>


<div class="container_12 top">

<div class="grid_12 box-2 pad-1">
        <div>
          <p class="text-3">Mon compte :</p>
        </div>
      </div>

 <div class="grid_6">     
<table align=center class="table table-striped">
	<tr>
		<td><div class="form-group">
			<label><b>Nom : </b></label>
			<?php echo $nom; ?>
		</div></td>	<td></td>
	</tr>

	<tr>
		<td><div class="form-group">
			<label><b>Prénom : </b></label>
			<?php echo $prenom; ?>
		</div></td><td></td>
	</tr>

	<tr>
		<td><div class="form-group">
			<label><b>Pseudonyme : </b></label>
			<?php echo $log; ?>
		</div></td><td></td>
	</tr>



</table>
</div>
</body>
</html>
