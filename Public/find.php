<?php
	require_once dirname(__FILE__).'/../Application/Controller/Display.php';
	if(isset($match["params"]["item"])) {
		$get = new Display($match);
		$get->output();
	}
?>	


	