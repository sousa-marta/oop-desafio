<?php 

include "views/includes/header.php"; 

//Se o usuário já estiver logado, ele vai para página de posts (não tem como logar novamente):
if(isset($_SESSION['user'])){
  header('Location:/oop-desafio/posts');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/styles.css">
</head>
<body>

<main class="container">
  <form action="/oop-desafio/login-user" method="post" class="form-container">
    <div class="col-6">
      <h3>Login</h3>
      <div class="form-group">
        <label for="userId">Usuário</label>
        <input name="username" type="text" class="form-control" id="userId" aria-describedby="emailHelp" placeholder="Usuário" required>
      </div>
      <div class="form-group">
        <label for="userPass">Senha</label>
        <input name="userPass" type="password" class="form-control" id="userPass" placeholder="Senha" required>
      </div>
      <button type="submit" class="btn btn-primary">Logar</button>
    </div>
  </form>
</main>
</body>
</html>