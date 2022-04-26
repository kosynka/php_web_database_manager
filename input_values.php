<?php
include('config.php');

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
     $insert = "INSERT INTO [Clients] ([client_name], [iin], [zip_address], [bank_code], [bank_account], [client_type]) VALUES ('$info[0]', '$info[1]', '$info[2]', '$info[3]', '$info[4]', '$info[5]')";
     $result = odbc_exec($connection, $insert);
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

<?php include('header.php'); ?>

<div class="container">
     <br>
     <h3 class="text-center">Ввод данных в таблицу Клиенты</h3>
     <div class="row">
          <div class="col-sm">
               <form method="POST">
                    <br>
                    <div class="form-group">
                         <label for="client name">Имя:</label>
                         <input type="text" class="form-control" id="client_name" name="client_name">
                    </div>
                    <div class="form-group">
                         <label for="iin">ИИН:</label>
                         <input type="text" class="form-control" id="iin" name="iin">
                    </div>
                    <div class="form-group">
                         <label for="zip address">Адрес:</label>
                         <input type="text" class="form-control" id="zip_address" name="zip_address">
                    </div>
                    <div class="form-group">
                         <label for="bank code">Банк:</label>
                         <select class="form-control" id="bank_code" name="bank_code">
                              <option value="CASPKZKA">Kaspi Bank</option>
                              <option value="HSBKKZKX">Halyk Bank</option>
                              <option value="IRTYKZKA">ForteBank</option>
                              <option value="SABRRUMM">Sberbank</option>
                              <option value="TSESKZKA">First Heartland Jysan Bank</option>
                         </select>
                    </div>
                    <div class="form-group">
                         <label for="bank account">Банковский счет:</label>
                         <input type="text" class="form-control" id="bank_account" name="bank_account">
                    </div>
                    <div class="form-group">
                         <label for="client type">Тип клиента:</label>
                         <select class="form-control" id="client_type" name="client_type">
                              <option value="0">Юр. лицо</option>
                              <option value="1">Физ. лицо</option>
                         </select>
                    </div>
                    <div class="btn-group">
                         <button type="submit" class="btn btn-primary" name="insert">Ввести данные</button>
                    </div>
               </form>
          </div>

          <div class="col-sm">
               <br>
               <?php
                    include('output_table.php');
               ?>
          </div>
     </div>
</div>

<?php include('footer.php'); ?>

</body>
</html>
