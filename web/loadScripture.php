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

foreach ($db->query('SELECT book, chapter, verse, content FROM Scriptures WHERE book=\'' . $book . '\'') as $row) {
    echo '<p><strong>' . $row["book"] . ' ' . $row["chapter"] . ':' . $row["verse"] . '</strong> - "' . $row["content"] . '"</p>';
}



?>