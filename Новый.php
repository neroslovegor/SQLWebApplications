<!DOCTYPE html>
<html>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</html>
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

  $query = "SHOW TABLES FROM `mybd`";
  $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
  while ($row = mysqli_fetch_array($result)) { // массив с данными
    echo "Таблица: $row[0]<br>"; //вывод данных
}

echo "В базе `mybd`: ".mysqli_num_rows($result)." таблиц"; // вывод числа таблиц

  /*$arr = array();
  $query = "show tables";

  $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
  while($row = mysqli_fetch_array($result)){
    array_push($arr, $row['Field']);
  }
  if($result)
  {
    $rows = mysqli_num_rows($result); // количество полученных строк
    // очищаем результат
    mysqli_free_result($result);
  }

  echo "<table><tr>";
  for ($i = 0 ; $i < $rows ; ++$i)
  {
    echo "<th>$arr[$i]</th>";
  }
  echo "</tr>";*/
   
  mysqli_close($link);
?>