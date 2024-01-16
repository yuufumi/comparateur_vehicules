<?php
class newsView extends View{
    public function __construct($data){
        $this->setData($data);
        echo '<div class="d-flex">';
        $this->hNavbar();
        $this->newsTable($data);
        echo '<div style="margin-top:150px;margin-left:50px;">';
    }

    protected function newsTable($data){
        echo '
        <section class="my-5 mx-5" style="color:#3b0000">
        <form action="'.ADMIN.'news/add" method="POST"><button type="submit" class="btn btn-danger btn-lg">Ajouter une nouvelle news</button></form>
        ';
        if(!empty($data['news'])){
            echo '
            <table class="table table-striped table-bordered table-center" style="margin-top:100px; background-color: #F5F5F5;color:#3B0000;font-size:24px;">
            <thead>
                <tr>
                <th>titre</th>
                <th>contenu</th>
                <th>image</th>
                <th>ID</th>
                    <th>Modifier news</th>
                </tr>
            </thead>
            <tbody>
            <tr>';
            foreach($data['news'] as $row) {
                foreach($row as $key => $value) {
                    if($key === "lien"){
                        echo '<td><img style="height:200px;width:300px" src="'.ROOT.'/img/'.$value.'.png" alt="'.$value.'"></td>'; 
                    }else if($key === "vehicule_id" || $key === "id" || $key === "marque_id"){continue;}else{
                    echo '<td>'.$value.'</td>';
                }
            }
                echo '<td><a href="'.ADMIN.'news/edit/'.$row->news_id.'"><button type="submit" class="btn btn-primary">Modifier</button></a></td></tr>';

            }

    echo '</tbody>
    </table>
    </section>';
        }else{
            echo '<h1>Pas de News a Afficher</h1>';
        }
    }
}


?>