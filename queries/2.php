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
               <h2>Перечень категорий услуг по которым заключены договора в «I-ом» месяце</h2>
          </div>

          <div class="col-sm">
               <br>
               <?php
               $query = "SELECT    ServiceCategories.name_of_service_category AS 'Название категории услуг',
                                   Contracts.date_of_conclusion AS 'Дата заключения'
                         FROM      ServiceCategories, Contracts, [Services]
                         WHERE	ServiceCategories.service_category_code = [Services].service_category_code
                                   AND Contracts.date_of_conclusion like '%-10-%'";

               $_SESSION['query'] = $query;
               $_SESSION['names'] = 'Название категории услуг,Дата заключения';
               $_SESSION['rows_len'] = 2;
               
               include('output.php');
               ?>
          </div>
     </div>
</div>

<?php include('../footer.php'); ?>

</body>
</html>
