<?php 
class editNewsView extends View{
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
  <form action="'.ADMIN.'news/edit/'.$data['news'][0]->news_id.'" method="POST">
    <div class="row mb-3 py-5">
        <input class="my-4" name="image_id" type="text" class="form-control" placeholder="Nom" value='.$data['news'][0]->id.' hidden>
        <label class="my-4"><h3>Titre</h3></label>
        <textarea class="my-4" name="titre" class="form-control" placeholder="Nom">'.$data['news'][0]->titre.'</textarea>
        <label class="my-4"><h3>contenu</h3></label>
        <textarea class="my-4" style="height:200px;" name="contenu" class="form-control" placeholder="contenu" value='.$data['news'][0]->contenu.'>'.$data['news'][0]->contenu.'</textarea>

        <label class="my-4"><h3>Image</h3></label>
        <input class="my-4" name="image" type="file" class="form-control" placeholder="Upload an image" value='.$data['news'][0]->lien.'>
    </div>
    <button type="submit" class="btn btn-danger btn-lg ">Modifier Ce News</button>
  </form>
</div>

    ';
}
}

?>