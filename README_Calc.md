# Calculator with plug-in (version 0.7 alpha)

This project template provides a starter kit for managing your site
dependencies with [Composer](https://getcomposer.org/).

## Main file

Run file - Index2.php.

##Logic file

Calc.php - main class for calculator.

##Plug-in

To connect a new operation, you need to create a new class
in the "/operations" directory.

Basic properties
```
const Operator = '-'; // type of operand - how the operation will be displayed in the calculator
const Name = "Subtraction"; // type of operand = Class name!!!
```
Basic method
```
//In the method, it is necessary to implement an operation on operands
public function operation($operand1, $operand2)
```
