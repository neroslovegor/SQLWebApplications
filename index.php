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
        <h2>Обзор таблицы<span class="badge badge-secondary">
          <?php 
            session_start();
            $NameTable = $_GET['NameTable'];
            $_SESSION['NameTable'] = $NameTable;
            echo "$NameTable";
          ?></span></h2>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="input-group-append">
            <form action="" method="get" id="NT">
              <select class="btn btn-outline-secondary dropdown-toggle mr-1" name="NameTable">
                <?php 
                  require "function\ConnectDB.php";
                  $query = "SHOW TABLES FROM `mybd`";
                  $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

                  while ($row = mysqli_fetch_array($result)) { 
                    echo "<option value=\"$row[0]\">$row[0]</option>"; //вывод данных
                  }
                  mysqli_num_rows($result);
                ?>
              </select>
              <button type="submit" class="btn btn-outline-secondary mr-2" name="">Go</button>
            </form>
          </div>
          <form action="CreateTable.php">
            <div class="input-append">
              <button class="btn btn-outline-success" type="submit">Create table</button>
            </div>
          </form>
          <form action="DDLquery\DDLDropTable.php">
            <div class="input-append ml-1">
              <button class="btn btn-outline-danger" type="submit">Delete Table</button>
            </div>
          </form>
        </div>
      </div>
      <div class="table-responsive">
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
            $query = "SELECT * FROM $NameTable";
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
            if($result)
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
    </main>
  </div>
</div>
</body>
</html>