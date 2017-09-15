<?php
	echo "<br>";echo "<br>";
	
	if (isset($_POST['submit_travels'])) {
		$_SESSION=$_POST;

		$callback="index.php?module=travels&view=results_travels";
		//die('<script>window.location.href="'.$callback .'";</script>');

		redirect($callback);
	}		
	include 'modules/travels/view/create_travels.php';
