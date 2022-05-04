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
        <h2>Triggers<span class="badge badge-secondary">
          <?php 
            session_start();
            $NameTable = $_SESSION['NameTable'];
            $_SESSION['NameTable'] = $NameTable;
            echo "$NameTable";
          ?></span></h2>
      </div>
      <form class="card p-3 mt-4" action="Triggers\TriggersInsert.php" method="get">
        <h1 class="h3" align="center">Добавление<span class="badge badge-secondary">
          <?php 
            session_start();
            $ADDON = $_SESSION['ADDON'];
            if ($ADDON  == 'ADD')
            {
              echo "Включено";
            }
            else
            {
              echo "Выключено";
            }
          ?></span></h1>
        <div class="input-group-appendn ml-3">
          <button type="submit" class="btn btn-outline-success" name="ADDON" value="ADD" style="width: 49%; h">Включить</button>
          <button type="submit" class="btn btn-outline-danger" name="ADDOFF" value="NOADD" style="width: 49%">Выключить</button>
        </div>
      </form>
      <form class="card p-3 mt-4" action="Triggers\TriggersUpdate.php" method="get">
        <h1 class="h3" align="center">Изменение<span class="badge badge-secondary">
          <?php 
            session_start();
            $UPDON = $_SESSION['UPDON'];
            if ($UPDON  == 'UPD')
            {
              echo "Включено";
            }
            else
            {
              echo "Выключено";
            }
          ?></span></h1>
        <div class="input-group-appendn ml-3">
          <button type="submit" class="btn btn-outline-success" name="UPDON" value="UPD" style="width: 49%">Включить</button>
          <button type="submit" class="btn btn-outline-danger" name="UPDOFF" value="NOUPD" style="width: 49%">Выключить</button> 
        </div>
      </form>
      <form class="card p-3 mt-4" action="Triggers\TriggersDelete.php">
        <h1 class="h3" align="center">Удаление<span class="badge badge-secondary" method="get">
          <?php 
            session_start();
            $DELON = $_SESSION['DELON'];
            if ($DELON  == 'DEL')
            {
              echo "Включено";
            }
            else
            {
              echo "Выключено";
            }
          ?></span></h1>
        <div class="input-group-appendn ml-3">
          <button type="submit" class="btn btn-outline-success" name="DELON" value="DEL" style="width: 49%">Включить</button>
          <button type="submit" class="btn btn-outline-danger" name="DELEOFF" value="NODEL" style="width: 49%">Выключить</button>
        </div>
      </form>
    </main>
  </div>
</div>
</body>
</html>

