<?php 
class editUserView extends View{
    public function __construct($data){
        $this->setData($data);
        echo '<div class="d-flex">';
        $this->hNavbar();
        $this->editForm($this->data);
        echo '</div>';
    }


protected function editForm($data){
    echo '
    <div class="container" style="margin-top: 200px;">
    <h1 class="mb-5">Modifier les information d"un utilisateur</h1>
  <form action="'.ADMIN.'users/edit/'.$data['users'][0]->id.'" method="POST">
    <div class="row mb-3 ">
      <div class="col my-5">
        <label><h3>Nom</h3></label>
        <input name="nom" type="text" class="form-control" placeholder="Nom" value='.$data['users'][0]->nom.'>
      </div>
      <div class="col my-5">
        <label><h3>Prenom</h3></label>
        <input name="prenom" type="text" class="form-control" placeholder="Prenom" value='.$data['users'][0]->prenom.'>
      </div>
      <div class="col my-5">
        <label><h3>Email</h3></label>
        <input name="email" type="email" class="form-control" placeholder="Email" value='.$data['users'][0]->email.'>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col my-5">
        <label><h3>Password</h3></label>
        <input name="password" type="text" class="form-control" placeholder="Password" value='.$data['users'][0]->password.'>>
      </div>
      <div class="col my-5">
        <label><h3>Date de naissance</h3></label>
        <input type="date" name="date_de_naissance" class="form-control" placeholder="Password" value='.$data['users'][0]->date_de_naissance.'>>
      </div>
      <div class="col my-5">

        <label><h3>Sexe</h3></label>
        <input id="sx" value='.$data['users'][0]->sexe.' style="display:none">
        <select name="sexe" id="seex" class="form-select" aria-label="Sexe">
          <option value="masculin">masculin</option>
          <option value="feminin">feminin</option>
        </select>
      </div>
      <div class="col my-5">
        <label><h3>Statut</h3></label>
        <input id="st" value='.$data['users'][0]->statut.' style="display:none">
        <select name="statut" id="stat" class="form-select" aria-label="Statut" >
          <option value="approved">Approved</option>
          <option value="pending">Pending</option>
          <option value="blocked">Blocked</option>
        </select>
        </div>
        <script>
        const sxValue = document.getElementById("sx").value;
        const selectSex = document.getElementById("seex");
        const stValue = document.getElementById("st").value;
        const selectStatut = document.getElementById("stat");
        const Sex = selectSex.querySelector(`option[value="${sxValue}"]`);
        Sex.selected = true;
        const Status = selectStatut.querySelector(`option[value="${stValue}"]`);
        Status.selected = true;
          </script>
        </div>
    <button type="submit" class="btn btn-danger btn-lg ">Modifier Ce profil</button>
  </form>
</div>

    ';
}
}

?>