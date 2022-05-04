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
	$UPDON = $_GET['UPDON'];
	$UPDOFF = $_GET['UPDOFF'];
	$_SESSION['UPDON'] = $UPDON;

	if ($NameTable != 'log') {
		if ($UPDON == 'UPD') {
			$query = "CREATE TRIGGER trigger_update AFTER UPDATE ON `$NameTable` FOR EACH ROW INSERT INTO `log` (table_name,event) VALUES('$NameTable','UPDATE')";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
			mysqli_free_result($result);
		}
		else
		{
		    $query = "DROP TRIGGER trigger_update";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
			mysqli_free_result($result);
		}
	}
	mysqli_close($link);

	header('Location: /Triggers.php')
?>