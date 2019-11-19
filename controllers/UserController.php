<?php

include_once 'models/User.php';

class UserController {
  //Inicia como Deslogado:
  // private $logged = false;

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
  
  //Método para Registro de Usuário:
  private function registerUser(){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $encPass = password_hash($_POST['encPass'], PASSWORD_DEFAULT);
    
    $user = new User();
    $action = $user->setUser($firstName,$lastName,$username,$encPass);
    
    if($action){
      // echo "Adicionado com sucesso";
      header('Location:/oop-desafio/posts'); 
    }else {
      echo "Não foi possível adicionar o usuário - usuário já cadastrado.";
    }
  }

  //Método para Validação de Login:
  private function userLogin() {
    $username = $_POST['username'];
    $encPass = password_hash($_POST['userPass'], PASSWORD_DEFAULT);
    
    //Checando com banco de dados, se ok, iniciar sessão:
    if($this->authenticate($username,$encPass)){
      session_start();
      //Pega dados do usuário:
      $user = new User();
      $action = $user->getUser($username);

      //Adiciona objeto com informações do usuário na sessão:
      $_SESSION['user'] = $action;

      header('Location:/oop-desafio/posts');       

      return true;
    }else {
      echo "inválido";
      // return false;
    }
    
/*     if($action){
      //Se verdadeiro, inicia uma sessão do usuário:
      $_SESSION['username'] = $action->username;

      var_dump($_SESSION['username']);
      exit;

      header('Location:/oop-desafio/posts');       
      // return true;
    }else {
      echo "Login ou senha inválidos";
    } */
  }

  private function authenticate ($username,$encPass){
    //Inicia falso:
    $authentic = false;

    //Checar com banco de dados se é verdadeiro ou falso:
    $db = new User(); 
    $userObject = $db->getUser($username);

/*     var_dump($userObject);
    exit;
 */
    //Se dados conferirem:
    if($userObject->encPass == $encPass){
      $authentic = true;
      return $authentic;
    }
  }
}

