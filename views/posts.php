<?php

$posts = $_REQUEST['posts']; // pegando informações que estão sendo colocados no request do controller

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="views/css/styles.css">
</head>
<body>
    
	<?php include "views/includes/header.php"; ?>
	
	<main class="board">
		<?php foreach($posts as $post): ?>
			<div class="card mt-5">
				<div class="user-post">
					<p class="m-0 ml-3 py-2 font-weight-bold">
						<?php echo "$post->username"; ?>
					</p>
				</div>
				<img id="cardimg" src="<?php echo $post->image; ?>" alt="Card image cap">
				<div class="card-body">
					<div>
						<p class="d-sm-inline-block">
							<a class="fa" href="/oop-desafio/like"> &#xf004<a>
						</p>
						<p class="d-sm-inline-block">
							<?= "Curtidas: $post->likes"; ?>
						</p>
					</div>

					<div class="flex-row">
						<p class="font-weight-bold d-sm-inline-block">
							<?= $post->username; ?>
						</p>
						<p class="d-sm-inline-block">
							<?= $post->description; ?>
						</p>					
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		<a class="float-button" href="/oop-desafio/formulario-post">&#10010;</a>
	</main>
    

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>