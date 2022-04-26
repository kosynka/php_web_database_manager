<?php
include('../config.php');
session_start();

function getData(){
     $data = array();
     $data[0] = $_POST['bank_code'];
     $data[1] = $_POST['bank_name'];
     $data[2] = $_POST['bank_address'];
     return $data;
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
     <div class="row">
          <div class="col-sm">
               <br>
               <h2>Остаток денежных средств на лицевом счету каждого из клиентов</h2>
          </div>

          <div class="col-sm">
               <br>
               <?php
               $query = "SELECT	Clients.client_name AS 'Имя клиента',
                                   PersonalAccount.iin AS 'ИИН',
                                   balance_at_the_beginning_of_month AS 'Остаток денежных средств'
                         FROM Clients, PersonalAccount
                         WHERE Clients.iin = PersonalAccount.iin";

               $_SESSION['query'] = $query;
               $_SESSION['names'] = 'Имя клиента,ИИН,Остаток денежных средств';
               $_SESSION['rows_len'] = 3;
               
               include('output.php');
               ?>
          </div>
     </div>
</div>

<?php include('../footer.php'); ?>

</body>
</html>
