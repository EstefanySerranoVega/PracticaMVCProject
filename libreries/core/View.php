<?php

Class View{

    function __construct(){
       // $this->render();
    }
    public function render($nombre, $data = []){
        $this->d = $data;
        $this->handleMessages();

        require 'views/' . $nombre . '.php' ;
    }

public function handleMessages(){
    if(isset($_GET['success']) && isset($_GET['error'])){
        error_log('View::handleMessages()=> success and error => true');
    }else if(isset($_GET['success'])){
        $this->handleSuccess();
    }else if(isset($_GET['errror'])){
        $this->handleError();
    }
}//fin handle messages

private function handleSuccess(){
    if(isset($_GET['success'])){
        $hash = $_GET['success'];
        $success = new SuccessMessages();

        if($success->existKey($hash)){
            $this->d['success'] = $success->get($hash);
        }else{
            $this->d['success'] = null;
        }
    }
}//fin handle success messages

private function handleError(){
    
    if(isset($_GET['error'])){
        $hash = $_GET['error'];
        $errors = new ErrorMessages();

        if($errors->existKey($hash)){
            $this->d['error'] = $errors->get($hash);
        }else{
            $this->d['error'] = null;
        }
    }
}//fin handle error

public function showMessages(){
    $this->showSuccess();
    $this->showError();
}

private function showSuccess(){
    if(array_key_exists('success', $this->d)){
        echo '<div class = "success"> '.$this->d['succes'].'</div>';
    }
}

private function showError(){
    if(array_key_exists('error', $this->d)){
        echo '<div class = "error">'.$this->d['error'].'</div>';
    }
}

}

?>