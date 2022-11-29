<?php

Class sectionClientes extends SessionController{

    function __construct(){
    parent::__construct();
    }

public function render(){
    $this->view->render('admin/section/Dashboard/clientes');
}
public function update(){
    $this->view->render('admin/section/update/cliente');
}

public function updateItem(){
    if($this->existPOST(['id','idP','nombre','paterno','materno','telefono','username','nacimiento','correo', 'direccion'])){
        $id = $this->getPOST('id');
        $idP = $this->getPOST('idP');
        $name = $this->getPOST('nombre');
        $paterno = $this->getPOST('paterno');
        $materno = $this->getPOST('materno');
        $telefono = $this->getPOST('telefono');
        $username = $this->getPOST('username');
        $nacimiento = $this->getPOST('nacimiento');
        $correo = $this->getPOST('correo');
        $direccion = $this->getPOST('direccion');
        if($id ='' || empty($id)
        ||$idP ='' || empty($idP)
        || $name = '' || empty($name)
        || $paterno = '' || empty($paterno)
        || $materno = '' || empty($materno)
        || $telefono = '' || empty($telefono)
        || $username = '' || empty($username)
        || $nacimiento = '' || empty($nacimiento)
        || $correo = '' || empty($correo)
        || $direccion = '' || empty($direccion)){
            error_log('Complete todos los datos');
        }else{
            
        $id = $this->getPOST('id');
        $idP = $this->getPOST('idP');
        $name = $this->getPOST('nombre');
        $paterno = $this->getPOST('paterno');
        $materno = $this->getPOST('materno');
        $telefono = $this->getPOST('telefono');
        $username = $this->getPOST('username');
        $nacimiento = $this->getPOST('nacimiento');
        $correo = $this->getPOST('correo');
        $direccion = $this->getPOST('direccion');
    
        require_once('Models/UserModel.php');
        $user = new userModel();
        $user->setId($id);
        $user->setNombre($username);
        if($user->update()){
            require_once('Models/PersonaModel.php');
            error_log('id es: '.$idP);
            error_log('name es: '.$name);
            error_log('materno es: '.$materno);
            error_log('paterno es: '.$paterno);
            error_log('telefono es: '.$telefono);
            error_log('nacimiento es: '.$nacimiento);
            $persona = new personaModel();
            $persona->setId($idP);
            $persona->setNombre($name);
            $persona->setPaterno($paterno);
            $persona->setMaterno($materno);
            $persona->setTelefono($telefono);
            $persona->setNacimiento($nacimiento);
            $persona->update();
            
            $this->view->render('admin/section/Dashboard/clientes');
        }
            
        }
    
    }else{
        error_log('Post vacío');
    }
    
    
    }
    public function deleteItem(){
        error_log('delete item se ejecutó');
        if($this->existGET(['idc'])){
            $id = $this->getGET('idc');
            error_log('eliminar id: '.$id);
            
            $cliente = new ClienteModel();
            $cliente->delete($id);
           
            $this->view->render('admin/section/Dashboard/clientes');
      
        }else{
            error_log('el id del producto no ha sido encontrado');
        }
        
        }
}
?>