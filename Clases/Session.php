<?php
Class Session {
    private $username = 'name' ;
    private $idUser = 'idUser';
    private $rol = 'rol';
function __construct(){
    if(session_status()==PHP_SESSION_NONE){
        session_start();
        error_log('Session::session_start');
    }
}

public function setCurrentUser($user){
    $_SESSION[$this->username ] = $user;
}
public function setCurrentIdUser($id){
    $_SESSION[$this->idUser] = $id;
 
}
public function setcurrentRol($rol) {
    $_SESSION[$this->rol] = $rol;
 
}
public function getCurrentUser(){
   return $_SESSION[$this->username];
}
public function getCurrentIdUser(){
   return $_SESSION[$this->idUser];
 
}
public function getcurrentRol() {
   return $_SESSION[$this->rol] ;
 
}
public function closeSesion(){
    error_log('Session::closeSesion()->execute');

    session_unset();
    session_destroy();
}
public function exist(){
    
return isset($_SESSION[$this->username]);

}
}
?>