<?php
require_once('Models/ContraseniaModel.php');
Class LoginModel extends Model{

    private $user;
    private $pass;
    private $id;
    function __construct(){
        parent::__construct();
    }

    public function login($user, $pass){
        $item =[];
       // $this->pass = new ContraseniaModel();
       // $this->pass->setNombre($pass);
        //$password = $this->pass->getNombre();
        try{
            //desencriptar la contraseña desde la base de datos
            error_log('user: '.$this->user);
            //error_log('pass: '.$password);
            $query = $this->prepare("SELECT cont.id_contrasenia, user.nombre_usuario, cont.nombre_contrasenia, user.id_roles
            FROM `usuario` user
           INNER JOIN `contrasenia` cont
           ON cont.id_usuario = user.id_usuario
           WHERE user.nombre_usuario = :user");
           $query->execute(['user'=> $user]); 
           $resultado = $query->fetchAll();
   if($query->rowCount()==1){
    if(password_verify($pass,$resultado[0][2])){

        error_log('true');
        return $resultado;
    }else{
        return false;
    }
   }else{
    error_log('false');
    return false;
   }
}
catch(PDOException $e){
            error_log('Error en LoginModel::login'.$e);}
      
    


}
}
?>