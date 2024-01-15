<?php

class avisVehicule extends View{
    public function __construct($data){
        $this->setData($data);
        $this->navbar();
        $this->CarDesc();
        $this->AvisListe($this->data);
        $this->footer();
      }


    protected function CarDesc(){
        echo '<section class="row my-5 ">
        <img class="voiture mx-5 col-lg-4" src="'.ROOT.'/img/'.$this->data['vehicule']->lien.'.png" alt="logo">
        <div class="col-lg-4" style="text-align:center">
            <h1 class="py-5" style="color:#3b0000">'.$this->data['vehicule']->vehicule_nom.'</h1>
            <a class="btn btn-danger" href='.ROOT.'vehicules/'.$this->data['vehicule']->vehicule_id.'<h3 style="font-size:32px">Voir détails</h3></a>
        </div>
        </section>
        ';
    }

    protected function AvisListe($data){
        echo '
        <section class="container">
            <div class="swiper avisswiper swiper-h"> 
                <div class="swiper-wrapper">'; 
            if(!empty($data['avis'])){
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
                          <p class="card-text">Comment from user '. $data['avis'][$ind]->nom . ' ' . $data['avis'][$ind]->prenom.'</p>
                          <p class="medium text-muted">'.$data['avis'][$ind]->commentaire.'</p>
                        </div>
                      </div>
                    </div>';
                    $ind = $ind+1;
                  }
                  echo "</div>";
              }
            }else{
              echo "<h1>Pas D avis Disponible</h1>";
            }
            echo '
            </div>
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
        </section>
        ';
    }
}

?>