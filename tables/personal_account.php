<?php
include('../config.php');
session_start();

function getData(){
     $data = array();
     $data[0] = $_POST['client_name'];
     $data[1] = $_POST['iin'];
     $data[2] = $_POST['zip_address'];
     $data[3] = $_POST['bank_code'];
     $data[4] = $_POST['bank_account'];
     $data[5] = $_POST['client_type'];
     return $data;
}

if (isset($_POST['insert'])){
     $info = getData();
     $insert = "INSERT INTO [PersonalAccount] ([iin],[balance_at_the_beginning_of_month],[income_sum],[cost_of_rendered_services],[month],[year]) VALUES ('$info[0]', '$info[1]', '$info[2]', '$info[3]', '$info[4]', '$info[5]')";
     $result = odbc_exec($connection, $insert);
     odbc_close($connection);
}

if (isset($_POST['delete'])){
     $info = getData();
     $delete = "DELETE FROM [PersonalAccount] WHERE [iin] = '$info[1]'";
     $result = odbc_exec($connection, $delete);
     odbc_close($connection);
}

if (isset($_POST['update'])){
     $info = getData();
     $update = "UPDATE [PersonalAccount] SET [client_name] = '$info[0]', [iin] = '$info[1]', [zip_address] = '$info[2]', [bank_code] = '$info[3]', [bank_account] = '$info[4]', [client_type] = '$info[5]' WHERE [iin] = '$info[1]'";
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
     <h3 class="text-center mb-3">Ввод данных в таблицу Личный счет</h3>
     <div class="row">
          <div class="col-sm">
               <form method="POST">
                    <br>
                    <div class="form-group">
                         <label for="iin">ИИН:</label>
                         <input type="text" class="form-control" id="iin" name="iin">
                    </div>
                    <div class="form-group">
                         <label for="balance_at_the_beginning_of_month">Остаток на начало месяца:</label>
                         <input type="text" class="form-control" id="balance_at_the_beginning_of_month" name="balance_at_the_beginning_of_month">
                    </div>
                    <div class="form-group">
                         <label for="income_sum">Адрес:</label>
                         <input type="text" class="form-control" id="income_sum" name="income_sum">
                    </div>
                    <div class="form-group">
                         <label for="cost_of_rendered_services">Банковский счет:</label>
                         <input type="text" class="form-control" id="cost_of_rendered_services" name="cost_of_rendered_services">
                    </div>
                    <div class="form-group">
                         <label for="month">месяц:</label>
                         <input type="text" class="form-control" id="month" name="month">
                    </div>
                    <div class="form-group">
                         <label for="year">Год:</label>
                         <input type="text" class="form-control" id="year" name="year">
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
               $query = "SELECT [iin],[balance_at_the_beginning_of_month],[income_sum],[cost_of_rendered_services],[month],[year] FROM [PersonalAccount]";
               $table_name = 'PersonalAccount';
               
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
