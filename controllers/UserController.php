<?php

include_once 'models/User.php';

class UserController {
  //Inicia como Deslogado:
  private $logged = false;

  public function acao($rotas){
    switch($rotas){
      case "sign-up":
        $this->viewSignUp();
      break;
      case "register-user":
        $this->registerUser();
      break;
      case "login-user":
        $this->userLogin();
      break;        
    }
  }
  
  private function viewSignUp(){
    include "views/signUp.php";
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
      // echo "Adicionado com sucesso";
      header('Location:/oop-desafio/posts'); 
    }else {
      echo "Não foi possível adicionar o usuário";
    }
  }

  private function userLogin() {
    $username = $_POST['username'];
    $pass = password_hash($_POST['userPass'], PASSWORD_DEFAULT);
    
    $user = new User();
    $action = $user->getUserID($username,$pass);

    if($action){
      //Se verdadeiro, inicia uma sessão do usuário:
      $_SESSION['id_user'] = $action->id;
      header('Location:/oop-desafio/posts');       
      // return true;
    }else {
      return false;
    }

    //comparar com usuário e senha do banco de dados

  }


}

