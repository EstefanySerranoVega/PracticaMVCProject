<?php
Class SuccessMessages{
    
    const SUCCESS_SINGUP ='kjdfhnasf8746023ueduh';
    private $successList =[];

    function __construct(){
        $this->successList = [
            SuccessMessages::SUCCESS_SINGUP => 'Usuario creado exitosamente'
        ];
    }

    public function get($hash){
        return $this->successList[$hash];
    }

function existKey($key){
    if(array_key_exists($key,$this->successList)){
        return true;
    }else{
        return false;
    }
}
}
?>