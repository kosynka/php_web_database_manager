<?php
$query = "SELECT [client_name],[iin],[zip_address],[bank_code],[bank_account],[client_type] FROM [Clients]";
$table_rows = ['client_name', 'iin', 'zip_address', 'bank_code', 'bank_account', 'client_type'];

$table = odbc_exec($connection, $query);

echo "<table class='table table-bordered table-striped'><thead class='thead-dark'><tr>";
for ($i = 0; $i < count($table_rows); $i++) {
    echo "<th scope='col'>$table_rows[$i]</th>";
}
echo "</tr>";
echo "</thead><tbody>";

while (odbc_fetch_row($table)) {
    for ($j = 0; $j < count($table_rows); $j++) {
        $value[$j] = odbc_result($table, $table_rows[$j]);
    }

    for ($j = 0; $j < count($table_rows); $j++) {
        echo "<th scope='row'>$value[$j]</th>";
    }
    echo "</tr>";
}

echo "</tbody></table>";

odbc_close($connection);
?>