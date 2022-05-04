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

	$customCheck0 = $_GET['customCheck0'];
	$customCheck1 = $_GET['customCheck1'];
	$customCheck2 = $_GET['customCheck2'];
	$customCheck3 = $_GET['customCheck3'];
	$customCheck4 = $_GET['customCheck4'];
	$customCheck5 = $_GET['customCheck5'];

	$i = 0;
	$arr = array();
	if ($customCheck0) {
		array_push($arr, $customCheck0);
		$i = $i + 1;
	}
	if ($customCheck1) {
		array_push($arr, $customCheck1);
		$i = $i + 1;
	}
	if ($customCheck2) {
		array_push($arr, $customCheck2);
		$i = $i + 1;
	}
	if ($customCheck3) {
		array_push($arr, $customCheck3);
		$i = $i + 1;
	}
	if ($customCheck4) {
		array_push($arr, $customCheck4);
		$i = $i + 1;
	}
	if ($customCheck5) {
		array_push($arr, $customCheck5);
		$i = $i + 1;
	}

	session_start();
	$NameTable = $_SESSION['NameTable'];

	$query = "SHOW COLUMNS FROM $NameTable";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

	if ($NameTable != "view_1" || $NameTable != "view_2" || $NameTable != "view_3") 
	{
		if ($i == 1)
		{
			$query = "CREATE VIEW view_3 AS SELECT `$arr[0]` FROM `$NameTable`";

			$result = mysqli_query($link, $query);
		}
	}

	if ($NameTable != "view_1" || $NameTable != "view_2" || $NameTable != "view_3") 
	{
		if ($i == 2)
		{
			$query = "CREATE VIEW view_3 AS SELECT `$arr[0]`,`$arr[1]` FROM `$NameTable`";

			$result = mysqli_query($link, $query);
		}
	}

	if ($NameTable != "view_1" || $NameTable != "view_2" || $NameTable != "view_3") 
	{
		if ($i == 3)
		{
			$query = "CREATE VIEW view_3 AS SELECT `$arr[0]`,`$arr[1]`,`$arr[3]` FROM `$NameTable`";

			$result = mysqli_query($link, $query);
		}
	}

	if ($NameTable != "view_1" || $NameTable != "view_2" || $NameTable != "view_3") 
	{
		if ($i == 4)
		{
			$query = "CREATE VIEW view_3 AS SELECT `$arr[0]`,`$arr[1]`,`$arr[2]`,`$arr[3]` FROM `$NameTable`";

			$result = mysqli_query($link, $query);
		}
	}

	if ($NameTable != "view_1" || $NameTable != "view_2" || $NameTable != "view_3") 
	{
		if ($i == 5)
		{
			$query = "CREATE VIEW view_3 AS SELECT `$arr[0]`,`$arr[1]`,`$arr[2]`,`$arr[3]`,`$arr[4]` FROM `$NameTable`";

			$result = mysqli_query($link, $query);
		}
	}

	if ($NameTable != "view_1" || $NameTable != "view_2" || $NameTable != "view_3") 
	{
		if ($i == 6)
		{
			$query = "CREATE VIEW view_3 AS SELECT `$arr[0]`,`$arr[1]`,`$arr[2]`,`$arr[3]`,`$arr[4]`,`$arr[5]` FROM `$NameTable`";

			$result = mysqli_query($link, $query);
		}
	}

	mysqli_close($link);
	header('Location: /Views.php')
?>