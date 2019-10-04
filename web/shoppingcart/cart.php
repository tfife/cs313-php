<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <link rel="stylesheet" type="text/css" href="fife_store.css">
    <meta charset="UTF-8">
    <title>View Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
</head>

<body>
    <?php
        if ($_SESSION[items]) {
            $items = $_SESSION[items];
            $prices = $_SESSION[prices];
            $quantities = $_SESSION[quantities];
        }
        else {
            $items = [];
            $prices = []];
            $quantities = [];
        }
        echo "</script>";
    ?>
    <header>        
        <div class="title">
            View Cart
            <a href="browse.php" style="float: right">Click Here to return to Browse"</a>
        </div>
    </header>
    
    <div>This is where content will appear for the Cart</div>
    <?php

        foreach($i = 0; $i < sizeof($items); i++) {
            echo("<div class='bodyBox'><div class='product'><div> " . $items[$i] . " </div><div>Quantity: " . $quantities[$i] . $prices[i] . " </div></div></div>");
        }
    ?>

    <footer>
        Website created by Tori Fife. 10/2019.
    </footer>
</body>

</html>