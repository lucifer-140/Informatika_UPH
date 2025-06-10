<?php

namespace Lucy\Uts;

use PDO;

class DB
{
    private static $db;

    public static function getDB()
    {
        if (!self::$db) {
            self::$db = new PDO('mysql:host=localhost;dbname=UTS_Sem6', 'root', '');
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$db;
    }
}