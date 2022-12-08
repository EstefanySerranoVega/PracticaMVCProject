<?php

Class store extends Controllers{

    public function __construct(){
        parent::__construct();
    }

    public function render(){
        $this->view->render('Home/store',[]);
    }
public function cat(){
    $this->view->render('Home/Filter/default',[]);

}


}

?>