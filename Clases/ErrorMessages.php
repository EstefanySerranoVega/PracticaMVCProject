<?php
Class ErrorMessages{
    /*NOTACION ERROR:
    ERROR_CONTROLLER_METODO_ACTION*/

    const ERROR_CATEGORIA_NEWCATEGORIA_EXIST ='q3rawf34fcfewc43214dffcgcbnm45pbh';
    const ERROR_SINGUP_NEWUSER = '88034skjgmv213bj34mclkjmcfnbj3';
    const ERROR_SINGUP_NEWUSER_EMPTY ='kjfgmlvg83478rc084nchgbhw3';
    private $errorList = [];

    function __construct(){
        $this->errorList = [
            ErrorMessages::ERROR_CATEGORIA_NEWCATEGORIA_EXIST => 'Hubo un error al agregar la categoria',
            ErrorMessages::ERROR_SINGUP_NEWUSER => 'Hubo un error al registrar usuario',
            ErrorMessages::ERROR_SINGUP_NEWUSER_EMPTY => 'Por favor introduzca todos los datos del formulario'
        ];
    }
    public function get($hash){
        return $this->errorList[$hash];
    }
}

?>