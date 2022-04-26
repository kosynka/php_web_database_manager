<?php
include('../config.php');
session_start();

function getData(){
     $data = array();
     $data[0] = $_POST['service_code'];
     $data[1] = $_POST['name_of_service'];
     $data[2] = $_POST['service_category_code'];
     return $data;
}

if (isset($_POST['insert'])){
     $info = getData();
     $insert = "INSERT INTO [Services] ([service_code],[name_of_service],[service_category_code]) VALUES ('$info[0]', '$info[1]', '$info[2]')";
     $result = odbc_exec($connection, $insert);
     odbc_close($connection);
}

if (isset($_POST['delete'])){
     $info = getData();
     $delete = "DELETE FROM [Services] WHERE [service_code] = '$info[1]'";
     $result = odbc_exec($connection, $delete);
     odbc_close($connection);
}

if (isset($_POST['update'])){
     $info = getData();
     $update = "UPDATE [Services] SET [service_code] = '$info[0]', [name_of_service] = '$info[1]', [service_category_code] = '$info[2]' WHERE [service_code] = '$info[0]'";
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
     <h3 class="text-center mb-3">Ввод данных в таблицу Услуги</h3>
     <div class="row">
          <div class="col-sm">
               <form method="POST">
                    <br>
                    <div class="form-group">
                         <label for="service_code">Код услуги:</label>
                         <input type="text" class="form-control" id="service_code" name="service_code">
                    </div>
                    <div class="form-group">
                         <label for="name_of_service">Название услуги:</label>
                         <input type="text" class="form-control" id="name_of_service" name="name_of_service">
                    </div>
                    <div class="form-group">
                         <label for="service_category_code">Код категории услуги:</label>
                         <input type="text" class="form-control" id="service_category_code" name="service_category_code">
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
               $query = "SELECT [service_code],[name_of_service],[service_category_code] FROM [Services]";
               $table_name = 'Services';
               
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
