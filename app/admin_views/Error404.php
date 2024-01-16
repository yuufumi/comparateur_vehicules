<?php 
class Error404 extends View {
    public function __construct(){
        $this->Error();
    }

    protected function Error(){
        echo '<h1>PAGE NOT FOUND</h1>';
    }
}
?>

