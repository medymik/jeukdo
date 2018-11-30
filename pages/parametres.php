<?php 
include 'filter/guess.php';

if(isset($_POST['changemdp']))
{
	if(!empty($_POST['password']) && !empty($_POST['passwordretype']))
	{
		if($_POST['password']==$_SESSION['user']['password'])
		{
			$db = new App\Db();
			$db->updateRow('update user set password=? where id = ?',[
				$_POST['passwordretype'],
				$_SESSION['user']['id']
			]);
			$_SESSION['user']['password'] = $_POST['passwordretype'];
			$errors[] = "Votre mot de passe à été bien modifier !";
		}else $errors[] = "Votre mot de passe est incorrect";
	}
}

if(isset($_POST['valider']))
{
	if(!empty($_POST['adresse']) && !empty($_POST['cin']))
	{
		$db = new App\Db();
		$db->updateRow('update user set adresse=?,cin=? where id=?',
			[
				$_POST['adresse'],
				$_POST['cin'],
				$_SESSION['user']['id']
			]
		);
		$errors[] = "Vos informations ont été bien enregistrer !";
	}
}
 ?>

 <div class="row mt-4">
 
 	<form class="col-md-4 offset-md-4" method="post">
 		<h1>Changement de mot de passe</h1>
 		<div class="form-group">
 			<label>Mot de passe Actuel</label>
			<input type="password" name="password" class="form-control">
 		</div>
 		<div class="form-group">
 			<label>Le nouveau mot de passe</label>
			<input type="password" name="passwordretype" class="form-control">
 		</div>
 		<div class="form-group">
			<input type="submit" name="changemdp" value="Changer le mot de passe" class="form-control btn btn-primary">
 		</div>
 	</form>
	<?php require 'messages/errors.php'; ?>
 </div>

 <div class="row mt-4">
 	<?php if ($_SESSION['user']['cin']=='' && !$_SESSION['user']['adresse']==''): ?>

 		<form class="col-md-4 offset-md-4" method="post">
 		<h1>Complètez vos informations</h1>
 		<div class="form-group">
 			<label>Cin :</label>
			<input type="text" name="cin" class="form-control">
 		</div>
 		<div class="form-group">
 			<label>Adresse </label>
			<textarea name="adresse" class="form-control" placeholder="Adresse complet inclus pays ext..."></textarea>
 		</div>
 		<div class="form-group">
			<input type="submit" name="valider" value="Valider" class="form-control btn btn-primary">
 		</div>
 	</form>
 		
 	<?php endif ?>
 	
 	
 </div>