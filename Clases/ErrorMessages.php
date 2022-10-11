<?php
Class ErrorMessages{
    /*NOTACION ERROR:
    ERROR_CONTROLLER_METODO_ACTION*/
    const ERROR_GENERICO = 'erkmj4u9849kern';
    const ERROR_CATEGORIA_NEWCATEGORIA_EXIST ='q3rawf34fcfewc43214dffcgcbnm45pbh';
    const ERROR_SINGUP_NEWUSER = '88034skjgmv213bj34mclkjmcfnbj3';
    const ERROR_SINGUP_NEWUSER_EMPTY ='kjfgmlvg83478rc084nchgbhw3';
    private $errorList = [];

    function __construct(){
        $this->errorList = [
            ErrorMessages::ERROR_GENERICO => 'Ha ocurrido un error', 
            ErrorMessages::ERROR_CATEGORIA_NEWCATEGORIA_EXIST => 'Hubo un error al agregar la categoria',
            ErrorMessages::ERROR_SINGUP_NEWUSER => 'Hubo un error al registrar usuario',
            ErrorMessages::ERROR_SINGUP_NEWUSER_EMPTY => 'Por favor introduzca todos los datos del formulario'
        ];
    }
    public function get($hash){
        error_log('ErrorMessages::get()->$hash => '.$hash);
        return $this->errorList[$hash];
    }

function existKey($key){
    if(array_key_exists($key,$this->errorList)){
        error_log('ErrorMessages::existKey()->$key => true');
        return true;
    }else{
        error_log('ErrorMessages::existKey()->$key => false');
        return false;
    }
}

}

?>