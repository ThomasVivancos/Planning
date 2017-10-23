<?php $racine = $_SERVER['DOCUMENT_ROOT'] ?><!DOCTYPE html>
<html lang="fr">

<head>
  <title>Accueil - Le Bora-Bora</title>
  <?php include_once $racine .'/borabora/include/head.php' ?>  
  <link rel="stylesheet" type="text/css" media="screen" href="/borabora/css/slider.css">
  <script>
    $(document).ready(function(){				   	
      $('.slider')._TMS({
        show:0,
        pauseOnHover:true,
        prevBu:false,
        nextBu:false,
        playBu:false,
        duration:800,
        preset:'fade',
        pagination:true,
        pagNums:false,
        slideshow:7000,
        numStatus:false,
        banners:'fade',
        waitBannerAnimation:false,
        progressBar:false
      })		
    });
  </script>
</head>
<body>
  <?php include_once $racine .'/borabora/include/header.php' ?>
  
  <!--==============================Diaporama================================-->
  <div id="slide">
    <div class="slider">
      <ul class="items">
        <li>
          <img src="/borabora/img/32066996.jpg" alt="Vue plage - Hôtel" />
          <div class="banner">
            <p class="text-1a">Un emplacement <strong>Idéal !</strong></p>
            <p class="text-2">Cet établissement est constitué d'une série de confortables chambres, suites, restaurant, bar et spa jouissant tous d'un emplacement idéal face à la mer Turquoise.</p>
          </div>
        </li>
        
        <li>
          <img src="/borabora/img/32067055.jpg" alt="Vue mer" />
          <div class="banner">
            <p class="text-1a">Un environement <strong>Idyllique ...</strong></p>
            <p class="text-2">Parfait pour se relaxer et passer du bon temps avec ses proches. Ici vous allez tout oublier grâce à cette vue magnifique.</p>
          </div>
        </li>
        
        <li>
          <img src="/borabora/img/36805713.jpg" alt="Vue bungalo - Chemins" />
          <div class="banner">
            <p class="text-1a">Un site <strong>Arboré</strong></p>
            <p class="text-2">L'idée du site arboré est née de la volonté de la municipalité d'installer un périmètre de protection en amont on peut concilier en même lieu l'initiation à la botanique, la détente et le repos.</p>
          </div>
        </li>
      </ul>
     </div>
  </div>
  
  <!--==============================content================================-->
  <section id="content">
    <div class="container_12">
      <div class="grid_12 box-1">
        <img src="/borabora/img/page1-img1.png" alt="Picto" />
        <div class="extra-wrap">
          <h2>L'Ile des <span>Pins</span></h2>
          <p>En Nouvelle Calédonie, L’île des Pins est une destination unique.</p>
          <p>Le Bora-Bora Hôtel & Spa, a été construit en 1998 dans un style moderne et comporte des bungalows.</p>
          <p>Dans la baie de Kanumera, près du lagon, l’hôtel séduit par son luxe sage dans une atmosphère unique alliant modernité et gastronomie.</p>
        </div>
      </div>
      
      <div class="grid_8">
        <h2 class="top-1">Nos prestations</h2>
        <div class="box-3">
          <div>
            <img src="/borabora/img/spa.jpg" alt="Spa" class="img-border size-1" />
            <a href="/borabora/modules/prestations/prest_sauna.php" class="link-2">Spa</a>
            <p>Avec piscine intérieure chauffée, sauna, jacuzzi</p>
          </div>
          <div>
            <img src="/borabora/img/resto.jpg" alt="Resto-Bar" class="img-border size-1" />
            <a href="/borabora/modules/prestations/prest_resto_bar.php" class="link-2">Resto-Bar</a>
            <p>Deux restaurants : un à l'interieur, et un au bord de la plage. Le bar MoeMiti propose plusieurs boissons...</p>
          </div>
          <div class="last">
            <img src="/borabora/img/seminaire.jpg" alt="Séminaires / Mariages" class="img-border size-1" />
            <a href="/nos-prestations.php#seminaires" class="link-2">Séminaires / Mariages</a>
            <p>Des salles et salons adaptables à vos besoins</p>
          </div>
       
      
      <div class="clear"></div>
    </div>
  </section>
  
        
  <!--==============================footer=================================-->
  <?php include_once $racine .'/borabora/include/footer.php' ?>
</body>
</html>

