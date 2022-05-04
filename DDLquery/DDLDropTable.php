<?php
	$user = 'root';
	$password = 'root';
	$db = 'mybd';
	$host = 'localhost';
	$port = 3307;

	$link = mysqli_init();
	$success = mysqli_real_connect(
		$link, 
		$host, 
		$user, 
		$password, 
		$db,
		$port
	);
	session_start();
	$NameTable = $_SESSION['NameTable'];

	if ($NameTable != 'log') {
		if ($NameTable == "view_1" || $NameTable == "view_2" || $NameTable == "view_3") 
		{
			$query = "DROP VIEW $NameTable";
			$result = mysqli_query($link, $query); 	 
			mysqli_close($link);
		}
		else
		{
			$query = "DROP TABLE $NameTable";
			$result = mysqli_query($link, $query); 	 
			mysqli_close($link);
		}
	}

	header('Location: /')
?>