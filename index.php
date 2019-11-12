<?php 

  //Se não tiver nada pra cadastrar, vai para lista de posts:
  $rotas = key($_GET)?key($_GET):"posts";

  //Decidir qual controller utilizar:
  switch($rotas){
    case "posts":
      include "controllers/PostController.php";
      $controller = new PostController();
      $controller->acao($rotas);
    break;

    case "formulario-post":
      include "controllers/PostController.php";
      $controller = new PostController();
      $controller->acao($rotas);
    break;

    //Rota para o programador:
    case "cadastrar-post":
      include "controllers/PostController.php";
      $controller = new PostController();
      $controller->acao($rotas);
    break;

    case "sign-up":
      include "controllers/UserController.php";
      $controller = new UserController();
      $controller->acao($rotas);
  }

?>