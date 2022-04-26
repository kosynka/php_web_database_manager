<?php
include('../config.php');

$query = $_SESSION['query'];
$rows_len = $_SESSION['rows_len'];
$names = $_SESSION['names'];
$row_name = explode(",", $names);

$table = odbc_exec($connection, $query);

echo "<table class='table table-bordered table-striped'><thead class='thead-dark'><tr>";
for ($i = 0; $i < $rows_len; $i++) {
    echo "<th scope='col'>$row_name[$i]</th>";
}
echo "</tr>";
echo "</thead><tbody>";

while (odbc_fetch_row($table)) {
    for ($j = 0; $j < $rows_len; $j++) {
        $value[$j] = odbc_result($table, $row_name[$j]);
    }

    for ($j = 0; $j < $rows_len; $j++) {
        echo "<th scope='row'>$value[$j]</th>";
    }
    echo "</tr>";
}

echo "</tbody></table>";

odbc_close($connection);
?>