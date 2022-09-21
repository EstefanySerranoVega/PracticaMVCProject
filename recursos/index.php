<?php
include_once('models/User.php');
include_once('userSesion.php');

$user = new User();
$userSesion = new userSesion();
var_dump($userSesion);

if (isset($_SESSION['user'])) {
    
    $user->setUser($userSesion->DevolverUsuarioActual());
    var_dump($user);
    echo ('user reconocido');
    switch ($rol = $user->getRolUser()) {
        case 1:
            var_dump($rol) . 'el rol es: 1';
            include_once('formPrueba.php');
            break;
        case 2:
            var_dump($rol) . 'el rol es: 2';
            include_once('home.php');
            break;
        case 3:
            var_dump($rol) . 'el rol es: 3';
            break;
        default:
            echo 'usuario no reconocido';
            include_once('home.php');
            break;
    }
} else if (isset($_POST['username']) && isset($_POST['password'])) {
    echo 'se ejecutó else if';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new user();
    var_dump($userSesion);
    if ($user->userExist($username, $password)) {
        $userForm = $_POST['username'];
        $passForm = $_POST['password'];
        $userSesion->ObtenerUsuarioActual($userForm, $passForm);
        $user->setUser($userForm);
        echo 'el usuario es: ' . $userForm;
        var_dump($user);
        var_dump($userSesion);
        switch ($rol = $user->getRolUser()) {
            case 1:
                var_dump($rol) . 'el rol es: 1';
                include_once('formPrueba.php');
                break;
            case 2:
                var_dump($rol) . 'el rol es: 2';
                include_once('home.php');
                break;
            case 3:
                var_dump($rol) . 'el rol es: 3';
                break;
            default:
                echo 'usuario no reconocido';
                include_once('home.php');
                break;
        }
    } else {
        echo 'El usuario o contraseña no existen';
        $errorLogin = 'Error al iniciar sesion';
        include_once('login.php');
        var_dump($user);
        var_dump($userSesion);
    }
} else {
    echo 'else se ejecutó';
    include_once('login.php');
    var_dump($user);
    var_dump($userSesion);
}
