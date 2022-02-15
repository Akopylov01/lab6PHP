<?php
include 'layout.php';
require_once 'dbconnect.php';

if (!empty($_POST['password']) and !empty($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE login=$login AND password=$password";
    $res= mysqli_query($mysqli, $query);
    $user = mysqli_fetch_assoc($res);
    if (!empty($user)) {
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $login;
        header("Location: http://localhost/6lab/classics_add.php");
        exit( );

    } else {
        echo "<h3>Неправильный логин или пароль</h3>";
    }
}

?>
<form action="" method="post" class="form">
    <div class="mb-3">
        <label class="form-label">Логин</label>
        <input type="text" name="login" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" name="submit" value="login">
</form>
