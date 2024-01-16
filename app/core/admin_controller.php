<?php
Class adminController {
    public function view($view,$data= [])
	{
		if(file_exists("../app/admin_views/". $view .".php")){
            require_once "../app/admin_views/". $view .".php";
            $view = new $view($data);
            //return $view;
        }else{
            include "../app/views/Error404.php";
        }
	}

	public function loadModel($model)
	{   
        
		if(file_exists("../app/models/". $model .".php"))
        {   
            require_once "../app/models/". $model .".php";
            $model = new $model();
            return $model;
        }

        return false;
	}
}
?> 