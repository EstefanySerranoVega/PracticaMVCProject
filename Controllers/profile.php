<?php

Class Profile extends Controllers {

function __construct(){
    parent::__construct();
}

public function render(){
    $this->view->render('admin/section/myProfile');
}

}


?>