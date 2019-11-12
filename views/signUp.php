<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cadastre-se</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/styles.css">
</head>
<body>

<?php include "views/includes/header.php"; ?>

<main class="container">
  <!-- não está puxando infos do styles.css -->
  <form class="form-container">
    <div class="col-10">
      <h3>Cadastre-se</h3>
      <div class="form-group">
        <div class="form-row">
          <div class="col-12 col-sm-6">
            <input type="text" class="form-control" placeholder="Nome">
          </div>
          <div class="col-12 col-sm-6">
            <input type="text" class="form-control" placeholder="Sobrenome">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="userId">Usuário</label>
        <input type="email" class="form-control" id="userId" aria-describedby="emailHelp" placeholder="Defina seu nome de usuário">
      </div>
      <div class="form-group">
        <label for="userPass">Senha</label>
        <input type="password" class="form-control" id="userPass" placeholder="Defina sua senha">
      </div>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>

  </form>
</main>
</body>
</html>