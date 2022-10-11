<?php
require_once('Clases/ErrorMessages.php');
require_once('Clases/MessagesManager.php');
require_once('Clases/SuccessMessages.php');
require_once('libreries/core/messages.php');
Class View{
private $d;
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
        error_log('View::handleMessages()=> success => true');
        $this->handleSuccess();
    }else if(isset($_GET['errror'])){
        error_log('View::handleMessages()=> error => true');
        $this->handleError();
    }else{
    }
}//fin handle messages

private function handleSuccess(){
    if(isset($_GET['success'])){
        $hash = $_GET['success'];
        $success = new SuccessMessages();
        error_log('View::handleSuccess()');

        if($success->existKey($hash)){
            error_log('View::handleSuccess()->existKey =>  true');
            $this->d['success'] = $success->get($hash);
        }else{
            error_log('View::handleSuccess()->existKey => false');
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
            error_log('View::handleError()->existKey => false');
        }else{
            error_log('View::handleError()->existKey => false');
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