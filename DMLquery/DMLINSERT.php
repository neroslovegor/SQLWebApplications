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

	$nameField1 = $_GET['nameField1'];
	$nameField2 = $_GET['nameField2'];
	$nameField3 = $_GET['nameField3'];
	$nameField4 = $_GET['nameField4'];
	$nameField5 = $_GET['nameField5'];

	if($rows == 2 && $nameField1)
	{
		$query = "INSERT INTO $NameTable ($arr[1]) VALUES('$nameField1')";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	}

	if($rows == 3 && $nameField1 && $nameField2)
	{
		$query = "INSERT INTO $NameTable ($arr[1],$arr[2]) VALUES('$nameField1', '$nameField2')";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	}

	if($rows == 4 && $nameField1 && $nameField2 && $nameField3)
	{
		$query = "INSERT INTO $NameTable ($arr[1],$arr[2],$arr[3]) VALUES('$nameField1','$nameField2','$nameField3')";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	}

	if($rows == 5 && $nameField1 && $nameField2 && $nameField3 && $nameField4)
	{
		$query = "INSERT INTO $NameTable ($arr[1],$arr[2],$arr[3],$arr[4]) VALUES('$nameField1','$nameField2','$nameField3','$nameField4')";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	}

	if($rows == 6 && $nameField1 && $nameField2 && $nameField3 && $nameField4 && $nameField5)
	{
		$query = "INSERT INTO $NameTable ($arr[1],$arr[2],$arr[3],$arr[4],$arr[5]) VALUES('$nameField1','$nameField2','$nameField3','$nameField4','$nameField5')";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	}
	 
	mysqli_close($link);

	header('Location: /Addtotable.php')
?>