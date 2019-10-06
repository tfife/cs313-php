<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <link rel="stylesheet" type="text/css" href="fife_store.css">
    <meta charset="UTF-8">
    <title>Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
</head>

<body background="images/triangles.jpg">
    <header>
        Checkout
        <div></div>
    </header>

    <?php
        // define variables and set to empty values
        $addr1Err = $cityErr = $stateErr = "";
        $ZipErr = $nameErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
            } else {
                $name = test_input($_POST["name"]);
            }

            if (empty($_POST["addr1"])) {
                $addr1Err = "Address Line is required";
            } else {
                $name = test_input($_POST["addr1"]);
            }

            if (empty($_POST["addr2"])) {
                $addr2 = "";
              } else {
                $website = test_input($_POST["addr2"]);
              }

            if (empty($_POST["city"])) {
                $cityErr = "City is required";
            } else {
                $name = test_input($_POST["city"]);
            }

            if (empty($_POST["state"])) {
                $stateErr = "State is required";
            } else {
                $name = test_input($_POST["state"]);
            }

            if (empty($_POST["zip"])) {
                $ZipErr = "Zip Code is required";
            } else {
                $name = test_input($_POST["zip"]);
            }
        }
    ?>
    <div class="bodyBox">
        <h2>Add Address Information</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Name: <br><input type="text" name="name"><br>
            Address Line 1<br><input type="text" name="addressLine1"><span class="error">* <?php echo $addr1Err;?></span><br>
            Address Line 2<br><input type="text" name="addressLine2"><br>
            City:<br><input type="text" name="city"><span class="error">* <?php echo $cityErr;?></span><br>   
            State:<br><input type="text" name="state"><span class="error">* <?php echo $stateErr;?></span><br>
            Zip:<br><input type="text" name="zip"><span class="error">* <?php echo $ZipErr;?></span><br>
            <input type="submit">
        </form>
        <a href="checkout.php"><button>Checkout</button></a>
    </div>

    <footer>
        Website created by Tori Fife. 10/2019.
    </footer>
</body>

</html>