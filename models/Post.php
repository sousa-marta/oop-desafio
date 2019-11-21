<?php

include_once "Conexao.php";

class Post extends Conexao {

  public function criarPost($image,$description,$id_user){
    //Armazenando a conexão na variável $db:
    $db = parent::criarConexao();
    $query = $db->prepare("INSERT INTO posts (image,description,id_user) VALUES (:image, :description, :id_user)");
    return $query->execute([
      "image" => $image,
      "description" => $description,
      "id_user" => $id_user]); //retorna true or false. Manda pro controller analisar
  }

  public function listarPosts(){
    $db = parent::criarConexao();
    $query = $db->query('SELECT * FROM posts ORDER BY id DESC');//pra trazer em ordem decrescente
    $resultado = $query->fetchAll(PDO::FETCH_OBJ); //traduzindo tudo que recebe para um formato que o php entenda. Nesse caso escolhemos receber objeto.
    return $resultado;
  } 
}