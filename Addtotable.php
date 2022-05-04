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
        <h2>Доб/удал данных<span class="badge badge-secondary">
          <?php 
            session_start();
            $NameTable = $_SESSION['NameTable'];
            echo "$NameTable";
          ?></span></h2>
      </div>
      <form class="card p-3 mt-2" action="DMLquery\DMLINSERT.php" method="get">
        <h1 class="h3" align="center">Добавление данных</h1>
        <?php
          require "function\ConnectDB.php";
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
           
          mysqli_close($link);
          for($i = 1; $i < $rows; $i++)
          {
            echo 
            "<div class=\"input-group mt-1\">
              <input type=\"text\" class=\"form-control form-control-dark\" placeholder=\"$arr[$i]\" name=\"nameField$i\">
            </div>";
          }
        ?>
        <div class="mt-1">
          <button type="submit" class="btn btn-secondary" style="width: 100%">Add</button>
        </div>
      </form>
      <form class="card p-3 mt-2" action="DMLquery\DMLDELETE.php" method="get">
        <h1 class="h3" align="center">Удаление данных</h1>
        <?php
          for($i = 0; $i < $rows; $i++)
          {
            echo 
            "<div class=\"input-group mt-1\">
              <input type=\"text\" class=\"form-control form-control-dark\" placeholder=\"$arr[$i]\" name=\"nameField$i\">
            </div>";
          }
        ?>
        <div class="mt-1">
          <button type="submit" class="btn btn-secondary" style="width: 100%">Delete</button>
        </div>
      </form>
      <form class="card p-3 mt-2" action="DDLquery\DDLALTER.php" method="get">
        <h1 class="h3" align="center">Добавление столбца</h1>
        <div class="input-group mt-1">
          <input type="text" class="form-control form-control-dark" placeholder="Name" name="nameField">
          <div class="input-group-append">
            <select class="btn btn-sm btn-outline-secondary dropdown-toggle mr-1" name="typeField">
              <option value="INT">INT</option>
              <option value="VARCHAR">VARCHAR</option>
              <option value="TEXT">TEXT</option>
              <option value="DOUBLE">DOUBLE</option>
            </select>
            <input type="text" class="form-control form-control-dark" placeholder="Length/Values" name="sizeField">
          </div>
        </div>
        <div class="mt-1">
          <button type="submit" class="btn btn-secondary" style="width: 100%">Add</button>
        </div>
      </form>
    </main>
  </div>
</div>
</body>
</html>