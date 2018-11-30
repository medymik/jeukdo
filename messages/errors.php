<?php 
	if(isset($errors) && count($errors)>0)
	{
		foreach ($errors as $error) {
			echo "<li>$error</li>";
		}
	}
 ?>