<?php

namespace operations;

class Subtraction implements \calc_interface\math_operation
{
    const Operator = '-';
    const Name = "Subtraction";

  /*  public static function getOperator(): string
    {
        return Operator;
    }

    public static function getName(): string
    {
        return Name;
    } */

    public function operation($operand1, $operand2)
    {
        return $operand1 - $operand2;
    }

}
