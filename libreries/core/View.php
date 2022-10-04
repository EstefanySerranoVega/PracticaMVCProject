<?php

Class View{

    function __construct(){
       // $this->render();
    }
    public function render($nombre, $data = []){
        $this->d = $data;
        require 'views/' . $nombre . '.php' ;
    }
}

?>