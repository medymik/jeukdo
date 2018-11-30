<?php 

$db = new App\Db();

$servers = $db->getRows('select * from serveur');

?>

<div class="row mt-4">
	
  
	<ul class="list-group col-md-12">
	<?php foreach ($servers as $server): ?>
		<li class="list-group-item text-center">
    		<a href=""><?php echo $server['nom']; ?></a>
    		<p>Prix <?php echo $server['prix'];  ?> €</p>
    		<a href="?p=commander&server=<?php echo $server['id']; ?>" class="btn btn-primary">Commander</a>
  		</li>
	<?php endforeach ?>
	</ul>
</div>