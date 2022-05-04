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

	if ($NameTable != "view_1" || $NameTable != "view_2" || $NameTable != "view_3") 
	{
		$query = "CREATE VIEW view_1 AS SELECT * FROM `$NameTable`";

		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	}

	mysqli_close($link);
	header('Location: /Views.php')
?>