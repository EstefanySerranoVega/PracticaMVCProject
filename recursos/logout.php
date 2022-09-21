<?php
include_once('userSesion.php');
$user = new userSesion();
$user->cerrarSesion();
include_once('index.php');

?>