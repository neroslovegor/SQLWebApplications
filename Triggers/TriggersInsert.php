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
	$ADDON = $_GET['ADDON'];
	$ADDOFF = $_GET['ADDOFF'];
	$_SESSION['ADDON'] = $ADDON;

	if ($NameTable != 'log') {
		if ($ADDON == 'ADD') {
			$query = "CREATE TRIGGER trigger_insert AFTER INSERT ON `$NameTable` FOR EACH ROW INSERT INTO `log` (table_name,event) VALUES('$NameTable','INSERT')";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
			mysqli_free_result($result);
		}
		else
		{
		    $query = "DROP TRIGGER trigger_insert";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
			mysqli_free_result($result);
		}
	}
	mysqli_close($link);

	header('Location: /Triggers.php')
?>