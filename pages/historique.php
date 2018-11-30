<?php 
	 include 'filter/guess.php';
	$db = new App\Db();
	$paiments = $db->getRows('select * from paiement where id_user = ?',[$_SESSION['user']['id']]);
 ?>
<div class="container">
	<h1 class="text-center">Historique</h1>
	
	<?php if(count($paiments)>0): ?>
	<table class="table">
		<thead>
			<th>Montant</th>
			<th>Date</th>
			<th>Method</th>
			<th>Code</th>
		</thead>
		<tbody>
			<?php foreach($paiments as $pay): ?>
				<tr>
					<td><?php echo $pay['montant'].' Euros'; ?></td>
					<td><?php echo $pay['date_demande']; ?></td>
					<td><?php echo $pay['method']; ?></td>
					<td><?php echo $pay['code']; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>


	<?php else: ?>
	
	<p class="text-center">Vous avez pas encore effectuer de paiements !</p>
	<?php endif; ?>
</div>