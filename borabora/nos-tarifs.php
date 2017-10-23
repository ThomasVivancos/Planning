<?php
$racine = $_SERVER['DOCUMENT_ROOT'];
require_once $racine .'/borabora/connexion.php';

// Exécution d'une requête, on récupère toues les consommations de disponibles
$requete = "select cc.lib_cat, c.lib_cons, c.prix_cons from consommation c inner join cat_cons cc on cc.cat = c.cat;";
$resultat = mysqli_query($cnx, $requete) or die(mysqli_error($cnx)); // or die() est pour la détection des erreurs

$req_select_brasserie = "SELECT * from brasserie b inner join cat_brasserie cb on cb.cat = b.cat;";
$res_brasserie = mysqli_query($cnx, $req_select_brasserie) or die(mysqli_error($cnx));

// On rempli un tableau à deux dimensions à partir du résultat de la requête cons
$prix_par_categorie = array();
while ($enregistrement = mysqli_fetch_assoc($resultat)) {
  $prix_par_categorie[$enregistrement['lib_cat']][] = array(
    'libelle' => $enregistrement['lib_cons'],
    'prix' => $enregistrement['prix_cons']
  );
}

// On rempli un tableau à deux dimensions à partir du résultat de la requête brasserie
$prix_par_categorie_brasserie = array();
while ($done = mysqli_fetch_assoc($res_brasserie)) {
  $prix_par_categorie_brasserie[$done['cat']][] = array(
    'libelle' => $done['lib_plat'],
    'prix' => $done['prix_plat']
  );
}


// On récupère le nombre de catégories pour gérer l'affichage par colonnes
$nb_categories = count($prix_par_categorie);
$categorie_plat = count($prix_par_categorie_brasserie);

?><!DOCTYPE html>
<html lang="fr">
<head>
  <title>Nos prestations - Le Bora-Bora</title>
  <?php include_once $racine .'/borabora/include/head.php' ?>
</head>
<body>
  <?php include_once $racine .'/borabora/include/header.php' ?>
   
    <div class="container_12 top">
        
      <!--==============================Le BAR================================-->
      <div class="grid_12 box-2 pad-1">
        <div>
          <p class="text-3">LE BAR</p>
        </div>
      </div>
      
      <div class="grid_6">
        <ul class="list-2 top-5">
          <?php
          $moitie = ceil($nb_categories / 3);
          reset($prix_par_categorie);

          for ($cpt=0; $cpt<$moitie; $cpt++) {
          ?>
          <li>
            <?php echo key($prix_par_categorie); ?>
            <ul>
              <?php foreach (current($prix_par_categorie) as $consommation) { ?>
              <li>
              <?php echo '
              <table> 
                <tr>
                  <td><b>'.$consommation['libelle'].'</b></td>
                '
                   .' '.'<td width="20%"><b><font color="#FF8000">'. $consommation['prix'].' CFP'.'</font></b></td></tr>
              </table>'
                    ?></li>
              <?php } ?>
            </ul>
          </li>
          <?php next($prix_par_categorie); } ?>
        </ul>
      </div>

      <div class="grid_6">
        <ul class="list-2 top-5">
          <?php for (; $cpt<$nb_categories; $cpt++) { ?>
          <li>
            <?php echo key($prix_par_categorie); ?>
            <ul>
              <?php foreach (current($prix_par_categorie) as $consommation) { ?>
              <li><?php echo '
              <table>
                  <tr>
                      <left><td width="50%"><b>'.$consommation['libelle'].'</b></td>' .'  '.'<td width="19%"><b><font color="#FF8000">'. $consommation['prix'].' CFP'.'</td></font></b></left>
                  </tr>
              </table>' ?></li>
              <?php } ?>
            </ul>
          </li>
          <?php next($prix_par_categorie); } ?>
        </ul>
      </div>

<!--==============================LE RESTO================================-->

      <div class="grid_12 box-2 pad-1">
        <div>
          <p class="text-3">LE RESTO</p>
        </div>
      </div>

      
      <div class="grid_6">
        <ul class="list-2 top-5">
          <?php
          $moitie1 = ceil($categorie_plat / 3);
          reset($prix_par_categorie_brasserie);

          for ($cpt1=0; $cpt1<$moitie1; $cpt1++) {
          ?>
          <li>
            <?php echo key($prix_par_categorie_brasserie); ?>
            <ul>
              <?php foreach (current($prix_par_categorie_brasserie) as $brasserie) { ?>
              <li>
              <?php echo '
              <table> 
                <tr>
                  <td><b>'.$brasserie['libelle'].'</b></td>
                '
                   .' '.'<td width="20%"><b><font color="#FF8000">'. $brasserie['prix'].' CFP'.'</font></b></td></tr>
              </table>'
                    ?></li>
              <?php } ?>
            </ul>
          </li>
          <?php next($prix_par_categorie_brasserie); }?>
        </ul>
      </div>

      <div class="grid_6">
        <ul class="list-2 top-5">
          <?php for (; $cpt1<$categorie_plat; $cpt1++) { ?>
          <li>
            <?php echo key($prix_par_categorie_brasserie); ?>
            <ul>
              <?php foreach (current($prix_par_categorie_brasserie) as $brasserie) { ?>
              <li><?php echo '
              <table>
                  <tr>
                      <left><td width="50%"><b>'.$brasserie['libelle'].'</b></td>' .'  '.'<td width="19%"><b><font color="#FF8000">'. $brasserie['prix'].' CFP'.'</td></font></b></left>
                  </tr>
              </table>' ?></li>
              <?php } ?>
            </ul>
          </li>
          <?php next($prix_par_categorie_brasserie); } ?>
        </ul>
      </div>

   <!--==============================LE SPA================================-->  
  
<?php
    $req_select_soin = "select * from soins;";
    $res_soin = mysqli_query($cnx, $req_select_soin) or die(mysqli_error($cnx)); 
?>      
      <div class="grid_12 box-2 pad-1">
        <div>
              <p class="text-3">LE SPA</p>
          </div>
      </div>
      
      <div class="grid_12">
        <ul class="list-2 top-5">
          <li>
          Soins
            <ul>
               <?php
                  $ligne = mysqli_fetch_assoc($res_soin);
                    while ($ligne != false) { ?>
                  <li><hr><?php echo '<b>'.$ligne['libelleSoin'].'</b>'. ' : ' .'<i>' .$ligne['description'].'</i>'. ' - ' .'<font color="#04B404"><b>'.$ligne['tempsSoin'].'min '.'</font></b>'. ' - ' .'<font color="#FF8000"><b>'.$ligne['prixSoin']. ' CFP '.'</font></b>';
                  $ligne = mysqli_fetch_assoc($res_soin); ?> 
                  </li></hr>
                  <?php } ?>
            </ul>
          </li>
        </ul>
      </div>
      
    
  </section>
  
<!--==============================footer=================================-->
  <?php include_once $racine .'/borabora/include/footer.php' ?>
</body>
</html>