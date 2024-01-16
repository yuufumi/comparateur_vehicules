<?php 
class addNewsView extends View{
    public function __construct($data){
        $this->setData($data);
        echo '<div class="d-flex">';
        $this->hNavbar();
        $this->addForm($this->data);
        echo '</div>';
    }


protected function addForm($data){
    echo '
    <div class="container" style="margin-top: 200px;">
    <h1 class="mb-5">Modifier les information d"un utilisateur</h1>
  <form action="'.ADMIN.'news/add" method="POST">
    <div class="row mb-3 py-5">
        <label class="my-4"><h3>Titre</h3></label>
        <textarea class="my-4" name="titre" class="form-control" placeholder="Nom"></textarea>
        <label class="my-4"><h3>contenu</h3></label>
        <textarea class="my-4" style="height:200px;" name="contenu" class="form-control" placeholder="contenu"></textarea>

        <label class="my-4"><h3>Image</h3></label>
        <input class="my-4" name="image" type="file" class="form-control" placeholder="Upload an image">
    </div>
    <button type="submit" class="btn btn-danger btn-lg ">Ajouter news</button>
  </form>
</div>

    ';
}
}

?>