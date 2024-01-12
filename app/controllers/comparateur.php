<?php

class comparateur extends Controller {
    function index(){
        $vehicules = $this->loadModel('vehicule');
        $comparaisons = $this->loadModel('comparison');
        if(isset($_POST)){
            $arr = array_filter($_POST, function($value) {
                return $value !== '';
            });
            $cars = array();
            foreach ($arr as $key => $value) {
                preg_match('/_(\d+)$/', $key, $matches);
                $numberSuffix = isset($matches[1]) ? $matches[1] : null;
                
                if ($numberSuffix !== null) {
                    $cars[$numberSuffix][$key] = $value;
                }
            }
            $newData = array();

            foreach ($cars as $suffix => $group) {
                foreach ($group as $key => $value) {
                    $newKey = str_replace('_' . $suffix, '', $key);
                    if($newKey !== "version") {
                        $newData[$suffix][$newKey] = $value;
                    }
                }
            }
            for($i = 1; $i <= count($newData); $i++){
                $data['vehicules'][$i] = $vehicules->getByInfo($newData[$i]);
            }
            $marque = $this->loadModel('marque');
            $data['marques'] = $marque->getAll();
            for ($i = 1; $i <= count($data['vehicules']); $i++) {
                for ($j = $i + 1; $j <= count($data); $j++) {
                    $comparaisons->insert(array('id1'=>$data['vehicules'][$i][1]->vehicule_id,'id2'=>$data['vehicules'][$j][1]->vehicule_id));
                }
            }
        }
        $this->view('comparateur',$data);
    }
}

?> 