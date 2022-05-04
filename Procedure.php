<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>phpMyAdmin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="\css\styleLAB5.css">
</head>
<body>
  <?php require "blocks/head.php" ?>
<div class="container-fluid">
  <div class="row">
    <?php require "blocks/menu.php" ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
          <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
        </div>
        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
          <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
        </div>
      </div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Procedure<span class="badge badge-secondary">
        <?php 
          $NameTable = "staff";
          echo "$NameTable";
        ?></span></h2>
      </div>
      <form class="card p-3 mt-2" method="get" action="\Procedure\Proced.php">
        <div class="input-group-appendn ml-3">
          <button type="submit" class="btn btn-outline-success" name="ProcON" value="ON" style="width: 49%; h">Включить</button>
          <button type="submit" class="btn btn-outline-danger" name="ProcOFF" value="OFF" style="width: 49%">Выключить</button>
        </div>
      </form>
      <form class="card p-3 mt-2" method="get">
        <div class="input-group mt-1">
          <input type="text" class="form-control form-control-dark" placeholder="Продолжительность трудовой деятельности" name="Proc1">
          <input type="text" class="form-control form-control-dark" placeholder="ЗП" name="Proc2">
          <input type="text" class="form-control form-control-dark" placeholder="Последние 4 цифры телефона" name="Proc3">
        </div>
        <div class="mt-1">
          <button type="submit" class="btn btn-secondary" style="width: 100%">Search</button>
        </div>
        <div class="table-responsive mt-3">
          <table class="table table-striped table-sm">
            <?php 
              require "function\ConnectDB.php";
              $arr = array();
              $query = "SHOW COLUMNS FROM $NameTable";
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
              $sup = 0  ;
              echo "<thead><tr>";
              for ($i = 0; $i < $rows ; ++$i)
              {
                echo "<th>$arr[$i]</th>";
                $sup = $sup + 1;
              }
              echo "</thead></tr>";

              $Proc1 = $_GET['Proc1'];
              $Proc2 = $_GET['Proc2'];
              $Proc3 = $_GET['Proc3'];
              $flag = 0;

              if($Proc1 && !$Proc2 && !$Proc3)
              {
                $query = "CALL `Proc1`('$Proc1');";
                $flag = 1;
              }
              if(!$Proc1 && $Proc2 && !$Proc3)
              {
                $query = "CALL `Proc2`('$Proc2');";
                $flag = 1;
              }
              if(!$Proc1 && !$Proc2 && $Proc3)
              {
                $query = "CALL `Proc3`('$Proc3');";
                $flag = 1;
              }


              $result = mysqli_query($link, $query); 
              if($result && $flag == 1)
              {
                  $rows = mysqli_num_rows($result); // количество полученных строк
                  echo "<tbody>";
                  for ($i = 0 ; $i < $rows ; ++$i)
                  {
                      $row = mysqli_fetch_row($result);
                      echo "<tr>";
                      for ($j = 0 ; $j < $sup ; ++$j) echo "<td>$row[$j]</td>";
                      echo "</tr>";
                  }
                  echo "</tbody>";
                   
                  // очищаем результат
                  mysqli_free_result($result);
              }
                 
              mysqli_close($link);
            ?>
          </table>
        </div>
      </form>
    </main>
  </div>
</div>
</body>
</html>

