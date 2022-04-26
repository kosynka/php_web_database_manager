<?php
include('../config.php');
session_start();

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
               <h2>Из таблицы Движение выбрать строки по условию: количество переданных байт>количества полученных</h2>
          </div>

          <div class="col-sm">
               <br>
               <?php
               $_SESSION['query'] = "SELECT FORMAT(numb_of_received_bytes, 'N0', 'en-us') AS 'количество полученных байт', FORMAT(numb_of_transferred_bytes , 'N0', 'en-us') AS 'количество переданных байт' FROM Traffic
               WHERE numb_of_transferred_bytes > numb_of_received_bytes";
               $_SESSION['names'] = 'количество полученных байт,количество переданных байт';
               $_SESSION['rows_len'] = 2;
               include('output.php');
               ?>
          </div>
     </div>
</div>

<?php include('../footer.php'); ?>

</body>
</html>
