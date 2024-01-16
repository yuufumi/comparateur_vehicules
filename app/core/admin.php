<?php
class AdminApp
{

    private $controller = 'admin';
    private $method = 'index';

    private $params = [];
    private function splitURL(){
        $url = isset($_GET['url']) ? $_GET['url'] : "admin";
        return explode("/", filter_var(trim($url,"/"),FILTER_SANITIZE_URL));
    } 


    public function __construct(){
        $url = $this->splitURL();
        if(file_exists("../app/admin_controllers/".strtolower($url[0]).".php")){
            $this->controller = strtolower($url[0]);
            unset($url[0]);
        }else{
            $this->controller = "erreur";
        }

        require "../app/admin_controllers/".$this->controller.".php";
        $this->controller = new $this->controller;
        if(isset($url[1])){
            if(method_exists($this->controller,$url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //run class and method
        $this->params = array_values($url);
        call_user_func_array([$this->controller,$this->method], $this->params);
    }
}