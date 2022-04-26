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
     <h3 class="text-center mb-3">Вычислить длительность сеанса связи для «I-го»  клиента из таблицы Движение</h3>
     <div class="row">
          <div class="col-sm">
               <br>
               <?php
               $_SESSION['query'] = "SELECT iin AS 'ИИН',
                         SUM(DATEDIFF(SS, session_start_time, break_time)) AS 'длительность сеанса связи в секундах'
                         FROM Traffic
                         GROUP BY iin";

               $_SESSION['names'] = 'ИИН,длительность сеанса связи в секундах';
               $_SESSION['rows_len'] = 2;
               include('output.php');
               ?>
          </div>
     </div>
</div>

<?php include('../footer.php'); ?>

</body>
</html>
