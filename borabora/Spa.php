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
     effacer(2);
     effacer(3);
     effacer(4);
     effacer(5);
</script>



<?php $racine = $_SERVER['DOCUMENT_ROOT']?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>A propos - Le Bora-Bora</title>
  <link rel="stylesheet" type="text/css" media="screen" href="planning.css" />

  <?php require_once $racine .'/borabora/include/head.php' ?>
</head>
<body>
  <?php include_once $racine .'/borabora/include/header.php' ?>
  
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
             <p class="text-3"> Le Planning : </p> 
        </div>
    </div>


 <center> <FORM action="cal.php" method="POST">
<INPUT type= "radio" name="cabine" value=0 checked onclick="afficher(1),effacer(2),effacer(3),effacer(4),effacer(5)"> Cabine 1
<INPUT type= "radio" name="cabine" value=1 onclick="afficher(2),effacer(1),effacer(3),effacer(4),effacer(5)"> Cabine 2
<INPUT type= "radio" name="cabine" value=2 onclick="afficher(3),effacer(2),effacer(1),effacer(4),effacer(5)"> Cabine 3
<INPUT type= "radio" name="cabine" value=3 onclick="afficher(4),effacer(2),effacer(3),effacer(1),effacer(5)"> Cabine 4
<INPUT type= "radio" name="cabine" value=4 onclick="afficher(5),effacer(2),effacer(3),effacer(4),effacer(1)" > Cabine Double
</FORM>
</center>
 
  <?php
   include $racine .'/borabora/include/planning.php';
 include $racine .'/borabora/include/PlanningCellule.php';

require_once $racine .'/borabora/connexion.php';



	$req_select_soin1 = "Select NumRes, Date_format(DateRes,'%w') as jour, DebRes, (DebRes + TempsSoin + 20) as finsoin
						From Soins S, reservation R 
						Where S.numSoin = R.numSoin 
						And Date_format(DateRes,'%u') = Date_format(curdate(),'%u')
						And NumCabine = 1
						Group by DateRes, DebRes;";
	$res_soin1 = mysqli_query($cnx, $req_select_soin1) or die(mysqli_error($cnx)); 
	
	While ($ligne = mysqli_fetch_array($res_soin1)){
		if ($ligne['jour']==0){
		  $ligne['jour'] = 7;
		}
		$contenusCelules1[] = new PlanningCellule($ligne['jour'], $ligne['DebRes'], $ligne['finsoin'], '#900', '');
	}
	
	

	$req_select_soin2 = "Select NumRes, Date_format(DateRes,'%w') as jour, DebRes, (DebRes + TempsSoin + 20) as finsoin
						From Soins S, reservation R 
						Where S.numSoin = R.numSoin 
						And Date_format(DateRes,'%u') = Date_format(curdate(),'%u')
						And NumCabine = 2
						Group by DateRes, DebRes;";
	$res_soin2 = mysqli_query($cnx, $req_select_soin2) or die(mysqli_error($cnx)); 
	
	While ($ligne = mysqli_fetch_array($res_soin2)){
		if ($ligne['jour']==0){
		  $ligne['jour'] = 7;
		}
		$contenusCelules2[] = new PlanningCellule($ligne['jour'], $ligne['DebRes'], $ligne['finsoin'], '#900', '');
	}
	


	$req_select_soin3 = "Select NumRes, Date_format(DateRes,'%w') as jour, DebRes, (DebRes + TempsSoin + 20) as finsoin
						From Soins S, reservation R 
						Where S.numSoin = R.numSoin 
						And Date_format(DateRes,'%u') = Date_format(curdate(),'%u')
						And NumCabine = 3
						Group by DateRes, DebRes;";
	$res_soin3 = mysqli_query($cnx, $req_select_soin3) or die(mysqli_error($cnx)); 
	
	While ($ligne = mysqli_fetch_array($res_soin3)){
		if ($ligne['jour']==0){
		  $ligne['jour'] = 7;
		}
		$contenusCelules3[] = new PlanningCellule($ligne['jour'], $ligne['DebRes'], $ligne['finsoin'], '#900', '');
	}
	


	$req_select_soin4 = "Select NumRes, Date_format(DateRes,'%w') as jour, DebRes, (DebRes + TempsSoin + 20) as finsoin
						From Soins S, reservation R 
						Where S.numSoin = R.numSoin 
						And Date_format(DateRes,'%u') = Date_format(curdate(),'%u')
						And NumCabine = 4
						Group by DateRes, DebRes;";
	$res_soin4 = mysqli_query($cnx, $req_select_soin4) or die(mysqli_error($cnx)); 
	
	While ($ligne = mysqli_fetch_array($res_soin4)){
		if ($ligne['jour']==0){
		  $ligne['jour'] = 7;
		}
		$contenusCelules4[] = new PlanningCellule($ligne['jour'], $ligne['DebRes'], $ligne['finsoin'], '#900', '');
	}
	


	$req_select_soin5 = "Select NumRes, Date_format(DateRes,'%w') as jour, DebRes, (DebRes + TempsSoin + 20) as finsoin
						From Soins S, reservation R 
						Where S.numSoin = R.numSoin 
						And Date_format(DateRes,'%u') = Date_format(curdate(),'%u')
						And NumCabine = 5
						Group by DateRes, DebRes;";
	$res_soin5 = mysqli_query($cnx, $req_select_soin5) or die(mysqli_error($cnx)); 
	
	While ($ligne = mysqli_fetch_array($res_soin5)){
		if ($ligne['jour']==0){
		  $ligne['jour'] = 7;
		}
		$contenusCelules5[] = new PlanningCellule($ligne['jour'], $ligne['DebRes'], $ligne['finsoin'], '#900', '');
	}


 ?>
 


<span id=1>
 <link rel="stylesheet" type="text/css" media="screen" href="/include/planning.css" />
 	<div id="planning">
	 <?php
 	$contenusCelules1[] = new PlanningCellule(2, 1205, 1210, '#0007000A', '');
	$planning1 = new Planning(1,7,480,1200,5,$contenusCelules1);
 	$planning1->afficherHtmlTable();
 	?>
 	</div>
 <input name="cabine1"></span>

 <span id=2>
 <div id="planning">
 <?php
 $contenusCelules2[] = new PlanningCellule(2, 1205, 1210, '#0007000A', '');
 $planning2 = new Planning(1,7,480,1200,5,$contenusCelules2);
 $planning2->afficherHtmlTable();
 ?>
 </div>
 <input name="cabine2"></span>

 <span id=3>
 <div id="planning">
 <?php
 $contenusCelules3[] = new PlanningCellule(2, 1205, 1210, '#0007000A', '');
 $planning3 = new Planning(1,7,480,1200,5,$contenusCelules3);
 $planning3->afficherHtmlTable();
 ?>
 </div>
 <input name="cabine3"></span>

 <span id=4>
 <div id="planning">
 <?php
 $contenusCelules4[] = new PlanningCellule(2, 1205, 1210, '#0007000A', '');
 $planning4 = new Planning(1,7,480,1200,5,$contenusCelules4);
 $planning4->afficherHtmlTable();
 ?>
 </div>
 <input name="cabine4"></span>

 <span id=5>
 <div id="planning">
 <?php
 $contenusCelules5[] = new PlanningCellule(2, 1205, 1210, '#0007000A', '');
 $planning5 = new Planning(1,7,480,1200,5,$contenusCelules5);
 $planning5->afficherHtmlTable();
 ?>
 </div>
 <input name="cabine5"></span>
   
  <?php
echo '<script type="text/javascript">effacerstart();</script>';
?>

  
  <!--==============================footer=================================-->
  <?php include_once $racine . '/borabora/include/footer.php' ?>
</body>
</html>