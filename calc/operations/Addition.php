<?php



namespace operations;

Class Addition implements \calc_interface\math_operation
{
    const Operator = '+';
    const Name = "Addition";

  /*  public static function getOperator(): string
    {
        return Operator;
    }

    public static function getName(): string
    {
        return Name;
    }*/

    public function operation($operand1, $operand2) {
        return $operand1 + $operand2;
    }
}