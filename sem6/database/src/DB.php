<?php

namespace Uph\Database;

use PDO;

class DB{
    public static function getDB()
    {
        try {
            return new PDO(
                'mysql:host=127.0.0.1;dbname=uph23ti2',
                'root',
                ''
            );
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}


