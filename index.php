<?php 

  //Se não tiver nada pra cadastrar, vai para lista de posts:
  $rotas = key($_GET)?key($_GET):"sign-in";

  //Decidir qual controller utilizar:
  switch($rotas){
    // Posts Controlers:
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

    case "cadastrar-post":
      include "controllers/PostController.php";
      $controller = new PostController();
      $controller->acao($rotas);
    break;

    case "like":
      include "controllers/PostController.php";
      $controller = new PostController();
      $controller->acao($rotas);

    // Users Controlers:
    case "sign-up":
      include "controllers/UserController.php";
      $controller = new UserController();
      $controller->acao($rotas);
    break;

    case "register-user":
      include "controllers/UserController.php";
      $controller = new UserController();
      $controller->acao($rotas);
    break;

    case "login-user":
      include "controllers/UserController.php";
      $controller = new UserController();
      $controller->acao($rotas);
    break;

    case "logout":
      include "controllers/UserController.php";
      $controller = new UserController();
      $controller->acao($rotas);

    //Usando página para signIn, se for usar modal, não preciso dessa parte: 
    case "sign-in":
      include "controllers/UserController.php";
      $controller = new UserController();
      $controller->acao($rotas);
    break;

  }

?>