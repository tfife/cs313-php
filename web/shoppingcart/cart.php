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
            $prices = [];
            $quantities = [];
        }
    ?>
    <header>        
        <div class="title">
            View Cart
            <a href="browse.php" style="font-size: 12px; color: white; float: right">Click Here to return to Browse</a>
        </div>
    </header>
    <?php
        echo ("<div class='cart_item'><div>Item</div><div>Quantity</div><div>Individual Price</div><div>Combined Price</div></div>")
        for($i = 0; $i < sizeof($items); $i++) {
            $totalPrice = ($prices[i] * $quantities[i]);
            echo("<div class='cart_item'><div>" . $items[$i] . "</div><div>" . $quantities[$i] . "</div><div>" . $prices[$i] . "</div><div>" . $totalPrice . "</div></div>");
        }
    ?>

    <footer>
        Website created by Tori Fife. 10/2019.
    </footer>
</body>

</html>