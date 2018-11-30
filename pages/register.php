<?php 
include 'filter/auth.php';
$errors = array();

if(isset($_POST['register'])){
	if(!empty(trim($_POST['email'])) && !empty(trim($_POST['mdp'])) && !empty(trim($_POST['rmdp'])) && !empty(trim($_POST['nom'])) && !empty(trim($_POST['prenom']))){

		extract($_POST);

		$email = htmlentities($email);
		$mdp = htmlentities($mdp);
		$rmdp = htmlentities($rmdp);
		$nom = htmlentities($nom);
		$prenom = htmlentities($prenom);

		if($mdp!=$rmdp) $errors[] = "Vos mots de passes sont pas identiques !";
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)) $errors[] = "Votre email est pas valid !";

		$db = new App\Db();

		$user = $db->getRow('select * from user where email = ? ',[$email]);
		if($user) $errors[] = "Votre email est deja existe !";

		if(count($errors)==0)
		{
			
			$db->insertRow('insert into user(nom,prenom,email,password) values(?,?,?,?)',[$nom,$prenom,$email,$mdp]);

			header('Location:?p=login');
		}


	}
	else
	{
		$errors[] = "Tous les champs sont obligatoires !";
	}
}
?>

<div class="col-md-6 offset-md-3">
	<h1 class="text-center">Inscription</h1>
	<form method="post">
		<div class="form-group">
			<label for="email">Votre Nom</label>
			<input type="text" class="form-control" name="nom">
		</div>
		<div class="form-group">
			<label for="email">Votre Prénom</label>
			<input type="text" class="form-control" name="prenom">
		</div>
		<div class="form-group">
			<label for="email">Votre email</label>
			<input type="text" class="form-control" name="email">
		</div>
		<div class="form-group">
			<label for="email">Mot de passe</label>
			<input type="password" class="form-control" name="mdp">
		</div>
		<div class="form-group">
			<label for="email">Confirmer le mot de passe</label>
			<input type="password" class="form-control" name="rmdp">
		</div>
		<div class="form-group">
			<input type="submit" class="form-control btn btn-primary" value="Inscription" name="register">
		</div>

	</form>
	<?php require 'messages/errors.php'; ?>
</div>

