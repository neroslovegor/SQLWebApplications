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
	$DELON = $_GET['DELON'];
	$DELEOFF = $_GET['DELEOFF'];
	$_SESSION['DELON'] = $DELON;

	if ($NameTable != 'log') {
		if ($DELON == 'DEL') {
			$query = "CREATE TRIGGER trigger_delete AFTER DELETE ON `$NameTable` FOR EACH ROW INSERT INTO `log` (table_name,event) VALUES('$NameTable','DELETE')";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
			mysqli_free_result($result);
		}
		else
		{
		    $query = "DROP TRIGGER trigger_delete";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
			mysqli_free_result($result);
		}
	}
	mysqli_close($link);

	header('Location: /Triggers.php')
?>