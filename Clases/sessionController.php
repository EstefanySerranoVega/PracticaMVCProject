<?php
require_once('Session.php');
Class SessionController Extends Controllers{
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
}//fin init


private function getJSONFileConfig(){
        $string = file_get_contents('config/accesos.json');
        $json = json_decode($string, true);
        return $json;
}//fin get JSON file getJSONFileConfig


//validar la sesion y accesos a página de acuerdo al rol
public function validateSesion(){
        if($this->existSesion()){
                //obtenemos el rol para determinar el acceso a la pagina correspondiente
                $rol = $this->getUserSesionData()->getRoles();
                //si es publica
                if($this->isPublic()){
                        $this->redirectDefaultSiteByRole($rol);
                }else if($this->isAuthorized()){}
        }else{
                return false;
        }
}//fin validate session


public function existSesion(){
        if(!$this->session->exist()){
                return false;}
        if($this->session->getCurrentUser()==null){
                return false;}

        $userId = $this->session->getcurrentUser();
        if($userId)return true;
}//fin exist session


public function getUserSesionData(){
      $id = $this->userId;
      $this->user = new UserModel();
      $this->user->get($id);
      return $this->user;
}//fin getUserSesionData


public function isPublic(){
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace('/\?.*/','',$currentURL);
        for($i = 0; $i < sizeOf($this->sites);$i++){
                if($currentURL == $this->sites[$i]['sites'] && $currentURL == $this->sites[$i]['accesos'] && $currentURL == $this->sites[$i]['public']){
                        return true;}
        return false;

        }
}//fin isPublic

private function isAuthorized(){
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace('/\?.*/','',$currentURL);

        for($i = 0; $i < sizeOf($this->sites);$i++){
                if($currentURL == $this->sites[$i]['sites'] && $currentURL == $this->sites[$i]['role']){
                        return true;}
        return false;

        }
}

public function getCurrentPage(){
        $currentLink = trim("$_SERVER[REQUEST_URL]");
        $url = explode('/',$currentLink);
        return $url[2];
}//fin get current page

private function redirectDefaultSiteByRole($rol){
        $url = '';
        for($i = 0; $i<sizeOf($this->sites);$i++){
                if($this->sites[$i]['role']==$rol){
                        $url = '/home/'.$this->sites[$i]['site'];
                        break;
                }
        }
        header('Location: '.$url);
}//fin redirect default site by role

}

?>