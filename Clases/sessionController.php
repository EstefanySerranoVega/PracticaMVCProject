<?php
require_once('Clases/Session.php');
require_once('libreries/Controllers.php');
Class SessionController Extends Controllers{
private $userSession;
private $username;
private $userId;
private $rolUser;
private $idRol;

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
        error_log('SesionController::init()');
                $this->session = new Session();
                $this->session->setCurrentIdAlmacen(1);
            
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
        $this->username = $this->session->getCurrentUser();
        $this->rolUser = $this->session->getCurrentRol();
                error_log("sessionController::validateSession(): username:" . $this->username . " - role: " . $this->rolUser);
                $rol = $this->session->getCurrentRol();

            
                //si es publica
                if($this->isPublic()){
                        error_log( "SessionController::validateSession() => sitio público, redirige al main de cada rol" );
                        $this->redirect($rol);
                   
                //no es publica
                }else {
                        if($this->isAuthorized($rol)){
                                error_log( "SessionController::validateSession() => autorizado, lo deja pasar" );
                               
                        //ingresa
                        }else{
                                error_log( "SessionController::validateSession() => no autorizado, redirige al main de cada rol" );
                                
                                $this->redirect($rol);
                        }
                }
        }else{//no existe la sesion
                if($this->isPublic()){
                        error_log('SessionController::validateSession()->is public ->true public page');
                       
                //$this->redirect('home');
                        //ingresa al sitio
                }else{ 
                         error_log('SessionController::validateSession()->is public false redirect al Home ');
               
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
/*
      $this->user = new UserModel();
      $this->user->get($id);*/

      error_log("sessionController::getUserSesionData(): ".$this->username);
      
      return $this->user;
}//fin getUserSesionData

public function initialize($user){
        $this->username = $user[0][1];
        $this->userId = $user[0][0];
        $this->rolUser = $user[0][4];
        $this->idRol = $user[0][3];
        error_log($this->idRol);
        error_log("sessionController::initilize(): user: ".$this->username);
        error_log("sessionController::initilize(): id: ".$this->userId);
        error_log("sessionController::initilize(): rol: ".$this->rolUser);
        $this->session->setCurrentUser($this->username);
        $this->session->setCurrentIdUser($this->userId);
        $this->session->setCurrentRol($this->rolUser);
        $this->session->setCurrentIdRol($this->idRol);
        $this->authorizeAccess($this->rolUser);
}

public function isPublic(){
        $currentURL = $this->getCurrentPage();
        error_log("sessionController::isPublic(): currentURL => " . $currentURL);
        
        $currentURL = preg_replace( "/\?.*/", "", $currentURL);
        for($i = 0; $i < sizeOf($this->sites); $i++){
                if($currentURL === $this->sites[$i]['site'] &&  $this->sites[$i]['access'] === 'public'){
                        error_log('sessionController::isPublic()=> true');
                        return true;
                }

        }
        error_log('sessionController::isPublic()=> false');
        return false;
}//fin isPublic

public function getCurrentPage(){
        $currentLink =  trim("$_SERVER[REQUEST_URI]");
        $url = explode('/',$currentLink);
        if(!$url[3] ){
                return 'home';
        }
        error_log("sessionController::getCurrentPage(): actualLink =>" . $currentLink .", url =>".$url[3]);
        
        return $url[3];
}//fin get current page



private function redirectDefaultSiteByRole($rol){
        error_log('redirectDefaultSiteByRole rol: '.$rol);
        $url = '';
        for($i = 0; $i<sizeOf($this->sites);$i++){
                if($this->sites[$i]['role']===$rol){
                        $url = '/HTML/MVC/'.$this->sites[$i]['site'];
                        error_log('url es: '.$url);
                        break;
                }
        }

        header('Location: '.$url);
}//fin redirect default site by role


private function isAuthorized($rol){
        error_log('sessionController::isAuthorized()->rol => '.$rol);
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace('/\?.*/','',$currentURL);

        for($i = 0; $i < sizeOf($this->sites);$i++){
                if($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['role'] === $rol ){
                  
                        error_log('sessionController::isAuthorized()=> true');
                        return true;
                }
               

        } 
        return false; error_log('Site: '.$this->site[$i]['site']);

}


public function authorizeAccess($rol){
        error_log('authorizedAccess rol es: '.$rol);
        switch($rol){
                case 'user':
                        error_log('rol es: user');
                        $this->redirect($rol);
                break;
                case 'admin':
                        error_log('rol es: admin');
                        $this->redirect('dashboard');
                break;
                case 'gral':
                        error_log('rol es: gral');
                        $this->redirect($this->defaultSites['gral']);
                break;
                case 'cliente':
                        error_log('rol es: cliente');
                        $this->redirect($this->defaultSites['cliente']);
                break;
                case '':
                        error_log('rol es: empty');
                        $this->redirect($this->defaultSites['']);
                break;
                default:
                error_log('rol no encontrado, rol: '.$rol);
                break;
        }
}
public function logout(){
        error_log('SessionController::logout->execute');
        $this->session->closeSesion();
}
public function exist(){
        
}
}

?>