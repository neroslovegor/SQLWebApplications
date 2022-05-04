<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Лабораторная работа №4</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        input {
        margin-top: 3%;
        width: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 align="center">Лабораторная работа №4</h1>  
        <div class="row">
            <div class="col">
                <h5 align="center">DDL</h5>
                <form action="/DDLquery/DDLquery1.php" method="get">
                    <button type="submit" name="ЗапросDDL1" class="btn btn-success">Запрос 1</button>
                    <h>CREATE - создание новой таблицы</h>
                </form>
                <form action="/DDLquery/DDLquery2.php" method="get">
                    <button type="submit" name="ЗапросDDL2" class="btn btn-success">Запрос 2</button>
                    <h>ALTER - добавить поле</h>
                    <input type="text" class="form-control" name="FieldName" id="FieldName" placeholder="Имя поля">
                    <input type="number" class="form-control" name="FieldSize" id="FieldSize" placeholder="Размер поля">
                </form>
                <form action="/DDLquery/DDLquery3.php" method="post">
                    <button type="submit" name="ЗапросDDL3" class="btn btn-success">Запрос 3</button>
                    <h>DROP - удаление таблицы</h>
                </form>
            </div>
            <div class="col">
                    <h5 align="center">DML</h5>
                <form action="/DMLquery/DMLquery1.php" method="post">
                    <button type="submit" name="ЗапросDML1" class="btn btn-success">Запрос 1</button>
                    <h>SELECT – выборка данных</h>
                </form>
                <form action="/DMLquery/DMLquery2.php" method="get">
                    <button type="submit" name="ЗапросDML2" class="btn btn-success">Запрос 2</button>
                    <h>INSERT – вставка новых данных</h>
                    <input type="text" class="form-control" name="Name" id="Name" placeholder="Имя">
                    <input type="text" class="form-control" name="Surname" id="Surname" placeholder="Фамилия">
                    <input type="text" class="form-control" name="GroupNumber" id="GroupNumber" placeholder="Номер группы">
                </form>
                <form action="/DMLquery/DMLquery3.php" method="get">
                    <button type="submit" name="ЗапросDML3" class="btn btn-success">Запрос 3</button>
                    <h>UPDATE – обновление данных</h>
                    <input type="text" class="form-control" name="ID" id="ID" placeholder="ID">
                    <input type="text" class="form-control" name="Name" id="Name" placeholder="Имя">
                    <input type="text" class="form-control" name="Surname" id="Surname" placeholder="Фамилия">
                    <input type="text" class="form-control" name="GroupNumber" id="GroupNumber" placeholder="Номер группы">
                </form>
                <form action="/DMLquery/DMLquery4.php" method="get">
                    <button type="submit" name="ЗапросDML4" class="btn btn-success">Запрос 4</button>
                    <h>DELETE – удаление данных</h>
                    <input type="text" class="form-control" name="ID" id="ID" placeholder="ID">
                    <input type="text" class="form-control" name="Name" id="Name" placeholder="Имя">
                    <input type="text" class="form-control" name="Surname" id="Surname" placeholder="Фамилия">
                    <input type="text" class="form-control" name="GroupNumber" id="GroupNumber" placeholder="Номер группы">
                </form><br>
            </div>
        </div>
    </div>
</body>
</html>