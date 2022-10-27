<?php
Class Cliente extends Controllers {

    function __construct(){
        parent::__construct();
    }
public function render(){
$this->view->render('Home/index');

}
}

?>