<?php
  class homeView extends View{
    public function __construct($data){
      $this->setData($data);
      $this->navbar();
      $this->newsDiapo();
      $this->sectionsNav();    
      $this->marqueDisplay();  
      $this->comparator();
      $this->guide();
      $this->comparaisons();
      $this->footer();
    }

    protected function newsDiapo(){
      echo '<div id="news">
      <div class="swiper newsswiper">
      <div class="swiper-wrapper">';
      foreach ($this->data['news'] as $row) {
        echo '<div class="swiper-slide">
        <a href="'.ROOT.'news/'.$row->news_id.'"><img src="'.ROOT.'/img/'.$row->lien.'.png" class="d-block w-100" alt="..."></a>
              </div>';
      }
      echo '</div>
        
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <script>
    const newsswiper = new Swiper(".newsswiper", {
      autoplay: {
        delay: 5000, // 5 seconds
        disableOnInteraction: false, // Continue autoplay after user interaction
      },
      loop: true,
      navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    });
    </script>

    </div>
    </div>';
    }

    protected function sectionsNav(){
      echo '<nav class="navbar navbar-expand-lg navbar-light justify-content-start" style="background-color: #FCFAEF">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item2">
          <a class="nav-link" href="'.ROOT.'">Accueil</a>
        </li>
        <li class="nav-item2">
          <a class="nav-link" href="'.ROOT.'news">News</a>
        </li>
        <li class="nav-item2">
          <a class="nav-link" href="'.ROOT.'comparateur">Comparateur</a>
        </li>
        <li class="nav-item2">
          <a class="nav-link" href="'.ROOT.'marques">Marques</a>
        </li>

        <li class="nav-item2">
          <a class="nav-link" href="'.ROOT.'avis">Avis</a>
        </li>
        
        <li class="nav-item2">
          <a class="nav-link" href="'.ROOT.'guide">Guide </a>
        </li>
        <li class="nav-item2">
          <a class="nav-link" href="'.ROOT.'contact">Contact</a>
        </li>
      </ul>
      </nav>';
    }

    

    

    protected function guide(){
      echo '<section id="guide" class="container-fluid pt-5" style="padding-top: 200px;">
      <p class="mx-5 pt-5" style="color:#3B0000;font-weight:bold; font-size:60px;">GUIDE DACHAT</p>
      <h4 class="mx-5 pt-5" style="color:#3B0000;font-weight:bold;">Le guide d achat de voitures est un outil essentiel qui offre aux consommateurs une source fiable d"informations et de conseils lorsqu"ils envisagent l"acquisition d"un véhicule. Ce guide fournit une analyse détaillée des différentes marques, modèles et caractéristiques disponibles sur le marché automobile, permettant aux acheteurs de prendre des décisions éclairées en fonction de leurs besoins spécifiques. En explorant des critères tels que la consommation de carburant, la sécurité, les performances, le coût d"entretien, et d"autres facteurs cruciaux, les utilisateurs sont en mesure de comparer les options et de sélectionner le véhicule qui correspond le mieux à leurs préférences et à leur budget. De plus, le guide d"achat peut également fournir des informations sur les tendances du marché, les innovations technologiques, et les avis d"experts, offrant ainsi une perspective holistique pour guider les consommateurs tout au long du processus d"achat, de la recherche initiale jusqu"à la prise de décision finale. En résumé, le guide d"achat de voitures représente une ressource inestimable, simplifiant le processus d"achat et permettant aux consommateurs de choisir un véhicule qui répond à leurs besoins spécifiques et à leurs attentes.</h4>
      <button class="btn float-end mx-5 my-5" style="border-radius:20px; font-size:24px;font-weight:bold;color:#F5F5F5; background-color:#3B0000">En savoir plus >></button>
    </section>';
    }

    protected function comparaisons(){
      echo ' <section class="container-fluid px-4" style="padding-top: 200px;">
      <h1 class="mx-5 pt-5" style="color:#3B0000;font-weight:bold;font-size:66px;">Top Comparaisons recherchées</h1>
      <table class="table table-striped table-bordered table-center" style="margin-top:100px; background-color: #F5F5F5;color:#3B0000;font-size:24px;">
      <thead>
        <tr>
          <th>Véhicule 1</th>
          <th>Véhicule 2</th>
          <th>Fréquence</th>
        </tr>
      </thead>
      <tbody>';
      foreach($this->data['comps'] as $row){
            echo '<tr><td>'.$row->first_car_name.'</td>';
            echo '<td>'.$row->second_car_name.'</td>';
            echo '<td>'.$row->frequence.'</td></tr>';
      }
      echo '
        </tbody>
    </table>
    </section>
    ';
    }
  }
?>


