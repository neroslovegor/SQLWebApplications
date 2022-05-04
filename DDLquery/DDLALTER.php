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

	$nameField = $_GET['nameField'];
	$typeField = $_GET['typeField'];
	$sizeField = $_GET['sizeField'];

	if($nameField && $typeField && $sizeField)
	{
		$query = "ALTER TABLE $NameTable ADD $nameField $typeField($sizeField) NOT NULL";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 	 
		mysqli_close($link);
	}
	
	header('Location: /Addtotable.php')
?>