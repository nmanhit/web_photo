<?php
declare(strict_types=1);

include("configs/smarty_instant.php");

use configs\smarty_instant as Smarty;

class BaseController
{
    protected Smarty $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
    }

    public function display($template): void
    {
        $this->smarty->display(BASE_DIR . '/views/' . $template);
    }

    public function isPostMethod(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === "POST";
    }

    public function redirect($controller, $action = "index", $permanent = false): void
    {
        $url = BASE_URL . "/index.php?controller=".$controller."&action=".$action;
        header('Location: ' . $url, true, $permanent ? 301 : 302);
    }
}
