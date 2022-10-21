<?php
Class Session {
    private $username ;
function __construct(){
    if(session_status()==PHP_SESSION_NONE){
        session_start();
        error_log('Session::session_start');
    }

}
public function setCurrentUser($user){
    error_log('Session::setCurrentUser '.$user);
    $_SESSION['name'] = $user;
    $this->username = $user;
    error_log('Session::setCurrentUser '.$this->username);
}
public function getCurrentUser(){
    error_log('Session::getCurrentUser sesionName: '.$this->username);
    return $_SESSION[$this->username];
}
public function closeSesion(){
    session_unset();
    session_destroy();
}
public function exist(){
    
    error_log('Session::exist() '.$this->username);
return isset($_SESSION[$this->username]);

}
}
?>