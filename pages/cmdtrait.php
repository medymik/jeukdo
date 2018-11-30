<?php
include 'filter/guess.php';
$db = new App\Db();

$results = $db->getRows('select * from commande,serveur where commande.server_id = serveur.id and user_id=?',
	[$_SESSION['user']['id']]);
?>

<div class="row mt-4">
	<h2>Les commandes</h2>
	<table class="table">
		<thead>
			<th>Commande</th>
			<th>Server</th>
			<th>Status</th>
		</thead>
		<tbody>
			<?php foreach ($results as $commande): ?>
				<tr>
					<td>
						<?php echo $commande['commande']; ?>
					</td>
					<td>
						<?php echo $commande['nom']; ?>
					</td>
					<td>
						En train de traitement
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

</div>