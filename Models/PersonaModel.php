<?php

class PersonaModel extends Model implements IModel{
    private $idPersona;
    private $nombrePersona;
    private $paternoPersona;
    private $maternoPersona;
    private $telefonoPersona;
    private $nacPersona;
    private $estado;
    private $creacion;


    function __construct(){
        parent::__construct();
    }//fin construct

   
    public function save(){
        $this->estadoAccesos = 'AC';
        try{
            $query = $this->query(
                'INSERT INTO `persona`  VALUES (
                    NULL,
                    :nombre,
                    :paterno,
                    :materno,
                    :telefono,
                    :nac,
                    :estado,
                    :creacion); SELECT LAST_INSERT_ID() AS id_persona');
            $arrayData= array([
                'nombre' => $this->nombrePersona,
                'paterno' => $this->paternoPersona,
                'materno' => $this->maternoPersona,
                'telefono' => $this->telefonoPersona,
                'nac' => $this->nacPersona,
                'estado' => $this->estado,
                'creacion' => $this->creacion]);

            $query->execute($arrayData);
            $this->idPersona = $this->Conexion()->lastInsertId();
             
            
              error_log('PersonaModel::save()=> $nombrePersona: '.$this->nombrePersona);
              error_log('PersonaModel::save()=> $paternoPersona: '.$this->paternoPersona);
              error_log('PersonaModel::save()=> $maternoPersona: '.$this->maternoPersona);
              error_log('PersonaModel::save()=> $telefonoPersona: '.$this->telefonoPersona);
              error_log('PersonaModel::save()=> $nacPersona: '.$this->nacPersona);
              error_log('PersonaModel::save()=> $estado: '.$this->estado);
              error_log('PersonaModel::save()=> $creacion: '.$this->creacion);
             
              //$this->idPersona = $this->Conexion()->lastInsertId(`persona`);
              if($query->rowCount()) {
              //$this->idPersona = $this->Conexion()::FETCH_ORI_LAST;
              error_log('PersonaModel::save()=>idPersona '.$this->idPersona);
              error_log('PersonaModel::save()=>true');
              return true;
              }else{
                error_log('PersonModel::save()=>false');
                return false;}
              
        }catch(PDOException $e){
            error_log('ERROR::personaModel::save()-> '.$e);
            return false;
        }
    }//fin save


    public function getAll(){
        $items = [];
        try{
            $query = $this->prepare(
                'SELECT * FROM `persona` WHERE estado_persona = "AC"');
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new PersonaModel();

                $item->from($p);

                array_push($items,$item);
            }
            return $items;
        }catch(PDOException $e){
            error_log('PersonaModel::getAll()=> '.$e);
            return false;
        }

    }//fin getAll

    public function get($id){
        try{
            $query = $this->prepare(
                'SELECT * FROM `persona` WHERE id_persona = :id');
            $query->execute(['id'=>$id]);

            $persona = $query->fetchAll(PDO::FETCH_ASSOC);

            $this->from($persona);

            return $this;
        }catch(PDOException $e){
            error_log('PersonaModel::get()=> '.$e);
            return false;
        }
    }//fin get


    public function delete($id){
        try{
            $query = $this->prepare(
                'UPDATE `persona` SET
              estado_persona = "DC"
                WHERE id_persona = :id
                AND estado_persona = "AC" ',
                 );
            $query->execute(['id' => $this->getId()]);

            return true;
        }catch(PDOException $e){
            return false;
        }
    }//fin delete persona
    public function update(){
        try{
            $query = $this->prepare(
                'UPDATE `persona` SET
                nombre_persona = :nombre
                paterno_persona = :paterno,
                materno_persona = :materno,
                telefono_persona = :telefono,
                nac_persona = :nacimiento
                WHERE id_persona = :id
                AND estado_persona = "AC" ',
                 );
            $query->execute([
                'nombre' => $this->nombrePersona,
                'paterno' => $this->paternoPersona,
                'materno' => $this->maternoPersona,
                'telefono' => $this->telefonoPersona,
                'nacimiento' => $this->nacPersona,
                'id' => $this->getId()]);

            return true;
        }catch(PDOException $e){
            return false;
        }
    }//fin update persona


    public function from($array){
        $this->idPersona = $array['id_persona'];
        $this->nombrePersona = $array['nombre_persona'];
        $this->paternoPersona = $array['paterno_persona'];
        $this->maternoPersona = $array['materno_persona'];
        $this->telefonoPersona = $array['telefono_persona'];
        $this->nacPersona = $array['nac_persona'];
        $this->estado = $array['nac_persona'];
        $this->creacion = $array['creacion_persona'];
    }//fin from persona

//getters
public function getId(){
    return $this->idPersona;
}
public function getNombre(){
    return $this->nombrePersona;
}
public function getPaterno(){
    return $this->paternoPersona;
}
public function getMaterno(){
    return $this->maternoPersona;
}
public function getTelefono(){
    return $this->telefonoPersona;
}
public function getNacimiento(){
    return $this->nacPersona;
}
public function getEstado(){
    return $this->estado;
}
public function getCreacion(){
    return $this->creacion;
}


//setters
public function setId($id){
    $this->idPersona = $id;
}
public function setNombre($nombre){
    $this->nombrePersona = $nombre;
}
public function setPaterno($paterno){
    $this->paternoPersona = $paterno;
}
public function setMaterno($materno){
    $this->maternoPersona = $materno;
}
public function setTelefono($telefono){
    $this->telefonoPersona = $telefono;
}
public function setNacimiento($nacimiento){
    $this->nacPersona = $nacimiento;
}
public function setEstado($estado){
    $this->estado = $estado;
}
public function setCreacion($creacion){
    $this->creacion = $creacion;
}

}

?>
