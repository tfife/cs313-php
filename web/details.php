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

    $id = $_GET['id'];

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
            margin-top: 3em;
            margin-bottom: 0;
            width: 100%;
            background-color: lightgrey;
            color: black;
            text-align: center;
        }
    </style>
</head>
<body>
<header>
    <div class="jumbotron">
        <h1 class="display-4">Scripture Details</h1>
    </div>
</header>

    <div class="container">
    <div class="shadow p-4 mb-4 bg-white">
        <label for="scripture" class="h3">
        <div id="scripture">
            <?php 
            $statement = $db->query(('SELECT * FROM Scriptures WHERE id = 1'));
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
            echo var_dump($row);
            echo var_dump($row[0]);

            echo $row[0]['book'];
            echo '<p><strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> - "' . $row['content'] . '"</p>';
            ?>
        </div>
    </div>
</div>


<div class="footer">
    <h1 class="display-4">Created by Jordan and Tori</h1>
</div>
</body>
</html>