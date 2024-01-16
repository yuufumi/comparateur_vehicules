<?php 
class marqueView extends view{
  public function __construct($data){
    $this->setData($data);
    $this->navbar();
    $this->MarqueDesc($data);
    $this->CarsMarque($this->data);
    $this->topAvis($this->data);
    if(isset($_SESSION['statut'])){
      if($_SESSION['statut']==="approved"){
    $this->VotreAvis($this->data,'marques/details/');
    }
  }
    $this->footer();

  } 

  protected function MarqueDesc($data){
    echo '    <section class="d-flex justify-content-center my-3">
    <div class="mx-5" style="text-align:center">
        <img src="'.ROOT.'/img/'.$data['marque'][0]->lien.'.png" style="width: 250px;height:250px;" alt="">
        <h1 style="color:#3b0000">'.$data['marque'][0]->nom.'</h1>
    </div>    
    <table class="table table-striped table-bordered table-center mx-5" style="background-color: #F5F5F5;color:#3B0000;font-size:24px;">
<tbody>
  <tr>
    <td>Nom: </td>';
    echo '
    <td>'.$data['marque'][0]->nom.'</td>
  </tr>';
  echo '<tr>
    <td>Pays</td>';
    echo '
    <td>'.$data['marque'][0]->pays.'</td>
  </tr>';
  echo '<tr>
    <td>Siège social</td>';
    echo '
    <td>'.$data['marque'][0]->siege_social.'</td>
  </tr>';
  echo '<tr>
    <td>Année de création</td>';
    echo '<td>'.$data['marque'][0]->annee_creation.'</td>
  </tr>
    
</tbody>
</table>
</section>';
  }

  protected function CarsMarque($data){
    echo '<section class="my-5 mx-5">
    <h1 style="color:#3b0000; margin-top:100px;">Véhicule qui ont cette marque:</h1>
    <div class="swiper myswiper">
  <div class="swiper-wrapper">';
        foreach($data['vehicule'] as $row) {
          echo 
          "<div class='swiper-slide'>
            <div class='card mx-5 px-2' style='border-radius:25px; color:#3B0000'>
              <img src='".ROOT."/img/".$row->lien.".png' class='card-img mt-5' style='margin: auto;' alt='...'>
              <div class='card-body' style='text-align:center'>
                <h4 class='card-title' style='text-align:center;'>".$row->vehicule_nom."</h4>
                <a href='".ROOT."vehicules/".$row->vehicule_id."' class='btn btn-danger mt-2' style='border-radius:20px; width:100px;'>Détails vehicule</a>
              </div>
            </div>
          </div>";
        }
  echo '</div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <script>
  const swiper = new Swiper(".myswiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  });
</script>

<!-- If we need navigation buttons -->

</div>
</section>';
  }

  protected function topAvis($data){
    echo '<section class="column my-5 mx-5">
    <h1 class="mb-5" style="font-weight:bold;color:#3b0000">Top avis appreciés</h1>
    ';
    if(!empty($data['avis'])){
      foreach($data['avis'] as $row){
        echo '<div class="col-lg mb-4">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">Avis</h5>
            <span class="badge rounded-pill" style="background-color:#1b1717;">'.$row->note.'</span>
          </div>
          <div class="card-body">
            <p class="card-text">Comment from user '.$row->nom.' '.$row->prenom.'</p>
            <p class="medium text-muted">'.$row->commentaire.'</p>
          </div>
        </div>
      </div>';
    }
    }else{
      echo "<h1>Pas d'avis pour cette marque";
    }
    echo '</section>';
  }

  protected function VotreAvis($data,$cible){
    echo '    
    <section class="column my-5 mx-5">
        <h2 class="mb-5" style="font-weight:bold;color:#3b0000">Votre avis?</h2>
        <div class="container">
          <div class="row">
            <div class="col-lg mb-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Partager votre avis</h4>
        </div>
        <div class="card-body">
          <form id="AvisForm" action="'.ROOT.$cible.$data['marque'][0]->id.'" method="POST">
            <input name="user" value="'.$_SESSION['id'].'" hidden>
            <input name="marque" value="'.$data['marque'][0]->id.'" hidden>
            
            <div class="form-group mt-3">
              <label for="avis">Avis:</label>
              <textarea class="form-control" id="avis" name="avis" rows="3"></textarea>
            </div>
            <div class="form-group mt-3">
              <label for="score">Note (/10):</label>
              <input name="note" type="number" min=0 max=10 class="form-control" id="score" placeholder="Entrer une note (0-10)">
            </div>
            <button id="submitAvis" type="submit" class="btn btn-danger mt-3 float-end btn-lg" style="font-size:24px">Ajouter avis</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
';
  }

}
?>

