<?php
Class Session {
    private $username = 'name' ;
function __construct(){
    if(session_status()==PHP_SESSION_NONE){
        session_start();
        error_log('Session::session_start');
    }

}
public function setCurrentUser($user){
    error_log('Session::setCurrentUser '.$user);
    $_SESSION[$this->username ] = $user;
    error_log('Session::setCurrentUser variable session'.$_SESSION[$this->username]);
}
public function getCurrentUser(){
    error_log('Session::getCurrentUser sesionName: '.$_SESSION[$this->username]);
    return $_SESSION[$this->username];
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