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
    //Usando Inner Join para ao invés de usar ID da tabela posts, conseguir pegar o nome de usuário de quem postou;
    //Já faz o Select listando por ordem decrescente de id de post, do último postado para o primeiro:
    $query = $db->query('SELECT posts.id, users.username, users.firstName, users.lastName, posts.image, posts.description, posts.likes FROM posts INNER JOIN users ON posts.id_user=users.id ORDER BY posts.id DESC');
 
    $resultado = $query->fetchAll(PDO::FETCH_OBJ); //traduzindo tudo que recebe para um formato que o php entenda. Nesse caso escolhemos receber objeto.
    return $resultado;
  } 

  //Pegando quantos likes tem determinado Post
  public function getLikes($postId){
    $db = parent::criarConexao();
    $query = $db->query('SELECT likes FROM posts WHERE id = $postId');
    $result = $query->fetch(PDO::FETCH_OBJ);
    return $result;
  }
}