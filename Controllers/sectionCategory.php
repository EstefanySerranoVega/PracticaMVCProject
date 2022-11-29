<?php
require_once('Models/CategoriaModel.php');
Class sectionCategory extends sessionController {

    function __construct(){
parent::__construct();

    }
function render(){
$this->view->render('admin/section/Dashboard/category');

}

public function addCategory(){
    error_log('se ejecutó add category');
    $this->view->render('admin/section/Forms/addCategory');
}
public function deleteItem(){
    if($this->existGET(['id'])){
        $id =$this->getGET('id');
        error_log('eliminar el id: '.$id);
        $category = new CategoriaModel();
        $category->delete($id);
        $this->redirect('sectionCategory');
    }

}
public function updateItem(){
    $this->view->render('admin/section/update/category');
}

}

?>