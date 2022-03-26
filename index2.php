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
    <select class="operations" name="operation">
    <!-- list of operations --!>
        <option value='Addition'>+ </option>
        <option value='Subtraction'>- </option>
        <option value='multiply'>* </option>
        <option value='divide'>/ </option>
    </select>
<!-- field for second number --!>
    <input type="text" name="Second_number" class="numbers" placeholder="Second number">
<!-- calculate --!>
    <input class="submit_form" type="submit" name="submit" value="Get answer">
    </form>
    <?php
    if (isset($_GET['Result'])) {
        Echo "Result: " . $_GET['Result'];

    }
    ?>
</body>
</html>
