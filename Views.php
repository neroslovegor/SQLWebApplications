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
        <h2>Views<span class="badge badge-secondary">
          <?php 
            session_start();
            $NameTable = $_SESSION['NameTable'];
            $_SESSION['NameTable'] = $NameTable;
            echo "$NameTable";
          ?></span></h2>
      </div>
      <form class="card p-3" action="Views\View1.php">
        <button type="submit" class="btn btn-warning" name="">View 1</button>
        <h align="center" class="mt-3">CREATE VIEW view_1 AS SELECT * FROM <?php echo "$NameTable"; ?></h>
      </form>
      <form class="card p-3 mt-3" action="Views\View2.php">
        <button type="submit" class="btn btn-warning mr-2" name="">View 2</button> 
        <h align="center" class="mt-3">CREATE VIEW view_2 AS SELECT (field_list) FROM <?php echo "$NameTable"; ?></h>
      </form>
      <form class="card p-3 mt-3" action="Views\View3.php">
        <button type="submit" class="btn btn-warning mr-2" name="">View 3</button>
        <h align="center" class="mt-3">CREATE VIEW view_2 AS SELECT (field_list) FROM <?php echo "$NameTable"; ?></h>
        <?php ;
            require "function\ConnectDB.php";
            $query = "SHOW COLUMNS FROM $NameTable";
            $result = mysqli_query($link, $query);
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
            for($i = 0; $i < $rows; $i++)
            {
              echo 
              "<div class=\"custom-control custom-checkbox\">
                <input type=\"checkbox\" class=\"custom-control-input\" name=\"customCheck$i\" id=\"customCheck$i\" value=\"$arr[$i]\">
                <label class=\"custom-control-label\" for=\"customCheck$i\">$arr[$i]</label>
              </div>";
            }
          ?>
      </form>
      </main>
    </div>
  </div>
</body>
</html>