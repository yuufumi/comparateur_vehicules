<?php
class adminView extends View{
    public function __construct(){
        echo '<div class="d-flex">';
        $this->hNavbar();
        $this->Sections();
        echo '</div>';
    }



    protected function Sections(){

        echo '
        <section class="my-5 container">
  <div class="my-5 row mx-5">
    <div class="col-md-6 my-5" style="text-align:center;height:350px;width:350px">
    <a style="text-decoration: none; color: #3b0000" href="'.ADMIN.'users">
      <img src="'.ADMIN.'/img/user.svg" class="img-fluid">
      <h1 class="mt-5">Gestionnaire d utilisateurs</h1>
    </a>
      </div>
    <div class="col-md-6 mx-5 my-5" style="text-align:center;height:350px;width:350px">
    <a style="text-decoration: none; color: #3b0000" href="'.ADMIN.'news">
      <img src="'.ADMIN.'/img/news.svg" class="img-fluid">
      <h1 class="mt-5">Gestionnaire de news</h1>
    </a>
      </div>
    <div class="col-md-6 my-5" style="text-align:center;height:350px;width:350px">
    <a style="text-decoration: none; color: #3b0000" href="'.ADMIN.'avis">
    <img src="'.ADMIN.'/img/avis.svg" class="img-fluid">
    <h1 class="mt-5">Gestionnaire d avis</h1>
  </a>
    </div>
  </div>
  <div class="my-5 row mx-5 my-5">
    <div class="col-md-6" style="text-align:center;height:350px;width:350px">
    <a style="text-decoration: none; color: #3b0000" href="'.ADMIN.'vehicules">
      <img src="'.ADMIN.'/img/vehicules.svg" class="img-fluid">
      <h1 class="mt-5">Gestionnaire de vehicules</h1>
    </a>
      </div>
    <div class="col-md-6 mx-5 my-5" style="text-align:center;height:350px;width:350px">
    <a style="text-decoration: none; color: #3b0000" href="'.ADMIN.'settings">
      <img src="'.ADMIN.'/img/settings.svg" class="img-fluid">
      <h1 class="mt-5">Paramètres</h1>
    </a>
      </div>
  </div>
</section>';
    }
}
?>



