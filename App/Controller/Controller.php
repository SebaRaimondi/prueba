<?php

class Controller
{
    private static $instance;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $caller = get_called_class();
            self::$instance = new $caller;
        }
        return self::$instance;
    }

    public function isLogged()
    {
        return (isset($_SESSION['id']) && $_SESSION['id'] != "");
    }

    public function loggedId()
    {
        if ($this->isLogged()) {
            return $_SESSION['id'];
        }
        return false;
    }
}
