<?php

require 'vendor/autoload.php';
session_start();

$page = 'home.php';
if(isset($_GET['p'])){
	$pages = scandir('pages');
	if(in_array($_GET['p'].'.php', $pages))
	{
		$page = $_GET['p'].'.php';

	}
}

if(isset($_GET['json']))
{
	include 'api/serveur.php';
	exit;
}
?>
<html>
	<head>
		<title>Achat et Vente de kamas en ligne</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	</head>
	<body>
		<?php include 'include/navbar.php'; ?>
		<div class="container">
			<?php include 'pages/'.$page; ?>
		</div>
	</body>
	
	<script src="web/build/app.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</html>