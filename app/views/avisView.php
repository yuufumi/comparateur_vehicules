<?php

class avisView extends View{
  public function __construct($data){
    $this->navbar();
    $this->setData($data);
    $this->listVehicules($this->data);
    $this->footer();
  }

  protected function listVehicules($data){
    echo '<h1 class="mx-5 my-5" style="font-weight:bold;color:#3b0000">Avis: </h1>
    <div class="swiper myswiper">
    
     <div class="row mx-5">';
        foreach($data['vehicules'] as $row) {
          echo 
          "<div class='card mx-5 px-2 my-2 col-md-3' style='border-radius:25px;border: 2px solid #3b0000; background-color:transparent; color:#3b0000'>
              <a href='".ROOT."avis/details/".$row->id."' style=' text-align:center'><img src='".ROOT."img/".$row->lien.".png' class='card-img mt-5' style='margin: auto;' alt='...'></a>
                <h3 class='card-title py-2' style='text-align:center;'>".$row->nom."</h3>
            </div>";
        }
        echo '
       </div>    
     </div>';
  }
}

?>


