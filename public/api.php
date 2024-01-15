<?php
    require_once "../app/init.php"; 
    $controller = new Controller();
    if(!empty($_POST['marque'])){
        $modeles = $controller->loadModel('modele');
        $arr = $modeles->getModele($_POST['marque']);
        echo "<option value=''>Selectionner un modèle</option>";
        foreach($arr as $row){
            echo "<option value=".$row->id.">".$row->modele_nom."</option>";
        }
    }elseif(!empty($_POST['modele'])){
        $versions = $controller->loadModel('version');
        $ver = $versions->getVersions($_POST['modele']);
        echo "<option value=''>Selectionner une version</option>";
        foreach($ver as $v){
        echo "<option value=".$v->id.">".$v->version."</option>";
        }
    }elseif(!empty($_POST['version'])){
        $versions = $controller->loadModel('version');
        $ann = $versions->getAnnees($_POST['version']);
        echo "<option value=''>Selectionner une annee</option>";
        foreach($ann as $a){
            echo "<option value=".$a->id.">".$a->annee."</option>";
        }
    }
    
    ?>