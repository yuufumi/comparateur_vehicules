    <?php

    class profileView extends View{
      public function __construct($data){
        $this->setData($data);
        $this->navbar();
        $this->me($this->data);
        $this->favoris($this->data);
        $this->mesAvis($this->data);
        $this->footer();
      }

      protected function me($data){
        echo '<section class="d-flex align-items-center px-5">
        <h1 class="mx-5 mt-5" style="color:#3b0000; font-size:72px;">'.$data['user'][0]->nom.' '.$data['user'][0]->prenom .'</h1>
        <div class="mx-5 mt-5">
            <h3 class="my-3">'.count($data['favoris']).'Véhicules Aimé</h3>
            <h3>'.count($data['avis']).' Avis publié</h3>
        </div>
        <form class="mx-5 mt-5" action="'.ROOT.'/logout" method="post">
            <input type="submit" class="btn btn-danger btn-lg" style="margin-left:400px;--bs-btn-font-size: 32px" value="Se deconnecter">
        </form>
        </section>'; 
      }

      protected function favoris($data){
        echo '
        <section class="container-fluid py-5">
        <h1 class="mx-5 my-5 justify-content-start" style="color: #3B0000; font-weight: bold">Vos véhicules favoris:</h1>
        <div class="swiper favswiper">
          <div class="swiper-wrapper">';
          if(!empty($data['avis'])){
                foreach($data['favoris'] as $row) {  
                  echo 
                  "<div class='swiper-slide'>
                    <div class='card mx-5 px-2' style='border-radius:25px; /*background-color:#3B0000;*/ color:#3B0000'>
                      <img src='".ROOT."/img/".$row[0]->lien.".png' class='card-img mt-5' style='margin: auto;' alt='...'>
                      <div class='card-body' style='text-align:center'>
                        <h4 class='card-title' style='text-align:center;'>".$row[0]->vehicule_nom."</h4>
                        <a href='".ROOT."vehicules/".$row[0]->vehicule_id."' class='btn btn-danger mt-2' style='border-radius:20px; width:100px;'>Détails</a>
                      </div>
                    </div>
                  </div>";
                }
              }else{
                echo "<h1>Vous n'avez publié aucune avis</h1>";
              }
          echo '</div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
    
          <script>
          const favswiper = new Swiper(".favswiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          });
        </script>
        </div>
      </section>';
      }

      protected function mesAvis($data){
        echo '  <section class="column my-5 mx-5">
        <h1 class="mb-5" style="font-weight:bold;color:#3b0000">Vos avis publiés</h1>
        <div class="swiper avisswiper swiper-h"> 
        <div class="swiper-wrapper">';
        count($data['avis'])< 5 ? $cpt = 1 : $cpt = count($data['avis'])/5 +1;
        $remaining = count($data['avis']);
        $ind = 0;
        for($j=1;$j<=$cpt;$j++){
            echo '<div class="swiper-slide column">';
            if($remaining>=5){
              $cpte = 5;
              $remaining = $remaining -5;
            }else{
              $cpte = $remaining;
            }
            for($i=1;$i<=$cpte;$i++){
              echo '<div class="col-lg mb-4">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="card-title">Avis</h5>
                  <span class="badge rounded-pill" style="background-color:#1b1717;">'.$data['avis'][$ind]->note.'</span>
                </div>
                <div class="card-body">
                  
                  <p class="card-text">Statut du commentaire: >';
                  if($data['avis'][$ind]->statut==="pending"){echo '<div class="btn btn-warning">En Attente</div>';}
                  else if($data['avis'][$ind]->statut==="approved"){echo '<div class="btn btn-success">Validé</div>';}
                  else{echo '<div class="btn btn-danger">Bloqué</div>';}
                  echo '</p>
                  <p class="medium text-muted">'.$data['avis'][$ind]->commentaire.'</p>
                </div>
              </div>
            </div>';
            $ind = $ind+1;
          }
          echo "</div>";
      }
      echo '</div>
      <div class="swiper-pagination"></div>
      </div>
      <script>
      var swiper = new Swiper(".avisswiper", {
        cssMode: true,
        pagination: {
          el: ".swiper-pagination",
          clickable:true
        },
        mousewheel: true,
        keyboard: true,
      });
    </script>
      </section>';
      }
    
    }
    ?>
    