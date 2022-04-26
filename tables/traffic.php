<?php
include('../config.php');
session_start();

function getData(){
     $data = array();
     $data[0] = $_POST['date'];
     $data[1] = $_POST['session_start_time'];
     $data[2] = $_POST['break_time'];
     $data[3] = $_POST['iin'];
     $data[4] = $_POST['numb_of_transferred_bytes'];
     $data[5] = $_POST['numb_of_received_bytes'];
     $data[6] = $_POST['service_code'];
     return $data;
}

if (isset($_POST['insert'])){
     $info = getData();
     $insert = "INSERT INTO [Traffic] ([date]
     ,[session_start_time]
     ,[break_time]
     ,[iin]
     ,[numb_of_transferred_bytes]
     ,[numb_of_received_bytes]
     ,[service_code]) VALUES ('$info[0]', '$info[1]', '$info[2]', '$info[3]', '$info[4]', '$info[5]', '$info[6]')";
     $result = odbc_exec($connection, $insert);
     odbc_close($connection);
}

if (isset($_POST['delete'])){
     $info = getData();
     $delete = "DELETE FROM [Traffic] WHERE [date] = '$info[0]' AND [iin] = '$info[3]' AND [service_code] = '$info[6]'";
     $result = odbc_exec($connection, $delete);
     odbc_close($connection);
}

if (isset($_POST['update'])){
     $info = getData();
     $update = "UPDATE [Traffic] SET [date] = '$info[0]', [session_start_time] = '$info[1]', [break_time] = '$info[2]', [iin] = '$info[3]', [numb_of_transferred_bytes] = '$info[4]', [numb_of_received_bytes] = '$info[5]', [service_code] = '$info[6]' WHERE [date] = '$info[0]' AND [iin] = '$info[3]' AND [service_code] = '$info[6]'";
     $result = odbc_exec($connection, $update);
     odbc_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>DB web-manager</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php include('../header.php'); ?>

<div class="container">
     <br>
     <h3 class="text-center mb-3">Ввод данных в таблицу Траффик</h3>
     <div class="row">
          <div class="col-sm">
               <form method="POST">
                    <br>
                    <div class="form-group">
                         <label for="date">Дата:</label>
                         <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="form-group">
                         <label for="session_start_time">Начало сессии:</label>
                         <input type="datetime-local" step='1' class="form-control" id="session_start_time" name="session_start_time">
                    </div>
                    <div class="form-group">
                         <label for="break_time">Конец:</label>
                         <input type="datetime-local" step='1' class="form-control" id="break_time" name="break_time">
                    </div>
                    <div class="form-group">
                         <label for="iin">ИИН:</label>
                         <input type="text" class="form-control" id="iin" name="iin">
                    </div>
                    <div class="form-group">
                         <label for="numb_of_transferred_bytes">Количество переданных байт:</label>
                         <input type="text" class="form-control" id="numb_of_transferred_bytes" name="numb_of_transferred_bytes">
                    </div>
                    <div class="form-group">
                         <label for="numb_of_received_bytes">Количество полученных байт:</label>
                         <input type="text" class="form-control" id="numb_of_received_bytes" name="numb_of_received_bytes">
                    </div>
                    <div class="form-group">
                         <label for="service_code">Код услуги:</label>
                         <input type="text" class="form-control" id="service_code" name="service_code">
                    </div>
                    <div class="btn-group">
                         <button type="submit" class="btn btn-success btn-lg btn-outline-light" name="insert">Добавить</button>
                         <button type="submit" class="btn btn-primary btn-lg btn-outline-light" name="update">Изменить</button>
                         <button type="submit" class="btn btn-danger btn-lg btn-outline-light" name="delete">Удалить</button>
                    </div>
               </form>
          </div>

          <div class="col-sm">
               <br>
               <?php
               $query = "SELECT [date]
               ,[session_start_time]
               ,[break_time]
               ,[iin]
               ,[numb_of_transferred_bytes]
               ,[numb_of_received_bytes]
               ,[service_code] FROM [Traffic]";
               $table_name = 'Traffic';
               
               $_SESSION['query'] = $query;
               $_SESSION['table_name'] = $table_name;
               
               include('../output_table.php');
               ?>
          </div>
     </div>
</div>

<?php include('../footer.php'); ?>

</body>
</html>
