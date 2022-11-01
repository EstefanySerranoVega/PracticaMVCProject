<?php
Class sectionCategory extends sessionController {

    function __construct(){
parent::__construct();

    }
function render(){
$this->view->render('admin/section/category');

}

}

?>