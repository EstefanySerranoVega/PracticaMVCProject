<?php

include_once('Clases/Persona.php');
include_once('insertPersona.php');
$persona = new Persona();
$personaExist= new Persona();
if(isset($_POST['btn-newPersona'])){
    $a= $_POST['nombrePersona'];
    $b= $_POST['paternoPersona'];
    $c= $_POST['maternoPersona'];
    $d= $_POST['telefonoPersona'];
    $e= $_POST['nacPersona'];
$persona->insertPersona($a,$b,$c,$d,$e);

var_dump($persona);
$personaExist->personaExist($a);
var_dump($personaExist);

}else{
    echo'no se pudo realizar la operacion';
}
?>