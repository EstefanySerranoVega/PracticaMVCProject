<?php
    //clase database
    class Database{
    
        private $host;
        private $user;
        private $password;
        private $bd;
        private $charset;
    
        function __Construct(){
            $this-> host = 'localhost';
            $this-> user = 'root';
            $this-> password = '';
            $this-> bd = 'bd_proyecto';
            $this-> charset ='utf8';
        }
        function Conexion(){
            
            
            try{
              
                $conexionPDO = new PDO('mysql:host=localhost;dbname=' .$this->bd, $this->user, $this->password);
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


