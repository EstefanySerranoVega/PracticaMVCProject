<?php
require_once('Controllers/Errores.php');
Class App{

    function __construct(){
        $url = isset($_GET['url']) ? $_GET['url'] :null ;
        $url = rtrim($url,'/');
        
        $arrayUrl = explode('/',$url);
        
        if(empty($arrayUrl[0])){
            $archivoController =('controllers/home.php');
            error_log('App::archivoController-> '.$archivoController);
            require_once($archivoController);
            $controller = new Home();
            $controller->loadModel('Home');
            $controller->render();
            // echo('funciona');
            return false;
        } 
            
        $archivoController = 'Controllers/'.$arrayUrl[0].'.php';
        
        if(file_exists($archivoController)){
            error_log($archivoController);
            require_once($archivoController);
            $controller = new $arrayUrl[0];
       
            $controller->loadModel($arrayUrl[0]);
       
            if(isset($arrayUrl[1])){
                if(method_exists($controller,$arrayUrl[1])){
                    if(isset($arrayUrl[2])){
                        $nparam = sizeof($arrayUrl)-2; 
                        $param =[];
                        for($i=0;$i<$nparam;$i++){
                            array_push($param,$arrayUrl[$i]);
                        }
                        $controller->{$arrayUrl[1]}($param);
                    }else{
                    //no tiene parámetros
                        $controller->{$arrayUrl[1]}();
                    }
                    }else{
                        $controller = new Errores();
                        //no existe el método
                    }
            }else{
                $controller->render();
            //si no existe el método, se cargará uno por defecto
             }
        }else{
            $controller = new Errores();
        }
        
    }
}
?>