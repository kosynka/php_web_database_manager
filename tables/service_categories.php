<?php
include('../config.php');
session_start();

function getData(){
     $data = array();
     $data[0] = $_POST['service_category_code'];
     $data[1] = $_POST['name_of_service_category'];
     $data[2] = $_POST['remark'];
     return $data;
}

if (isset($_POST['insert'])){
     $info = getData();
     $insert = "INSERT INTO [ServiceCategories] ([service_category_code],[name_of_service_category],[remark]) VALUES ('$info[0]', '$info[1]', '$info[2]')";
     $result = odbc_exec($connection, $insert);
     odbc_close($connection);
}

if (isset($_POST['delete'])){
     $info = getData();
     $delete = "DELETE FROM [ServiceCategories] WHERE [service_category_code] = '$info[0]'";
     $result = odbc_exec($connection, $delete);
     odbc_close($connection);
}

if (isset($_POST['update'])){
     $info = getData();
     $update = "UPDATE [ServiceCategories] SET [service_category_code] = '$info[0]', [name_of_service_category] = '$info[1]', [remark] = '$info[2]'";
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
     <h3 class="text-center mb-3">Ввод данных в таблицу Категории услуг</h3>
     <div class="row">
          <div class="col-sm">
               <form method="POST">
                    <br>
                    <div class="form-group">
                         <label for="service_category_code">Код категории сервиса:</label>
                         <input type="text" class="form-control" id="service_category_code" name="service_category_code">
                    </div>
                    <div class="form-group">
                         <label for="name_of_service_category">Название категории сервиса:</label>
                         <input type="text" class="form-control" id="name_of_service_category" name="name_of_service_category">
                    </div>
                    <div class="form-group">
                         <label for="remark">Ремарка:</label>
                         <input type="text" class="form-control" id="remark" name="remark">
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
               $query = "SELECT [service_category_code],[name_of_service_category],[remark] FROM [ServiceCategories]";
               $table_name = 'ServiceCategories';
               
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
