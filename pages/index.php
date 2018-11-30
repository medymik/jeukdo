<?php 
	$db = new App\Db();
	$pays = $db->getRows('select * from pays');
 ?>

<div class="row mt-4">
	
  
	<ul class="list-group col-md-12">
	<?php foreach ($pays as $country): ?>
		<li class="list-group-item text-center">
    		<a href="?p=recharge&pays=<?php echo $country['id']; ?>"><?php echo $country['nom']; ?></a>
  		</li>
	<?php endforeach ?>
	</ul>
</div>