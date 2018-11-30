<?php 
	 include 'filter/guess.php';
	 $db = new App\Db;

if(isset($_GET['pays']))
{

	$numbers = $db->getRows('select * from telephone,pays where telephone.pays_id = pays.id and pays.id=?',[$_GET['pays']]);

if(isset($_POST['recharge'])){
	$starpass = new App\Starpass();

	if($starpass->check($_POST['id'],$_POST['code']))
	{
		$errors[] = 'Vous avez créditer votre compte !';
		$db->insertRow('insert into codes(code,id_user) values(?,?)',[$_POST['code'],$_SESSION['user']['id']]);
	}
	else $errors[] = 'Votre code est incorrect !';
}
}else{
	header('location:?p=index');
}
 ?>

 
 <div class="row">
 	<?php include 'messages/errors.php'; ?>
 </div>
<p class="text-center">Votre Solde est : <?php echo $_SESSION['user']['solde']; ?></p>
<div class="row mt-4">
		
		<?php foreach ($numbers as $number): ?>
		
<div class="col-md-4 card text-white bg-primary">
  <div class="card-header"><?php echo $number['nom'].' Gains : '.$number['prix']; ?></div>
  <div class="card-body">
    <h5 class="card-title">Prix d'appelle <?php echo $number['callprix']; ?></h5>
    <p class="card-text"><strong><?php echo $number['numero']; ?></strong></p>
    <form method="post">
    	<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $number['id']; ?>">
			<input type="text" class="form-control" name="code" placeholder="code">
		</div>
		<div class="form-group">
			<input type="submit" class="form-control btn btn-secondary" value="Recharger" name="recharge">
		</div>
    </form>
  </div>
</div>
	<?php endforeach; ?>

</div>
