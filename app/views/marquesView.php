<?php

class marquesview extends View{
    public function __construct($data){
        $this->setData($data);
        $this->navbar();
        $this->marqueDisplay();
        $this->footer();
    }
}

?>