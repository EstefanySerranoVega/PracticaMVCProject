<?php

Class sectionShoppin extends SessionController{

    function __construct(){
        parent::__construct();
    }

    public function render(){
        $this->view->render('admin/section/shoppins');
    }

}

?>