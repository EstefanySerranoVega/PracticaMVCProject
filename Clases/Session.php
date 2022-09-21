<?php
Class Session {
    private $sesionName;
function __construct(){
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }

}
public function setCurrentUser($user){
    $_SESSION[$this->sesionName] = $user;
}
public function getCurrentUser(){
    return $_SESSION[$this->sesionName];
}
public function closeSesion(){
    session_unset();
    session_destroy();
}
public function exist(){
return isset($_SESSION[$this->sesionName]);

}
}
?>