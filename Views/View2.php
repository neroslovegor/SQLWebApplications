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

	$query = "SHOW COLUMNS FROM $NameTable";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	$arr = array();
	$i = 0;
	while($row = mysqli_fetch_array($result)){
		array_push($arr, $row['Field']);
		$i = $i + 1;
	}
	if($result)
	{
	  $rows = mysqli_num_rows($result); // количество полученных строк
	  // очищаем результат
	  mysqli_free_result($result);
	}

	if ($NameTable != "view_1" || $NameTable != "view_2" || $NameTable != "view_3") 
	{
		if ($i == 2)
		{
			$query = "CREATE VIEW view_2 AS SELECT `$arr[1]` FROM `$NameTable`";

			$result = mysqli_query($link, $query);
		}
	}

	if ($NameTable != "view_1" || $NameTable != "view_2" || $NameTable != "view_3") 
	{
		if ($i == 3)
		{
			$query = "CREATE VIEW view_2 AS SELECT `$arr[1]`,`$arr[2]` FROM `$NameTable`";

			$result = mysqli_query($link, $query);
		}
	}

	if ($NameTable != "view_1" || $NameTable != "view_2" || $NameTable != "view_3") 
	{
		if ($i == 4)
		{
			$query = "CREATE VIEW view_2 AS SELECT `$arr[1]`,`$arr[2]`,`$arr[3]` FROM `$NameTable`";

			$result = mysqli_query($link, $query);
		}
	}

	if ($NameTable != "view_1" || $NameTable != "view_2" || $NameTable != "view_3" && $rows == 5) 
	{
		$query = "CREATE VIEW view_2 AS SELECT `$arr[1]`,`$arr[2]`,`$arr[3]`,`$arr[4]` FROM `$NameTable`";

		$result = mysqli_query($link, $query);
	}

	if ($NameTable != "view_1" || $NameTable != "view_2" || $NameTable != "view_3" && $rows == 6) 
	{
		$query = "CREATE VIEW view_2 AS SELECT `$arr[1]`,`$arr[2]`,`$arr[3]`,`$arr[4]`,`$arr[5]` FROM `$NameTable`";

		$result = mysqli_query($link, $query);
	}

	mysqli_close($link);
	header('Location: /Views.php')
?>