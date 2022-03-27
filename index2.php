<!DOCTYPE HTML>
<html lang="ru"
<head>
    <meta charser = "UTF=8"
</head>
<body>
    <h2>Calculator</h2>
<!-- below forms for calculator --!>
    <form action="calc/Calc.php" method="post" class="calculator">
    <!-- field for first number --!>
    <input type="text" name="First_number" class="numbers" placeholder="First number">
        <?php
        if(!isset($_GET['name0'])) { // At the first opening go to Calc.php for operations
            header("Location: calc/Calc.php?loadoperator=1" );
        } else { // else show all operations
            // list of operations
            echo '<select class="operations" name="operation">';
            $i = 1;
            foreach ($_GET as $index => $value) {
                if ($index == "Result") {}
                else if ($i % 2 == 1) {
                    echo "<option value='" . $value . "'>";
                } else {
                    echo $value . "</option>";
                }
                $i++;
            }
            echo "</select>";
        }
        ?>

<!-- field for second number --!>
    <input type="text" name="Second_number" class="numbers" placeholder="Second number">
<!-- calculate --!>
    <input class="submit_form" type="submit" name="submit" value="Get answer">
    </form>
    <?php // if get the result - show it
    if (isset($_GET['Result'])) {
        Echo "Result: " . $_GET['Result'];
        }
    ?>
</body>
</html>
