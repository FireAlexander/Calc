<?php

interface math_operation
{
  public function getName();
  public function operation($operand1, $operand2);
}