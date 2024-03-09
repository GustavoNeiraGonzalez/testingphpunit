<?php
    class Testing{
        public function __construct(){}

        public function sum($num1, $num2){
            if ($num1 == NULL || $num2 == NULL || !is_numeric($num1) || !is_numeric($num2)) throw new InvalidArgumentException("values are not numerics");
            return $num1 + $num2;
        }
        public function division($num1, $num2){
            return $num1 / $num2;
        }
    }
?>