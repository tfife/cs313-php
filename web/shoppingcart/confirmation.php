<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <link rel="stylesheet" type="text/css" href="fife_store.css">
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
</head>

<body>
    <header>
    </header>
  
    <div class="title">Order Confirmed</div>
    <div class="bodyBox">
        Items:
        <ul>
        <?php
            $totalPrice = 0;
            for($i = 0; $i < sizeof($items); $i++) {
                $totalPrice += ($prices[$i] * $quantities[$i]);
                echo("<li>" . $items[$i] . " (Quantity: " . $quantities[$i] . ", Price All: $" . number_format($prices[$i] * $quantities[$i], 2)
                 . "</li><br>");
            }
        ?>
        </ul>
        Total Price: $
        <?php
            echo($totalPrice . "<br>");
        ?>
</form>
        <a href="checkout.php"><button>Checkout</button></a>
    </div>
    <footer>
        Website created by Tori Fife. 10/2019.
    </footer>
</body>

</html>