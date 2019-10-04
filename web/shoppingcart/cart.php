<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <link rel="stylesheet" type="text/css" href="fife_store.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <table class="table table-hover" style="border-radius: 50%; width: 70%">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Item</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
        </tr>
    </thead>
    <tbody>
    <?php
        for($i = 0; $i < sizeof($items); $i++) {
            $totalPrice = ($prices[i] * $quantities[i]);
            echo("<tr><th scope='row'>" . $items[$i] . "</th><td>" . $prices[$i] . "</td><td>" . $quantities[$i] . "</td><td>" . $totalPrice . "</td></tr>");
        }
    ?>
    </tbody>
</table>

    <footer>
        Website created by Tori Fife. 10/2019.
    </footer>
</body>

</html>