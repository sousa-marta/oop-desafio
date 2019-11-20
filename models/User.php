<?php

include_once "Conexao.php";

class User extends Conexao {

  // Função para cadastrar novo usuário
  public function setUser($firstName,$lastName,$username,$encPass){

    $db = parent::criarConexao();
    $query = $db->prepare("INSERT INTO users (firstName,lastName,username,encPass) 
                           VALUES (:firstName, :lastName, :username, :encPass)");
    return $query->execute([
      "firstName" => $firstName,
      "lastName" => $lastName,
      "username" => $username,
      "encPass" => $encPass]);
  }

  // Função para pegar objeto de um usuário com todas informações que estão no banco de dados:
  public function getUser($username){
    $db = parent::criarConexao();
    $query = $db->prepare("SELECT * FROM users WHERE username = ?");
    $query->execute([$username]);

    //Traduzindo para Objeto:
    $userObject = $query->fetch(PDO::FETCH_OBJ);

    //Está recebendo Post normalmente e transformando em objeto o username recebido
/*     var_dump($_POST);
    var_dump($userObject);
    exit; */

    //Retorna o objeto do usuário:
    return $userObject;
  }

}
