<?php

    //aqui usaremos un mock para simular una base de datos
    
    class TestingMockDB{
    private $db;
    public function __construct(DatabaseInterface $db)
        {
            $this->db = $db;
        }

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