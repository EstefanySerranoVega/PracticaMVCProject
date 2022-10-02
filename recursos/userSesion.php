<?php
require_once('libreries/core/Controllers.php');
Class userSesion Extends Controllers{
    public function __construct(){
        session_start();
    }
    public function ObtenerUsuarioActual($user){
        $_SESSION['user']=$user;
    }
    public function DevolverUsuarioActual(){
        return $_SESSION['user'];
        
    }
    public function cerrarSesion(){
        session_unset();
        session_destroy();
    }
}

?>