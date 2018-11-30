<?php 
include 'filter/auth.php';
	if(isset($_POST['login']))
	{
		if(!empty(trim($_POST['email'])) && !empty(trim($_POST['mdp'])))
		{
			extract($_POST);
			$email = htmlentities($email);
			$mdp = htmlentities($mdp);
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)) $errors[] = "Votre email est pas valid !";

			$db = new App\Db;
			$user = $db->getRow('select * from user where email = ? and password = ?',[$email,$mdp]);

			if($user)
			{
				$_SESSION['user'] = $user;
				header('location:?p=index');
			}else
			{
				$errors[] = "Authentification incorrect !";
			}

			print_r($user);

		}
		else
		{
			$errors[] = "Tous les champs sont obligatoire";
		}
	}
 ?>
<div class="col-md-6 offset-md-3">
	<h1 class="text-center">Connexion</h1>
	<form method="post">
		<div class="form-group">
			<label for="email">Votre email</label>
			<input type="text" class="form-control" name="email">
		</div>
		<div class="form-group">
			<label for="email">Mot de passe</label>
			<input type="password" class="form-control" name="mdp">
		</div>
		
		<div class="form-group">
			<input type="submit" class="form-control btn btn-primary" value="Connexion" name="login">
		</div>

	</form>
	<?php require 'messages/errors.php'; ?>
</div>
