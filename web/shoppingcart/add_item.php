<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <title>Add Item</title>
</head>

<body>
    <?php
        $_SESSION[cart] = $_POST["cart"];
        echo $_SESSION[cart][0];
    ?>
</body>


</html>