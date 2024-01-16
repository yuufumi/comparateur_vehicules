<?php
class usersView extends View{
    public function __construct($data){
        echo '<div class="d-flex">';
        $this->setData($data);
        $this->hNavbar();
        echo '<div style="margin-top:150px;margin-left:50px;">';
        $this->filterSort($this->data);
        $this->usersTable($this->data);
        echo '</div>';
        echo '</div>';
    }

    protected function usersTable($data){
        echo '
        <section class="my-5 mx-5" style="color:#3b0000">';
        if(!empty($data['users'])){
            echo '
                <table class="table table-striped table-bordered table-center" style="margin-top:100px; background-color: #F5F5F5;color:#3B0000;font-size:24px;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Sexe</th>
                        <th>Date de naissance</th>
                        <th>Statut</th>
                        <th>Modifier</th>
                    </tr>
                </thead>
                <tbody>
                <tr>';
                foreach($data['users'] as $row) {
                    foreach($row as $key => $value) {
                        echo '<td>'.$value.'</td>';
                    }
                    echo '<td><a href="'.ADMIN.'users/edit/'.$row->id.'"><button type="submit" class="btn btn-primary">Modifier</button></a></td></tr>';
                }

        echo '</tbody>
        </table>
        </section>';
                }else{
                    echo '
                    <section class="my-5 mx-5" style="color:#3b0000"><h1>No users found<h1><section>
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