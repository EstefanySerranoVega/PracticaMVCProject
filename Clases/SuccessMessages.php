<?php
Class SuccessMessages{
    
    const SUCCESS_SINGUP ='kjdfhnasf8746023ueduh';
    private $successList =[];

    function __construct(){
        $this->successList = [
            SuccessMessages::SUCCESS_SINGUP => 'Usuario creado exitosamente'
        ];
    }
}
?>