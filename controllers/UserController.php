<?php
session_start();
include_once 'models/User.php';

class UserController {

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
      //Usando página para signIn, se for usar modal, não preciso dessa parte: 
      case "sign-in":
        $this->viewSignIn();
      break;
      case "logout":
        $this->logout();
      break;
    }
  }
  
  private function viewSignUp(){
    include "views/signUp.php";
  }

  //Usando página para signIn, se for usar modal, não preciso dessa parte: 
  private function viewSignIn(){
    include "views/signIn.php";
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
      $username = $_POST['username'];
 

      //Pega dados do usuário:
      $user = new User();
      $action = $user->getUser($username);

      //Adiciona objeto com informações do usuário na sessão:
      $_SESSION['user'] = $action;
      
      header('Location:/oop-desafio/posts');       

    }else {
      echo "Não foi possível adicionar o usuário - usuário já cadastrado.";
    }
  }

  //Método para Validação de Login:
  private function userLogin() {
    $username = $_POST['username'];
    $encPass = $_POST['userPass'];
    
    //Checando com banco de dados, se ok, iniciar sessão:
    if($this->authenticate($username,$encPass)){
     
      //Pega dados do usuário:
      $user = new User();
      $action = $user->getUser($username);

      //Adiciona objeto com informações do usuário na sessão:
      $_SESSION['user'] = $action;
      
      header('Location:/oop-desafio/posts');       

      return true;
    }else {
      echo "Login ou senha inválidos";
      // return false;
    }
  }

  private function authenticate ($username,$encPass){
    //Inicia falso:
    $authentic = false;

    //Checar com banco de dados se é verdadeiro ou falso:
    $db = new User(); 
    $userObject = $db->getUser($username);

    $dbEncriptedPass = $userObject->encPass;

    if(password_verify($encPass,$dbEncriptedPass)){
      $authentic = true;
      return $authentic;
    }else {
      return false;
    }
  }

  private function logout(){

    session_destroy();
    header('Location:/oop-desafio/');
  }


}

