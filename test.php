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

<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>Database Web-manager</h1>
  <p>Kaldarbekov Sayat - Billing system</p>
</div>
  
<div class="container">
<div class="row">
     <form method="POST">
          <h3>Ввод данных в таблицу Клиенты</h3>
          <div class="form-group">
               <label for="client name">Name:</label>
               <input type="text" class="form-control" id="client_name" name="client_name">
          </div>
          <div class="form-group">
               <label for="iin">IIN:</label>
               <input type="text" class="form-control" id="iin" name="iin">
          </div>
          <div class="form-group">
               <label for="zip address">Zip address:</label>
               <input type="text" class="form-control" id="zip_address" name="zip_address">
          </div>
          <div class="form-group">
               <label for="bank code">Bank code:</label>
               <select class="form-control" id="bank_code" name="bank_code">
                    <option value="CASPKZKA">Kaspi Bank</option>
                    <option value="HSBKKZKX">Halyk Bank</option>
                    <option value="IRTYKZKA">ForteBank</option>
                    <option value="SABRRUMM">Sberbank</option>
                    <option value="TSESKZKA">First Heartland Jysan Bank</option>
               </select>
          </div>
          <div class="form-group">
               <label for="bank account">Bank account:</label>
               <input type="text" class="form-control" id="bank_account" name="bank_account">
          </div>
          <div class="form-group">
               <label for="client type">Client type:</label>
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
</div>

<h1></h1>

<footer class="page-footer font-small text-white p-5 bg-primary">
     <div class="container-fluid text-center text-md-left">
          <div class="row">
               <div class="col-md-6 mt-md-0 mt-3">
                    <h5 class="text-uppercase">Footer Content</h5>
                    <p>Here you can use rows and columns to organize your footer content.</p>
               </div>
               <hr class="clearfix w-100 d-md-none pb-3">
               <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled">
                         <li class="list-group-item list-group-item-action"><a href="#!">Link 1</a></li>
                         <li class="list-group-item list-group-item-action"><a href="#!">Link 2</a></li>
                         <li class="list-group-item list-group-item-action"><a href="#!">Link 3</a></li>
                         <li class="list-group-item list-group-item-action"><a href="#!">Link 4</a></li>
                    </ul>
               </div>
               <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled">
                         <li class="list-group-item list-group-item-action"><a href="#!">Link 1</a></li>
                         <li class="list-group-item list-group-item-action"><a href="#!">Link 2</a></li>
                         <li class="list-group-item list-group-item-action"><a href="#!">Link 3</a></li>
                         <li class="list-group-item list-group-item-action"><a href="#!">Link 4</a></li>
                    </ul>
               </div>
          </div>
     </div>
     <div class="footer-copyright text-center py-3">© 2022 Copyright:
          <a href=""> @kosynka</a>
     </div>
</footer>

</body>
</html>
