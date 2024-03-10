<?php
    class Testing{
        public function __construct(){}

        public function sum($num1, $num2){
            if ($num1 == NULL || $num2 == NULL || !is_numeric($num1) || !is_numeric($num2)) throw new InvalidArgumentException("values are not numerics");
            return $num1 + $num2;
        }
        public function divide($num1, $num2){
            if ($num1 === NULL || $num2 === NULL || !is_numeric($num1) || !is_numeric($num2)) throw new InvalidArgumentException("values are not numerics");
            if ($num1 == 0 || $num2 == 0) throw new DivisionByZeroError();
            return $num1 / $num2;
        }
    }
?>