<?php
Class MessaggesManager{
    private $messagesList = [];

    public function __construct(){

    }
    function get($hash){
        error_log('MessagesManager::get() '.$hash);
        return $this->messagesList[$hash];
    }
    function existKEY($key){
        if(array_key_exists($key,$this->messagesList)){
            error_log('MessagesManager::existKey()=> true');
            return true;
        }else{
            error_log('MessagesManager::existKey()=> false');
            return false;
        }
    }

}

?>