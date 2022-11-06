<?php
require_once('Models/ProveedorModel.php');
Class sectionProvider extends sessionController{

    function __construct(){
        parent::__construct();
    }
    public function render(){
        $this->view->render('admin/section/Dashboard/provider');
    }
    public function updateItem(){
        $this->view->render('admin/section/Forms/updateProvider');
    }
    public function deleteItem(){
        if($this->existGET(['id'])){
            $id = $this->getGET('id');
            $proveedor = new ProveedorModel();
            $proveedor->delete($id);
        }else{
            error_log('proveedor no encontrado');
        }
    }
}

?>