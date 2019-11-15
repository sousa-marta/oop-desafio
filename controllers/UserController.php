<?php

include_once 'models/User.php';

class UserController {

  private function viewSignUp(){
    include "views/signUp.php";
  }
  
  public function acao($rotas){
    switch($rotas){
      case "sign-up":
        $this->viewSignUp();
      break;
      case "register-user":
        $this->registerUser();
      break;
    }
  }

  private function registerUser(){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $encPass = password_hash($_POST['encPass'], PASSWORD_DEFAULT);
    // $encPass = $_POST['encPass'];

/*     var_dump($encPass);
    exit; */

    
    $user = new User();
    $action = $user->addUser($firstName,$lastName,$username,$encPass);
    
    if($action){
      header('Location:/oop-desafio/posts'); 
    }else {
      echo "Não foi possível adicionar o usuário";
    }

  }


}

