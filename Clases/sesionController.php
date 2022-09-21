<?php
Class SesionController Extends Controllers{
private $userSesion;
private $userId;
private $rolUser;
private $session;
private $sites;

function __construct(){
        parent::__construct();
        $this->init();

}
public function init(){
    $this->session = new Session();

    $json = $this->getJSONFileConfig();
    $this->sites = $json['sites'];
    $this->defaultSites = $json['default-sites'];
    $this->validateSesion();
}
private function getJSONFileConfig(){
        $string = file_get_contents('config/accesos.json');
        $json = json_decode($string, true);
        return $json;
}
//validar la sesion y accesos a página de acuerdo al rol
public function validateSesion(){
        if($this->existSesion()){
                //obtenemos el rol para determinar el acceso a la pagina correspondiente
                $this->rolUser = $this->getUserSesionData()->getRoles();
                //si es publica
                if($this->isPublic()){}else{}
        }else{
                return false;
        }
}
public function existSesion(){
        if(!$this->session->exist()){
                return false;}
        if($this->session->getCurrentUser()==null){
                return false;}

        $userId = $this->session->getcurrentUser();
        if($userId)return true;
}
public function getUserSesionData(){
      $id = $this->userId;
      $this->user = new UserModel();
      $this->user->get($id);
      return $this->user;
}
public function isPublic(){
$currentURL = $this->getCurrentPage();
$currentURL = preg_replace('/\?.*/','',$currentURL);
}
public function getCurrentPage(){
$currentLink = trim("$_SERVER[REQUEST_URL]");
$url = explode('/',$currentLink);
return $url[2];
}

}

?>