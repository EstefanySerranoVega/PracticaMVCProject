<?php
require_once('View.php');
require_once('Clases/MessagesManager.php');

Class Controllers {
    function __construct(){
      $this->view = new View();
    }//fin __construct

    public function loadModel($model){
        $model = get_class($this).'Model';
        $rutaModel = 'Clases/'.$model.'.php';
        
            if(file_exists($rutaModel)){
                require_once($rutaModel);
                $this->model = new $model();
                error_log('Controllers::loadModel()=> true '.$model);
            }else{
                error_log('Controllers::loadModel()=> false [no existe] => '.$rutaModel);
            }

    }//fin load model

    public function existPOST($params){
       //error_log('existPOST->params-> '.$params);

        foreach($params as $param){
            if(!isset($_POST[$param])){
                error_log("ExistPOST: No existe el parametro $param" );
                
                return false;
            }
        }
        error_log("ExistPOST: Existen parametros $param" );
        
        return true;
    }//fin exist POST

    public function existGET($params){
        foreach($params as $param){
            error_log($param);
            if(!isset($_GET[$param])){
                error_log('Controllers::existGET-> false');
            return false;
            }
        }
        error_log('Controllers::exisGET-> true');
        return true;
    }//fin exist GET
    
    public function getGET($name){
        return $_GET[$name];
    }

    public function getPOST($name){
        return $_POST[$name];
    }

    public function redirect($ruta,$mensajes = []){
        error_log('60 Controllers::redirect() values $ruta is-> '.$ruta);
        $data = [];
        $params = '';
        foreach($mensajes as $key => $mensaje){
            array_push($data,$key.'='.$mensaje);
            
        error_log('66 Controllers::redirect()->key=> '.$key.' messages=> '.$mensaje);
        }
       
        $params = join('&', $data);

        if(empty($params)){
            error_log('72 params is empty '.$params);
            $params = '?'.$params;
        }
        error_log('74 Controllers::redirect()=> ruta: '.$ruta.' params: '.$params);
        header('Location: '.CONSTANT('URL_RAIZ').$ruta.'/'.$params);
    }

}


?>