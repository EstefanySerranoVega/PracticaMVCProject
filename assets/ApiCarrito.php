<?php

Class ApiCarrito{
    
    function __construct(){
        if(session_status()==PHP_SESSION_NONE){
            session_start();
            error_log('Session::session_start');
        }
}
}

?>