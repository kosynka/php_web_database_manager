<?php
include('../config.php');
session_start();
// function getData(){ // AJAX ERROR
//      $data = array();
//      $data[0] = $_POST['service_code'];
//      return $data;
// }

// if (isset($_POST['search'])){
//      search();
// }
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
     <div class="row">
          <div class="col-sm">
               <br>
               <h2>Из таблицы Договора_услуги выбрать строки по условию: выбрать договора, по которым оказывается «I-я» услуга(* код услуги задавать как параметр)</h2>
               <br>
               <div class="form-group">
                    <label for="service_code">Код услуги:</label>
                    <input type="text" class="form-control" id="service_code" name="service_code">
               </div>
               <form action="" method="post">
               <div class="btn-group">
                    <button type="submit" class="btn btn-success btn-lg btn-outline-light" name="search">Искать</button>
               </div>
               </form>
          </div>

          <div class="col-sm">
               <br>
               <?php
               include('../config.php');

               function search() {
                    $info = getData();
                    $_SESSION['query'] = "SELECT contract_num AS 'Код услуги' FROM ServiceContract
                    Where service_code = '$info[0]'";
                    $_SESSION['names'] = 'Код услуги';
                    $_SESSION['rows_len'] = 1;
                    include('output.php');
                    exit;
               }
               $_SESSION['query'] = "SELECT contract_num AS 'Код услуги' FROM ServiceContract
               Where service_code = '100001'";
               $_SESSION['names'] = 'Код услуги';
               $_SESSION['rows_len'] = 1;
               include('output.php');
               ?>
          </div>
     </div>
</div>

<?php include('../footer.php'); ?>

</body>
</html>
