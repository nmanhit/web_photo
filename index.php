<?php

declare(strict_types=1);

session_start();

include(__DIR__ . "/configs/constant.php");

$controller_get = $_GET["controller"] ?? "";
$action_get = $_GET["action"] ?? "";

$controller = $controller_get . CONTROLLER_SUFFIX;
$action = ACTION_PREFIX . $action_get;

spl_autoload_register(function ($class_name) {
    include "controller/" . $class_name . ".php";
    if (!class_exists($class_name, false)) {
        throw new LogicException("Unable to load class: $class_name");
    }
});

if (class_exists($controller)) {
    $_controller = new $controller();
    if (method_exists($_controller, $action)) {
        $_controller->$action();
    }
}
