
<?php   

$racine = $_SERVER['DOCUMENT_ROOT'];
require_once $racine .'/borabora/connexion.php';

//on récupère les variables du formulaire Pconnexion.php
$log = $_POST['login'];
$mdp = $_POST['pass'];

    $req = "SELECT numEmp, nomEmp, prenomEmp, login, mdp
    		FROM employes
    		WHERE login='".$log."' 
			AND mdp='".$mdp."';";


    $res = mysqli_query($cnx, $req) or die(mysqli_error($cnx));

if(!isset($res)){
    echo '<body onLoad="alert(\'Votre identifiant ou mot de passe est incorrect\')">';
    echo '<meta http-equiv="refresh" content="0;URL=/borabora/Pconnexion.php">';

	}else{

		while($data = mysqli_fetch_assoc($res))
		{
			$id_util = $data['numEmp'];
			$nom_util = $data['nomEmp'];
			$prenom_util = $data['prenomEmp'];
			$pass = $data['mdp'];
		}
	}

	if(strtolower($mdp) == strtolower($pass))
			{
				session_start();
				$_SESSION['numEmp'] = $id_util;
				$_SESSION['prenomEmp'] = $prenom_util;
				$_SESSION['nomEmp'] = $nom_util;

				//redirection vers l'accueil du gestionnaire du spa
				header('location: /borabora/modules/menu/menu_gest.php');
			} 
		else
			{
			echo '<meta http-equiv="refresh" content="0;URL=/borabora/Pconnexion.php">';
			}

?>