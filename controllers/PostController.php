<?php
  session_start();
include_once "models/Post.php";

class PostController {

  public function acao($rotas){
    //O que fazer com a informação que o usuário digitou na url:
    switch($rotas){
      case "posts":
        $this->listarPosts();
      break;
      case "formulario-post":
        $this->viewFormularioPost();
      break;
      case "cadastrar-post":
        $this->cadastroPost();
      break;
      case "like":
        echo "Funcionalidade indisponível";
      break;
    }
  }

  private function viewFormularioPost(){

    if(isset($_SESSION['user'])){
      include "views/newPost.php";
    }else {
      header('Location:/oop-desafio/sign-in'); //Retorna para página de login
    }
  }

  private function viewPosts(){
    include "views/posts.php";
  }

  private function listarPosts(){
    $post = new Post();
    $listaPosts = $post->listarPosts();
    //Request tem tudo que tem no post e tudo que tem no GET. Colocando dentro dessa superglobal
    $_REQUEST['posts'] = $listaPosts;
    $this->viewPosts(); //chama a view
  }

  private function cadastroPost(){
  

    if(isset($_SESSION['user'])){
      //Informações do Post
      $description = $_POST['description'];
      $nomeArquivo = $_FILES['image']['name'];
      $linkTemp = $_FILES['image']['tmp_name'];
      $caminhoSalvar = "views/img/$nomeArquivo";
      move_uploaded_file($linkTemp,$caminhoSalvar);

      //Informações do Usuário:
      $id_user = $_SESSION['user']->id;
  
      $post = new Post();
      $resultado = $post->criarPost($caminhoSalvar,$description,$id_user); //true or false
  
      if($resultado){
        header('Location:/oop-desafio/posts'); //mandando para a rota decidir para onde ir
      }else {
        echo "Deu erro";
      }
    } else {
      header('Location:/oop-desafio/sign-in'); //Retorna para página de login
    }
  }

  private function like($postId){
    //verificar se está em session;
    //se estiver, verificar se usuário não deu like antes;

    //se tudo ok, acrescentar +1 no likes do post (para isso, pega quantos tem no momento e devolve acrescentando +1);
    $post = new Post();
    $getLikes = $post->getLikes($postId);
    $addLike = $getLikes + 1;
    return $addLike;
  }

}

