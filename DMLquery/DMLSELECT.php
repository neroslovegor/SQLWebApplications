<?php
	require "function\ConnectDB.php";
	session_start();
	$NameTable = $_SESSION['NameTable'];

	$query1 = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'mybd' AND TABLE_NAME = '$NameTable'; ";
	$query2 = "SELECT * FROM `$NameTable`";

	$result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link)); 
	$result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link)); 
	
	if($result1 && $result2)
	{
	    $rows = mysqli_num_rows($result1); // количество полученных строк
	     
	    for ($i = 0 ; $i < $rows ; ++$i)
	    {
	        $row = mysqli_fetch_row($result1);
	        echo "</tr>";
	            for ($j = 0 ; $j < 1 ; ++$j) echo "<th>$row[$j]</th>";
	        echo "</tr>";
	    }

	    for ($i = 0 ; $i < $rows ; ++$i)
	    {
	    	echo "<table>";
	        $row = mysqli_fetch_row($result2);
	        echo "<tr>";
	            for ($j = 0 ; $j < 20 ; ++$j) echo "<td>$row[$j]</td>";
	        echo "</tr>";
	    }
	    echo "</table>";
	     
	    // очищаем результат
	    mysqli_free_result($result1, $result2);
	}
	 
	mysqli_close($link);
	//header('Location: /')
?>