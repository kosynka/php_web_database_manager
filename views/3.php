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
               <h2>Финансовый отчет об оплате услуг на текущую дату</h2>
          </div>

          <div class="col-sm">
               <br>
               <?php
               $_SESSION['query'] = "SELECT	Services.name_of_service AS 'Услуга',
                    SUM(Payment.total) AS 'Сумма оплаты за весь период'
               FROM Payment, ServiceContract, [Services]
               WHERE	Payment.contract_num = ServiceContract.contract_num AND
                    ServiceContract.service_code = Services.service_code
               GROUP BY Services.name_of_service";
               $_SESSION['names'] = 'Услуга,Сумма оплаты за весь период';
               $_SESSION['rows_len'] = 2;
               include('output.php');
               ?>
          </div>
     </div>
</div>

<?php include('../footer.php'); ?>

</body>
</html>
