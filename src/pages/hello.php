<?php 
	$name = $request->get('name', 'World');
	echo '<h3>Hello ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</h3>';
?>
