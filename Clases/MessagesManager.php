<?php
Class MessaggesManager{
    private $messagesList = [];

    public function __construct(){

    }
    function get($hash){
        return $this->messagesList[$hash];
    }
    function existKEY($key){
        if(array_key_exists($key,$this->messagesList)){
            return true;
        }else{
            return false;
        }
    }

}

?>