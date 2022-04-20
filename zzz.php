<html>
<head>
    <Title>Employee Database</Title>
</head>
<body>
<form method="post" action="?action=add" enctype="multipart/form-data">
    Last name <input type="text" name="LastName" id="LastName"/></br>
    First name <input type="text" name="FirstName" id="FirstNamne"/></br>
    E-mail address <input type="text" name="Email" id="Email"/></br>
    User Id <input type="text" name="UserId" id="UserId"/></br>
    Password <input type="password" name="Password" id="Password"/></br>
    <input type="submit" name="submit" value="Submit"/>
</form>

<?php
$serverName = "DESKTOP-1VT4LUH";
$connectionOptions = array("Database" => "Billing_system");
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>

</body>
</html>