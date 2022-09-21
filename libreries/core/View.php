<?php

Class View{

    function __construct(){
       // $this->render();
    }
    public function render($nombre, $data=[]){
        $this->d = $data;
        require 'Views/'.$nombre.'.php' ;
    }
}

?>