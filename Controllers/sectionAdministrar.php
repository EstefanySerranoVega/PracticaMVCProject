<?php
Class sectionAdministrar extends sessionController{

    public function __construct(){
        parent::__construct();
    }
    public function render(){
        $this->view->render('admin/section/administrar');
    }
}

?>