<?php
class avisView extends View{
    public function __construct($data){
        echo '<div class="d-flex">';
        $this->setData($data);
        $this->hNavbar();
        echo '<div style="margin-top:150px;margin-left:50px;">';
        $this->avisTable($this->data);
        echo '</div>';
        echo '</div>';
    }

    protected function avisTable($data){
        echo '
        <section class="my-5 mx-5" style="color:#3b0000">';
        if(!empty($data['avis'])){
            echo '
                <table class="table table-striped table-bordered table-center" style="margin-top:100px; background-color: #F5F5F5;color:#3B0000;font-size:24px;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Statut utilisateur</th>
                        <th>vehicule</th>
                        <th>Commentaire</th>
                        <th>note</th>
                        <th>Statut d"avis</th>
                        <th>Modifier statut utilisateur</th>
                        <th>Modifier statut avis</th>
                    </tr>
                </thead>
                <tbody>
                <tr>';
                foreach($data['avis'] as $row) {
                    foreach($row as $key => $value) {
                        if($key === "utilisateur_id"){
                            continue;
                        }
                        echo '<td>'.$value.'</td>';
                    }
                    echo '<td><form action="'.ADMIN.'avis?action=blocked&user='.$row->utilisateur_id.'" method="POST"><button type="submit" class="btn btn-danger btn-lg">Bloquer</button></form></td>';
                    echo '<td><form action="'.ADMIN.'avis?action=approved&avis_id='.$row->avis_id.'" method="POST"><button type="submit" class="btn btn-success btn-lg">Valider</button></form><form action="'.ADMIN.'avis?action=blocked&avis_id='.$row->avis_id.'" method="POST"><button type="submit" class="btn btn-danger btn-lg">Bloquer</button></form></td></tr>';

                }

        echo '</tbody>
        </table>
        </section>';
                }else{
                    echo '
                    <section class="my-5 mx-5" style="color:#3b0000"><h1>Pas d"avis<h1><section>
                    ';
                }
    }

    protected function filterSort($data){
        echo '<div class="container">
        <div class="row justify-content-center">
          <div class="col-md-5">
            <h4 class="mb-3">Filtrer Par</h4>
            <form action="'.ADMIN.'users" method="POST" >
                <select name="filter" class="form-select mb-3">
                    <option value="">Choisir une colonne</option>  
                    <option value="statut">Statut</option>
                </select>
                <select name="statut" class="form-select mb-3">
                    <option value="">choisir un filtre</option>
                    <option value="approved">approved</option>
                    <option value="pending">pending</option>
                    <option value="blocked">blocked</option>
                </select>
                <button type="submit" class="btn btn-danger">Filtrer</button>
            </form>
          </div>
          <div class="col-md-5">
            <h4 class="mb-3">Trier Par</h4>
            <form method="POST" action="'.ADMIN.'users">
              <select name="sort" class="form-select mb-3">
                <option value="">choisir une colonne</option>
                <option value="nom">nom</option>
                <option value="prenom">prenom</option>
                <option value="email">email</option>
                </select>
              <button type="submit" class="btn btn-primary">Trier</button>
            </form>
          </div>
        </div>
      </div>';
    }
}

?>