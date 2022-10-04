<?php
require_once('Clases/Session.php');
Class SessionController Extends Controllers{
private $userSession;
private $username;
private $userId;

private $user;

private $session;
private $sites;

function __construct(){
        parent::__construct();
        $this->init();

}

public function getUserSession(){
        return $this->userSession;
}

public function getUsername(){
        return $this->username;
}

public function getUserId(){
        return $this->userId;
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
        error_log('SessionController::validateSession()');

        if($this->existSesion()){
        //obtenemos el rol para determinar el acceso a la pagina correspondiente
                $rol = $this->getUserSesionData()->getRoles();
                error_log("sessionController::validateSession(): username:" . $this->user->getUsername() . " - role: " . $this->user->getRoles());
            
                //si es publica
                if($this->isPublic()){
                        $this->redirectDefaultSiteByRole($rol);
                        error_log( "SessionController::validateSession() => sitio público, redirige al main de cada rol" );
                   
                //no es publica
                }else {
                        if($this->isAuthorized($rol)){
                                error_log( "SessionController::validateSession() => autorizado, lo deja pasar" );
                               
                        //ingresa
                        }else{
                                error_log( "SessionController::validateSession() => no autorizado, redirige al main de cada rol" );
                                
                                $this->redirectDefaultSiteByRole($rol);
                        }
                }
        }else{//no existe la sesion
                if($this->isPublic()){
                        error_log('SessionController::validateSession() public page');
                       
                        //ingresa al sitio
                }else{ 
                         error_log('SessionController::validateSession() redirect al Home ');
               
                        header('Location: '.constant('URL_RAIZ').'');
                }
        }
}//fin validate session


public function existSesion(){
        if(!$this->session->exist()) return false;

        if($this->session->getCurrentUser()==null) return false;

        $userId = $this->session->getcurrentUser();

        if($userId)return true;

        return false;
}//fin exist session


public function getUserSesionData(){
      $id = $this->session->getCurrentUser();

      $this->user = new UserModel();
      $this->user->get($id);

      error_log("sessionController::getUserSesionData(): ".$this->user->getNombre());
      
      return $this->user;
}//fin getUserSesionData

public function initialize($user){
        error_log("sessionController::initilize(): user: ".$user->getNombre());
        
        $this->session->setCurrentUser($user->getId());
        $this->authorizeAccess($user->getRoles());
}

public function isPublic(){
        $currentURL = $this->getCurrentPage();
        error_log("sessionController::isPublic(): currentURL => " . $currentURL);
        
        $currentURL = preg_replace( "/\?.*/", "", $currentURL);
        for($i = 0; $i < sizeOf($this->sites); $i++){
                if($currentURL === $this->sites[$i]['site'] &&  $this->sites[$i]['access'] === 'public'){
                        return true;
                }

        }
        return false;
}//fin isPublic

public function getCurrentPage(){
        $currentLink =  trim("$_SERVER[REQUEST_URI]");
        $url = explode('/',$currentLink);
        error_log("sessionController::getCurrentPage(): actualLink =>" . $currentLink . ", url => " . $url[3]);
        
        return $url[3];
}//fin get current page



private function redirectDefaultSiteByRole($rol){
        $url = '';
        for($i = 0; $i<sizeOf($this->sites);$i++){
                if($this->sites[$i]['role']===$rol){
                        $url = '/MVC/'.$this->sites[$i]['site'];
                        break;
                }
        }
        header('Location: '.$url);
}//fin redirect default site by role


private function isAuthorized($rol){
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace('/\?.*/','',$currentURL);

        for($i = 0; $i < sizeOf($this->sites);$i++){
                if($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['role'] === $rol){
                        return true;
                }
                return false;

        }
}


public function authorizeAccess($rol){
        switch($rol){
                case 'user':
                        $this->redirect($this->defaultSites['user'],[]);
                break;
                case 'admin':
                        $this->redirect($this->defaultSites['admin'],[]);
                break;
                case 'gral':
                        $this->redirect($this->defaultSites['gral'],[]);
                break;
                case '':
                        $this->redirect($this->defaultSites[''],[]);
                break;
                default:
        }
}
public function logout(){
        $this->session->closeSesion();
}

}

?>