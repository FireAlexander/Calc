<?php

namespace calc_interface;

interface math_operation
{

  /*public static function getName(): string;
  public static function getOperator(): string;*/
  public function operation($operand1, $operand2);
}