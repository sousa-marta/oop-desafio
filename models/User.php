<?php

include_once "Conexao.php";

class User extends Conexao {

  // Função para cadastrar novo usuário
  public function addUser($firstName,$lastName,$username,$encPass){

    $db = parent::criarConexao();
    $query = $db->prepare('INSERT INTO users(firstName,lastName,username,encPass) VALUES (:firstName, :lastName, :username, :encPass)');
    return $query->execute([
      "firstName" => $firstName,
      "lastName" => $lastName,
      "username" => $username,
      "encPass" => $encPass]);
  }
/* 
  Função para pegar informações do usuário do banco de dados
  public function getUser */

}