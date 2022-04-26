<?php
include('../config.php');
session_start();

function getData(){
     $data = array();
     $data[0] = $_POST['iin'];
     $data[1] = $_POST['contract_num'];
     $data[2] = $_POST['payment_date'];
     $data[3] = $_POST['total'];
     return $data;
}

if (isset($_POST['insert'])){
     $info = getData();
     $insert = "INSERT INTO [Payment] ([iin],[contract_num],[payment_date],[total]) VALUES ('$info[0]', '$info[1]', '$info[2]', '$info[3]')";
     $result = odbc_exec($connection, $insert);
     odbc_close($connection);
}

if (isset($_POST['delete'])){
     $info = getData();
     $delete = "DELETE FROM [Payment] WHERE [iin] = '$info[0]'";
     $result = odbc_exec($connection, $delete);
     odbc_close($connection);
}

if (isset($_POST['update'])){
     $info = getData();
     $update = "UPDATE [Payment] SET [iin] = '$info[0]', [contract_num] = '$info[1]', [payment_date] = '$info[2]', [total] = '$info[3]'";
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
     <h3 class="text-center mb-3">Ввод данных в таблицу Оплата</h3>
     <div class="row">
          <div class="col-sm">
               <form method="POST">
                    <br>
                    <div class="form-group">
                         <label for="iin">ИИН:</label>
                         <input type="text" class="form-control" id="iin" name="iin">
                    </div>
                    <div class="form-group">
                         <label for="contract_num">№ Договора:</label>
                         <input type="text" class="form-control" id="contract_num" name="contract_num">
                    </div>
                    <div class="form-group">
                         <label for="payment_date">Дата завершения:</label>
                         <input type="date" class="form-control" id="payment_date" name="payment_date">
                    </div>
                    <div class="form-group">
                         <label for="total">Сумма:</label>
                         <input type="text" class="form-control" id="total" name="total">
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
               $query = "SELECT [iin],[contract_num],[payment_date],[total] FROM [Payment]";
               $table_name = 'Payment';
               
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
