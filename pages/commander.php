<?php 
	include 'filter/guess.php';
	$db = new App\Db();
		if(!isset($_POST['cmd']))
		{

			if(isset($_GET['server']))
		{
		
		$res = $db->getRow('select * from serveur where id=?',[$_GET['server']]);
		if(!$res){
			header('location:?p=home');
		}
		}else
		{
		header('location:?p=home');
		}

		}
		else
		{
			if(!empty($_POST['qte']) && !empty($_POST['server']))
			{
				extract($_POST);
				$db->insertRow('insert into commande(commande,server_id,user_id) values(?,?,?)',[
					$_POST['qte'],
					$_POST['server'],
					$_SESSION['user']['id']

				]);
				header('location:?p=cmdtrait');
			}
		}

	
 ?>

<div class="row mt-4">
	<form method="post" class="col-md-4 offset-md-4">
		<input type="hidden" name="server" value="<?php echo $_GET['server']; ?>">
		<div class="form-group">
			<label>Qte :</label>
			<select name="qte" class="form-control">
				<option value="5m">5 m</option>
				<option value="5m">10 m</option>
				<option value="5m">20 m</option>
				<option value="5m">30 m</option>
			</select>
		</div>
		<div class="form-group">
			<button type="submit" name="cmd" class="btn btn-primary">Commander</button>
		</div>
	</form>
</div>