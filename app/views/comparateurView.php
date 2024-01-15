<?php

class comparateurView extends View{

public function __construct($data){
    $this->setData($data);
    $this->navbar();
    $this->comparator();
    $this->compResults($this->data);
    $this->footer();
}

protected function compResults($data){
    echo '
    <section class="my-5 mx-5" style="color:#3b0000">';
    if($data['vehicules']){
        echo '
            <h1>Résultat de Comparaisons</h1>
            <table class="table table-striped table-bordered table-center" style="margin-top:100px; background-color: #F5F5F5;color:#3B0000;font-size:24px;">
            <thead>
            <tr>
                <th>caractéristique</th>';
                for($i=1;$i<=count($data['vehicules']);$i++){
                  echo "<th>Véhicule".$i."</th>";
                }
            echo '</tr>
        </thead>
        <tbody>
            <tr>
                <td style="font-weight:500">Image</td>';
                for($i=1;$i<=count($data['vehicules']);$i++) {
                  echo '<td><img src="'.ROOT.'img/'.$data['vehicules'][$i][0]->lien.'.png" style="width:150px;height:150px;" alt="'.$i.'"></td>';
                }
        echo '                
            </tr>
            <tr>
                <td style="font-weight:500">nom</td>';
                for($i=1;$i<=count($data['vehicules']);$i++) {
                  echo '<td>'.$data['vehicules'][$i][0]->vehicule_nom.'</td>';
                }
            echo '
            </tr>
            <tr>
                <td style="font-weight:500">marque</td>';
                for($i=1;$i<=count($data['vehicules']);$i++) {
                  echo '<td>'.$data['vehicules'][$i][0]->marque_nom.'</td>';
                }
                
            echo '</tr>
            <tr>
                <td style="font-weight:500">modele</td>';
                for($i=1;$i<=count($data['vehicules']);$i++) {
                  echo '<td>'.$data['vehicules'][$i][0]->modele_nom.'</td>';
                }

            echo '</tr>
            <tr>
                <td style="font-weight:500">version</td>';
                for($i=1;$i<=count($data['vehicules']);$i++) {
                  echo '<td>'.$data['vehicules'][$i][0]->version_nom.'</td>';
                }
            echo '</tr>
            <tr>
                <td style="font-weight:500">année</td>';
                for($i=1;$i<=count($data['vehicules']);$i++) {
                  echo '<td>'.$data['vehicules'][$i][0]->annee_nom.'</td>';
                }
            echo '</tr>';
            for($i=0;$i<count($data['vehicules'][1]);$i++){
              echo '<tr><td style="font-weight:500">'.$data['vehicules'][1][$i]->feature_name.'</td>';
              for($j=1;$j<=count($data['vehicules']);$j++) {
                echo '<td>'.$data['vehicules'][$j][$i]->feature_value.'</td>';
              }
              echo '</tr>';
            }
            echo '
            <tr>
                <td style="font-weight:500">prix</td>';
                for($i=1;$i<=count($data['vehicules']);$i++) {
                  echo '<td>'.$data['vehicules'][$i][0]->prix.' DA</td>';
                }
            echo '</tr>
    </tbody>
    </table>
    </section>';
            }else{
                echo '
                <section class="my-5 mx-5" style="color:#3b0000"><h1>Pas de résultats (pas de comparaison faite)<h1><section>
                ';
            }
}
}


?>