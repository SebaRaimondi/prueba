<?php

class Connection
{
    private static $instance;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=localhost;dbname=prueba', 'seba', 'seba');
        }
        return self::$instance;
    }
}
