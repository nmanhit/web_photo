<?php
declare(strict_types=1);

require_once "configs/SmartyInstant.php";

use configs\SmartyInstant as Smarty;
use helpers\Uploader as Uploader;

class BaseController
{
    protected Smarty $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
    }

    public function display(string $template): void
    {
        $this->smarty->display(BASE_DIR . "/views/" . $template);
    }

    public function isPostMethod(): bool
    {
        return $_SERVER["REQUEST_METHOD"] === "POST";
    }

    public function redirect($controller, $action = "index", $permanent = false): void
    {
        $url = BASE_URL . "/index.php?controller=" . $controller . "&action=" . $action;
        header("Location: " . $url, true, $permanent ? STATUS_301 : STATUS_302);
    }

    public function validateToken(string $token): bool
    {
        if (!$token || $token !== $_SESSION["token"]) {
            $this->redirect("error");
            return false;
        }
        return true;
    }

    public function uploadImage(string $photo): string
    {
        $uploader = new Uploader();
        $result = $uploader->uploadFile($photo);
        if ($result["isError"]) {
            $this->redirect("error");
            return "";
        };
        return $result["photoName"];
    }
}
