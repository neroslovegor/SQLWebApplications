<?php
	//require "function\ConnectDB.php";
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
	$Column = $_SESSION['ColumnCreate'];
	$tableName = $_GET['tableName'];

	$nameField0 = $_GET['nameField0'];
	$typeField0 = $_GET['typeField0'];
	$sizeField0 = $_GET['sizeField0'];

	$nameField1 = $_GET['nameField1'];
	$typeField1 = $_GET['typeField1'];
	$sizeField1 = $_GET['sizeField1'];

	$nameField2 = $_GET['nameField2'];
	$typeField2 = $_GET['typeField2'];
	$sizeField2 = $_GET['sizeField2'];

	$nameField3 = $_GET['nameField3'];
	$typeField3 = $_GET['typeField3'];
	$sizeField3 = $_GET['sizeField3'];

	$nameField4 = $_GET['nameField4'];
	$typeField4 = $_GET['typeField4'];
	$sizeField4 = $_GET['sizeField4'];


	if($Column == 1 && $tableName)
	{
		if($nameField0 && $typeField0 && $sizeField0)
		{
			$query = "CREATE TABLE $tableName
			(
			    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			    $nameField0 $typeField0($sizeField0)
			)";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		}	 
	}

	if($Column == 2 && $tableName)
	{
		if($nameField0 && $typeField0 && $sizeField0 && $nameField1 && $typeField1 && $sizeField1)
		{
			$query = "CREATE TABLE $tableName
			(
			    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			    $nameField0 $typeField0($sizeField0),
			    $nameField1 $typeField1($sizeField1)
			)";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		}	 
	}

	if($Column == 3 && $tableName)
	{
		if($nameField0 && $typeField0 && $sizeField0 && $nameField1 && $typeField1 && $sizeField1 && $nameField2 && $typeField2 && $sizeField2)
		{
			$query = "CREATE TABLE $tableName
			(
			    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			    $nameField0 $typeField0($sizeField0),
			    $nameField1 $typeField1($sizeField1),
			    $nameField2 $typeField2($sizeField2)
			)";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		}	 
	}

	if($Column == 4 && $tableName)
	{
		if($nameField0 && $typeField0 && $sizeField0 && $typeField1 && $sizeField1 && $nameField2 && $typeField2 && $sizeField2 && $nameField3 && $typeField3 && $sizeField3)
		{
			$query = "CREATE TABLE $tableName
			(
			    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			    $nameField0 $typeField0($sizeField0),
			    $nameField1 $typeField1($sizeField1),
			    $nameField2 $typeField2($sizeField2),
			    $nameField3 $typeField3($sizeField3)
			)";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		}	 
	}

	if($Column == 5 && $tableName)
	{
		if($nameField0 && $typeField0 && $sizeField0 && $typeField1 && $sizeField1 && $nameField2 && $typeField2 && $sizeField2 && $nameField3 && $typeField3 && $sizeField3 && $nameField4 && $typeField4 && $sizeField4)
		{
			$query = "CREATE TABLE $tableName
			(
			    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			    $nameField0 $typeField0($sizeField0),
			    $nameField1 $typeField1($sizeField1),
			    $nameField2 $typeField2($sizeField2),
			    $nameField3 $typeField3($sizeField3),
			    $nameField4 $typeField4($sizeField4)
			)";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		}	 
	}

	/*$query = "CREATE TABLE '$tableName'
		(
		    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		    Name varchar(10),
		    Surname varchar(15),
		    GroupNumber text(10)
		)";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); */	 
	mysqli_close($link);
	
	header('Location: /CreateTable.php?')
?>