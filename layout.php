<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Books</title>
</head>
<body>
<?php
session_start();

?>
<nav class="nav">
    <a class="nav-link" href="http://localhost/6lab/classics_add.php">Главная</a>
    <?php if (empty($_SESSION['auth'])) {
        echo "<a class='nav-link' href='http://localhost/6lab/login.php'>Вход</a>";
    }
    else{
        echo  "<a class='nav-link' href='http://localhost/6lab/logout.php'>Выход(" . $_SESSION['login'] . ")</a>";
    }
    ?>
</nav>
<style>
    .nav{
        margin-bottom: 30px;
    }
    .form{
        max-width: 360px;
    }
    body{
        padding-left: 30px;
        padding-top: 20px;
    }
</style>
