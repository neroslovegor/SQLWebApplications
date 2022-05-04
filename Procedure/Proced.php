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

	$ProcON = $_GET['ProcON'];
	$ProcOFF = $_GET['ProcOFF'];

	if ($ProcON == 'ON') {
		$query = "CREATE PROCEDURE Proc1(lenght INT(2))
          BEGIN
            SELECT * FROM `staff` WHERE `Продолжительность трудовой деятельности`=lenght;
          END";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		mysqli_free_result($result);

		$query = "CREATE PROCEDURE Proc2(salary INT(10))
          BEGIN
            SELECT * FROM `staff` WHERE `ЗП`>=salary;
          END";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		mysqli_free_result($result);

		$query = "CREATE PROCEDURE Proc3(numb INT(2))
          BEGIN
            SELECT * FROM `staff` WHERE RIGHT(`Номер телефона`, 4)=numb;
          END";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		mysqli_free_result($result);
	}
	else
	{
		if ($ProcOFF == 'OFF') {
		    $query = "DROP PROCEDURE Proc1";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
			mysqli_free_result($result);

			$query = "DROP PROCEDURE Proc2";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
			mysqli_free_result($result);

			$query = "DROP PROCEDURE Proc3";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
			mysqli_free_result($result);
		}
	}
	mysqli_close($link);

	header('Location: /Procedure.php')
?>