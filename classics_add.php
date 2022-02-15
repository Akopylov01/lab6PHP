<?php
include 'layout.php';
require_once 'dbconnect.php';
if (empty($_SESSION['auth'])) {
    header("Location: http://localhost/6lab/login.php");
    exit( );
}
if (!empty($_POST['submit']) && $_POST['submit'] == 'ADD') {
    // Очищаем пришедшие данные от HTML и PHP тегов
    $author = strip_tags($_POST['author']);
    $title = strip_tags($_POST['title']);
    $type = strip_tags($_POST['type']);
    $year = strip_tags($_POST['year']);
    $query = "INSERT INTO classics (author, title, type, year) VALUES ('$author', '$title', '$type', '$year')";
    $res = mysqli_query($mysqli, $query);
    if (!$res) die (mysqli_error($mysqli));
    // Если количество затронутых запростом записей равно 1 (одна запись добавлена)
    // то выводим сообщение
    if (mysqli_affected_rows($mysqli) == 1) {
        echo "<h2>Запись добавлена</h2>";
    }
}
?>
<h5>Добавить книгу</h5>
<form action="" method="post" class="form">
    <div class="mb-3">
        <label class="form-label">Author</label>
        <input type="text" name="author" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Category</label>
        <input type="text" name="type" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Year</label>
        <input type="text" name="year" class="form-control" required>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" name="submit" value="ADD">
</form>

<?php
$query = "SELECT * FROM classics";
$res = mysqli_query($mysqli, $query);
if (!$res) die (mysqli_error($mysqli));
while ($row = mysqli_fetch_assoc($res)) {
    ?>
    <p>
    <h5><?= $row['title']; ?></h5>
    <?= $row['author']; ?><br>
    Category: <?= $row['type']; ?><br>
    Year: <?= $row['year']; ?><br>
    <a href="http://localhost/6lab/classics_detail.php?id=<?=$row['id'];?>">Подробнее</a>
    </p>
    <?php
}
?>
</body>
