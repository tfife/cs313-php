<?php
session_start();

try {
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"], '/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo 'Error!: ' . $ex->getMessage();
    die();
}

$book = $_POST['book'];
?>
<div class="container">
    <div class="shadow p-4 mb-4 bg-white">
        <label for="scripture" class="h3">
        <div id="scripture">

<?php
foreach ($db->query('SELECT id, book, chapter, verse FROM Scriptures WHERE book=\'' . $book . '\'') as $row) {
    echo '<a href="details.php?id=' . $row["id"] . '"><p><strong>' . $row["book"] . ' ' . $row["chapter"] . ':' . $row["verse"] . '</strong></p></a>';
}
?>
        </div>
    </div>
</div>