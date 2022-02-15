<?php
include 'layout.php';
require_once 'dbconnect.php';
if (empty($_SESSION['auth'])) {
    header("Location: http://localhost/6lab/login.php");
    exit( );
}
$id = $_GET['id'];
if (!empty($_GET['del']) && !empty((int)$_GET['id'])) {
    $id = (int)$_GET['id'];
    $query = "DELETE FROM classics WHERE id=$id";
    $res = mysqli_query($mysqli, $query);

    if (!$res) die (mysqli_error($mysqli));
    // Если количество затронутых запростом записей равно 1 (одна запись удалена)
    // то выводим сообщение
    if (mysqli_affected_rows($mysqli) == 1) {
        echo "<h2>Запись с id = $id удалена</h2>";
        header("Location: http://localhost/6lab/classics_add.php");
        exit( );
    }
}

if (!empty($_POST['submit']) && $_POST['submit'] == 'UPD') {
    // Очищаем пришедшие данные от HTML и PHP тегов
    $author = strip_tags($_POST['author']);
    $title = strip_tags($_POST['title']);
    $type = strip_tags($_POST['type']);
    $year = strip_tags($_POST['year']);
    $query = "UPDATE classics SET author = '$author', title = '$title', type ='$type', year = '$year' WHERE id = $id";
    $res = mysqli_query($mysqli, $query);
    if (!$res) die (mysqli_error($mysqli));
    // Если количество затронутых запростом записей равно 1 (одна запись добавлена)
    // то выводим сообщение
    if (mysqli_affected_rows($mysqli) == 1) {
        echo "<h2>Запись изменена</h2>";
        header("Location: http://localhost/6lab/classics_add.php");
        exit( );
    }
}
?>
<?php
$query = "SELECT * FROM classics WHERE id=$id";
$res = mysqli_query($mysqli, $query);
    if (!$res) die (mysqli_error($mysqli));
    while ($row = mysqli_fetch_assoc($res)) {
    ?>
        <h2>Изменить запись</h2>
        <form action="" method="post" class="form">
        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control" required value="<?=$row['author']?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required value="<?= $row['title']?> ">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="type" class="form-control" required value="<?= $row['type']?> ">
        </div>
        <div class="mb-3">
            <label class="form-label">Year</label>
            <input type="text" name="year" class="form-control" required value="<?= $row['year']?> ">
        </div>
        <input type="submit" name="submit" class="btn btn-primary" name="submit" value="UPD">
        </form>
        <?php
        }
        ?>
<?php
$query = "SELECT * FROM classics WHERE id=$id";
$res = mysqli_query($mysqli, $query);
if (!$res) die (mysqli_error($mysqli));
while ($row = mysqli_fetch_assoc($res)) {
    ?>
    <p>
    <h5><?= $row['title']; ?> <a href="?del=ok&id=<?= $row['id']; ?>">уд.</a></h5>
    <?= $row['author']; ?><br>
    Category: <?= $row['type']; ?><br>
    Year: <?= $row['year']; ?><br>
    </p>
<?php
    }
    ?>
</body>
