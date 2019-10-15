<?php

/***********************************************8
 * http://whispering-thicket-79511.herokuapp.com/liveshare.php
 */
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
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <title>Scripture Thing Assignment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="we are doing the coolest ever stuff with php and databases">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: whitesmoke;
            color: white;
            text-align: center;
        }
    </style>
</head>

<header>
</header>
<div class="container">
    <div class="jumbotron">
        <form>
            <label for="scripture" class="h3">
                <select id="scripture" class="form-control">
                    <?php foreach ($db->query('SELECT book, chapter, verse FROM Scriptures ORDER BY book') as $row) {
                        echo '<option value="' . $row["year"] . '">' . $row["year"] . '</option>';
                    } ?>
                </select>
        </form>
    </div>
</div>


<div class="footer">
    Website created by the coolest team ever.
</div>
</body>

</html>