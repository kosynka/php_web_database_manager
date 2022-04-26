<?php
include('config.php');

$query = $_SESSION['query'];
$table_name = $_SESSION['table_name'];

switch ($table_name) {
    case 'Clients':
        $table_rows = ['client_name', 'iin', 'zip_address', 'bank_code', 'bank_account', 'client_type'];
        break;
    case 'Bank':
        $table_rows = ['bank_code', 'bank_name', 'bank_address'];
        break;
    case 'Contracts':
        $table_rows = ['iin', 'contract_num', 'date_of_conclusion', 'period_of_contract'];
        break;
    case 'Payment':
        $table_rows = ['iin', 'contract_num', 'payment_date', 'total'];
        break;
    case 'PersonalAccount':
        $table_rows = ['iin', 'balance_at_the_beginning_of_month', 'income_sum', 'cost_of_rendered_services', 'month', 'year'];
        break;
    case 'ServiceCategories':
        $table_rows = ['service_category_code', 'name_of_service_category', 'remark'];
        break;
    case 'ServiceContract':
        $table_rows = ['contract_num', 'service_code', 'tariff_plan_code'];
        break;
    case 'Services':
        $table_rows = ['service_code', 'name_of_service', 'service_category_code'];
        break;
    case 'TariffPlan':
        $table_rows = ['tariff_plan_code', 'price', 'tariff_validity_period'];
        break;
    case 'Traffic':
        $table_rows = ['date', 'session_start_time', 'break_time', 'iin', 'numb_of_transferred_bytes', 'numb_of_received_bytes', 'service_code'];
        break;
}

$table = odbc_exec($connection, $query);
$length = count($table_rows);

echo "<table class='table table-bordered table-striped'><thead class='thead-dark'><tr>";
for ($i = 0; $i < $length; $i++) {
    echo "<th scope='col'>$table_rows[$i]</th>";
}
echo "</tr>";
echo "</thead><tbody>";

while (odbc_fetch_row($table)) {
    for ($j = 0; $j < $length; $j++) {
        $value[$j] = odbc_result($table, $table_rows[$j]);
    }

    for ($j = 0; $j < $length; $j++) {
        echo "<th scope='row'>$value[$j]</th>";
    }
    echo "</tr>";
}

echo "</tbody></table>";

odbc_close($connection);
?>