<?php
    class Testing{
        private $db;
        public function __construct(DatabaseInterface $db)
        {
            $this->db = $db;
        }

        public function sum($num1, $num2){
            if ($num1 == NULL || $num2 == NULL || !is_numeric($num1) || !is_numeric($num2)) throw new InvalidArgumentException("values are not numerics");
            return $num1 + $num2;
        }
        public function divide($num1, $num2){
            if ($num1 === NULL || $num2 === NULL || !is_numeric($num1) || !is_numeric($num2)) throw new InvalidArgumentException("values are not numerics solo valores numericos puto");
            if ($num1 == 0 || $num2 == 0) throw new DivisionByZeroError('no poner 0');
            return $num1 / $num2;
        }



        //aqui usaremos un mock para simular una base de datos
    
        public function getUserFullName($userId)
        {
            $user = $this->db->getUserById($userId);
            if ($user) {
                return $user['first_name'] . ' ' . $user['last_name'];
            } else {
                return null;
            }
        }
    }
?>