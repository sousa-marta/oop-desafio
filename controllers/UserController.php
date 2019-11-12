<?php


class UserController {

  private function viewSignUp(){
    include "views/signUp.php";
  }
  
  public function acao($rotas){
    switch($rotas){
      case "sign-up":
        $this->viewSignUp();
      break;
    }
  }


}

