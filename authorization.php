<?php
function getData(){
    $data['login'] = $_POST['login'];
    $data['password'] = $_POST['password'];
    return $data;
}

if (isset($_POST['insert'])) {
    $info = getData();
    set_error_handler(function($errno, $errstr, $errfile, $errline ) {
        throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
    });
    try {
        odbc_connect("Sayat", $info['login'], $info['password']);
        header("Location: input_values.php");
    }
    catch (Exception $e) {
        echo "<script>alert('Логин или пароль неправильный')</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>DB web-manager</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Database Web-manager</h1>
    <p>Калдарбеков Саят - Биллинговая система</p>
</div>

<div class="container">
    <div class="row justify-content-center">

        <h1></h1>
        <h1></h1>
        <h1></h1>

        <form class="w-50 h-auto" method="POST">
            <div class="form-outline mb-4">
                <label class="form-label" for="login">Логин</label>
                <input type="login" id="login" name="login" class="form-control" placeholder="Sayat" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="password">Пароль</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="sayat23" />
            </div>

            <div class="row mb-4">
                <div class="col">
                <a href="#!">Забыли пароль?</a>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4" name="insert">Войти</button>
        </form>
    </div>
</div>

</body>
</html>
