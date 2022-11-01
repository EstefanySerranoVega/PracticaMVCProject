<?php

Class sectionProvider extends sessionController{

    function __construct(){
        parent::__construct();
    }
    public function render(){
        $this->view->render('admin/section/provider');
    }
}

?>