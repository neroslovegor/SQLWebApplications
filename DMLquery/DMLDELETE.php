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
	while($row = mysqli_fetch_array($result)){
	array_push($arr, $row['Field']);
	}
	if($result)
	{
	  $rows = mysqli_num_rows($result); // количество полученных строк
	  // очищаем результат
	  mysqli_free_result($result);
	}

	$nameField0 = $_GET['nameField0'];
	$nameField1 = $_GET['nameField1'];
	$nameField2 = $_GET['nameField2'];
	$nameField3 = $_GET['nameField3'];
	$nameField4 = $_GET['nameField4'];
	$nameField5 = $_GET['nameField5'];

	if($rows == 2 && $nameField0)
	{
		$query = "SELECT MAX(id) FROM $NameTable";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

		if($result)
		{
		    $row = mysqli_fetch_row($result);
	        $MaxID = $row[0];
		    mysqli_free_result($result);
		}

		if($MaxID >= $nameField0)
		{
			$query = "DELETE FROM $NameTable WHERE id = $nameField0 AND $arr[1] = '$nameField1'";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		}
	}

	if($rows == 3 && $nameField0)
	{
		$query = "SELECT MAX(id) FROM $NameTable";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

		if($result)
		{
		    $row = mysqli_fetch_row($result);
	        $MaxID = $row[0];
		    mysqli_free_result($result);
		}

		if($MaxID >= $nameField0)
		{
			$query = "DELETE FROM $NameTable WHERE id = $nameField0 AND $arr[1] = '$nameField1' AND $arr[2] = '$nameField2'";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		}
	}

	if($rows == 4 && $nameField0)
	{
		$query = "SELECT MAX(id) FROM $NameTable";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

		if($result)
		{
		    $row = mysqli_fetch_row($result);
	        $MaxID = $row[0];
		    mysqli_free_result($result);
		}

		if($MaxID >= $nameField0)
		{
			$query = "DELETE FROM $NameTable WHERE id = $nameField0 AND $arr[1] = '$nameField1' AND $arr[2] = '$nameField2' AND $arr[3] = '$nameField3'";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		}
	}

	if($rows == 5 && $nameField0)
	{
		$query = "SELECT MAX(id) FROM $NameTable";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

		if($result)
		{
		    $row = mysqli_fetch_row($result);
	        $MaxID = $row[0];
		    mysqli_free_result($result);
		}

		if($MaxID >= $nameField0)
		{
			$query = "DELETE FROM $NameTable WHERE id = $nameField0 AND $arr[1] = '$nameField1' AND $arr[2] = '$nameField2' AND $arr[3] = '$nameField3' AND $arr[4] = '$nameField4'";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		}
	}

	if($rows == 6 && $nameField0)
	{
		$query = "SELECT MAX(id) FROM $NameTable";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

		if($result)
		{
		    $row = mysqli_fetch_row($result);
	        $MaxID = $row[0];
		    mysqli_free_result($result);
		}

		if($MaxID >= $nameField0)
		{
			$query = "DELETE FROM $NameTable WHERE id = $nameField0 AND $arr[1] = '$nameField1' AND $arr[2] = '$nameField2' AND $arr[3] = '$nameField3' AND $arr[4] = '$nameField4' AND $arr[5] = '$nameField5'";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		}
	}

	mysqli_close($link);
	
	header('Location: /Addtotable.php')
?>