<?php
include('../config.php');
session_start();

function getData(){
     $data = array();
     $data[0] = $_POST['tariff_plan_code'];
     $data[1] = $_POST['price'];
     $data[2] = $_POST['tariff_validity_period'];
     return $data;
}

if (isset($_POST['insert'])){
     $info = getData();
     $insert = "INSERT INTO [TariffPlan] ([tariff_plan_code], [price], [tariff_validity_period]) VALUES ('$info[0]', '$info[1]', '$info[2]')";
     $result = odbc_exec($connection, $insert);
     odbc_close($connection);
}

if (isset($_POST['delete'])){
     $info = getData();
     $delete = "DELETE FROM [TariffPlan] WHERE [tariff_plan_code] = '$info[0]'";
     $result = odbc_exec($connection, $delete);
     odbc_close($connection);
}

if (isset($_POST['update'])){
     $info = getData();
     $update = "UPDATE [TariffPlan] SET [tariff_plan_code] = '$info[0]', [price] = '$info[1]', [tariff_validity_period] = '$info[2]' WHERE [tariff_plan_code] = '$info[0]'";
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
     <h3 class="text-center mb-3">Ввод данных в таблицу Тарифный план</h3>
     <div class="row">
          <div class="col-sm">
               <form method="POST">
                    <br>
                    <div class="form-group">
                         <label for="tariff_plan_code">Код тарифного плана:</label>
                         <input type="text" class="form-control" id="tariff_plan_code" name="tariff_plan_code">
                    </div>
                    <div class="form-group">
                         <label for="price">Цена:</label>
                         <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="form-group">
                         <label for="tariff_validity_period">Срок действия тарифа:</label>
                         <input type="text" class="form-control" id="tariff_validity_period" name="tariff_validity_period">
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
               $query = "SELECT [tariff_plan_code],[price],[tariff_validity_period] FROM [TariffPlan]";
               $table_name = 'TariffPlan';
               
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
