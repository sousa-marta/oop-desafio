<?php

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
    }
  }

  private function viewFormularioPost(){
    include "views/newPost.php";
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
    $description = $_POST['description'];
    $nomeArquivo = $_FILES['image']['name'];
    $linkTemp = $_FILES['image']['tmp_name'];
    $caminhoSalvar = "views/img/$nomeArquivo";
    move_uploaded_file($linkTemp,$caminhoSalvar);

    $post = new Post();
    $resultado = $post->criarPost($caminhoSalvar,$description); //vai estar analisando um true or false

    if($resultado){
      header('Location:/oop-desafio/posts'); //mandando para a rota decidir para onde ir
    }else {
      echo "Deu erro";
    }
  }

}

