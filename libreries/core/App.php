<?php
require_once('Controllers/Errores.php');
Class App{

    function __construct(){
        $url =! empty($_GET['url']) ? $_GET['url'] :null ;
        $arrayUrl = explode("/",$url);
   /*
        $method = $arrayUrl[0];
        $params = '';
   */
var_dump($url);
var_dump($arrayUrl);
        if(empty($arrayUrl[0])){
            $archivoController =('controllers/home.php');
            require_once($archivoController);
            $controller = new Home();
           $controller->loadModel('Home');
          $controller->render();
           // echo('funciona');
           var_dump($controller);
            return false;
            } 
            
        $archivoController = 'Controllers/'.$arrayUrl[0].'.php';
        
       var_dump($archivoController);
        if(file_exists($archivoController)){
       require_once($archivoController);
       $controller = new $arrayUrl[0];
       var_dump($controller);
       $controller->loadModel($arrayUrl[0]);
       var_dump($controller);
       if(isset($arrayUrl[1])){
            if(method_exists($controller,$arrayUrl[1])){
                if(isset($arrayUrl[2])){
                    $nparam = count($arrayUrl)-2; 
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
   /*
        if(!empty($arrayUrl[2])){
        if($arrayUrl!=''){
        for($i=2;$i<count($arrayUrl);$i++){
            $params .= $arrayUrl[$i].',';
        }
        $params = trim($params);
        echo $params;
        }
        } */
    }
}
?>