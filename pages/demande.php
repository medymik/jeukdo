<?php 
	 include 'filter/guess.php';
	if(isset($_POST['demande']))
	{
		if(!empty(trim($_POST['solde'])) && !empty(trim($_POST['moyen'])))
		{
			extract($_POST);

			$solde = htmlentities($solde);
			$moyen = htmlentities($moyen);

			if (is_numeric( $solde ))
			{

				if($solde >= 50)
				{
					if($solde<=$_SESSION['user']['solde'])
					{


						$db = new App\Db();

						$db->updateRow('update user set solde = ?',[$_SESSION['user']['solde']-$solde]);



						$db->insertRow('insert into paiement(id_user,montant,date_demande,method) values(?,?,?,?)',
							[
								$_SESSION['user']['id'],
								$solde,
								date('Y/m/d'),
								$moyen
							]
					);

					$user = $db->getRow('select * from user where id = ?',[$_SESSION['user']['id']]);
					unset($_SESSION['user']);
					$_SESSION['user'] = $user;

					header('location:?p=historique');







					}else $errors[] = "Votre solde n'est pas suffisant a retiré !";
				} else  $errors[] = "Le minimum à demander est de 50 et plus !";


			} else  $errors[] = "Veillez rentrer une valeur correct !";

		}else{
			$errors[] = "Les champs sont obligatoire !";
		}
	}
 ?>

 <div class="col-md-6 offset-md-3">
	<h1 class="text-center">Demande</h1>
	<form method="post">
		<p>Votre solde est <?php echo $_SESSION['user']['solde'].' euros';?></p>
		<p class="text-danger">NP : Le minumim à demander est 50 euros</p>
		<div class="form-group">
			<label for="solde">Le montant</label>
			<input type="text" class="form-control" name="solde">
		</div>
		<div class="form-group">
			<label for="moyen">Moyen de paiement</label>
			<select name="moyen" class="form-control">
				<option value="paypal">Paypal</option>
				<option value="skrill">Skrill</option>
				<option value="payoneer">Payoneer</option>
				<option value="cash_plus">Cash+</option>
				<option value="wafacash">Wafacash</option>
			</select>
		</div>


		
		<div class="form-group">
			<input type="submit" class="form-control btn btn-primary" value="Demander" name="demande">
		</div>

	</form>
	<?php require 'messages/errors.php'; ?>
</div>
