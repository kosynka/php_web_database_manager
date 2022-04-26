<?php
include('config.php');

$query = $_SESSION['query'];
$table_name = $_SESSION['table_name'];

switch ($table_name) {
    case 'Clients':
        $table_rows = ['client_name', 'iin', 'zip_address', 'bank_code', 'bank_account', 'client_type'];
        break;
    case 'Bank':
        $table_rows = [];
        break;
    case 'Contracts':
        $table_rows = [];
        break;
    case 'Payment':
        $table_rows = [];
        break;
    case 'PersonalAccount':
        $table_rows = [];
        break;
    case 'ServiceCategories':
        $table_rows = [];
        break;
    case 'ServiceContract':
        $table_rows = [];
        break;
    case 'Services':
        $table_rows = [];
        break;
    case 'TariffPlan':
        $table_rows = [];
        break;
    case 'Traffic':
        $table_rows = [];
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