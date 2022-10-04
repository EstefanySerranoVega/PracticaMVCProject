<?php
require_once('View.php');

Class Controllers {
    function __construct(){
        $this->view = new View();
    }//fin __construct

    public function loadModel($model){
        $model = get_class($this).'Model';
        $rutaModel = 'Models/'.$model.'.php';
            if(file_exists($rutaModel)){
                require_once($rutaModel);
                $this->model = new $model();
                echo 'loadModel funciona';
            }else{
                echo 'El modelo no existe';
            }

    }//fin load model

    public function existPOST($params){

        foreach($params as $param){
            if(isset($_POST[$param])){
                error_log("ExistPOST: No existe el parametro $param" );
                
                return false;
            }
        }
        error_log("ExistPOST: Existen parametros $param" );
        
        return true;
    }//fin exist POST

    public function existGET($params){

        foreach($params as $param){
            if(isset($_GET[$param])){
            return false;
            }
        }
        return true;
    }//fin exist GET
    
    public function getGET($name){
        return $_GET[$name];
    }

    public function getPOST($name){
        return $_POST[$name];
    }

    public function redirect($ruta,$mensajes){
        $data=[];
        $params = '';

        foreach($mensajes as $key=>$mensaje){
            array_push($data,$key.'='.$mensaje);
        }
        $params=join('&',$data);
        if(!empty($params)){
            $params = '?'.$params;
        }
        header('Location: '.CONSTANT('URL_RAIZ').$ruta.$params);
    }

}


?>