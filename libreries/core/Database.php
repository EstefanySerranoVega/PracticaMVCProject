<?php
    //clase database
    require_once('config/config.php');
    class Database{
    
        private $host;
        private $user;
        private $password;
        private $bd;
        private $charset;
    
        function __Construct(){
            $this-> host = constant('HOST');
            $this-> user = constant('USER');
            $this-> password = constant('PASSWORD');
            $this-> bd = constant('DB');
            $this-> charset = constant('CHARSET');
        }
        function Conexion(){
            
            
            try{
              
                $conexionPDO = new PDO('mysql:host='.$this->host,';dbname=' .$this->bd, $this->user, $this->password);
               // $conexionPDO->query("SET NAMES 'utf8'");
               $conexionPDO->query("SET NAMES".$this->charset);
                return $conexionPDO;
                //return ($conexionPDO); 
            }catch(PDOException $e){
                print_r('Error al conectar la base de datos: ' . $e->getMessage());
            }
        }
    }
   


?>


