<?php

session_start();

require_once 'vendor/autoload.php';
require_once 'Connection.php';
require_once "App/Controller/Twig.php";

define('ROOTPATH', __DIR__);

function validateGet($params)
{
    foreach ($params as $key) {
        if (!(isset($_GET[$key]) && trim($_GET[$key]) != "")) {
            return false;
        }
    }
    return true;
}
function validatePost($params)
{
    foreach ($params as $key) {
        if (!(isset($_POST[$key]) && trim($_POST[$key]) != "")) {
            return false;
        }
    }
    return true;
}

$controller = 'Home';
$action = 'index';

if (validateGet(['controller', 'action'])) {
        $controller = ucwords($_GET['controller']);
        $action = strtolower($_GET['action']);
}

require_once "App/Controller/Controller.php";
require_once "App/Controller/$controller.php";

$controller = $controller.'Controller';
$controller = call_user_func([$controller, 'getInstance']);
call_user_func([$controller, $action]);
