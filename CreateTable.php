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
        <h1 class="h2">Create table</h1>
        <form class="col-lg-2" method="get">
          <div class="input-group">
            <input type="text" class="form-control form-control-dark" name="Column" id="Column" placeholder="Column(s)">
            <div class="input-group-append">
              <button type="submit" class="btn btn-secondary" name="">Go</button>
            </div>
          </div>
        </form>
      </div>
      <form action="\DDLquery\DDLCreateTable.php" method="get">
        <div class="ml-3 mr-3">
          <input type="text" class="form-control form-control-dark" placeholder="Table name" name="tableName">
        </div>
        <div class="card p-3 mt-3">
          <?php ;
            session_start();
            $Column = $_GET['Column'];
            $_SESSION['ColumnCreate'] = $Column;
            if($Column > 5)
            {
              $Column = 5;
            }
            for($i = 0; $i < $Column; $i++)
            {
              echo 
              "<div class=\"input-group mt-1\">
                <input type=\"text\" class=\"form-control form-control-dark\" placeholder=\"Name\" name=\"nameField$i\">
                <div class=\"input-group-append\">
                  <select class=\"btn btn-sm btn-outline-secondary dropdown-toggle mr-1\" name=\"typeField$i\">
                    <option value=\"INT\">INT</option>
                    <option value=\"VARCHAR\">VARCHAR</option>
                    <option value=\"TEXT\">TEXT</option>
                    <option value=\"DOUBLE\">DOUBLE</option>
                  </select>
                  <input type=\"text\" class=\"form-control form-control-dark\" placeholder=\"Length/Values\" name=\"sizeField$i\">
                </div>
              </div>";
            }
          ?>
          <div class="mt-1">
            <button type="submit" class="btn btn-secondary" style="width: 100%">Create</button>
          </div>
        </div>
      </form>
    </main>
  </div>
</div>
</body>
</html>