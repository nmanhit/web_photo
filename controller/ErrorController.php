<?php
declare(strict_types=1);

require_once "BaseController.php";

class ErrorController extends BaseController
{
    public function actionIndex(): void
    {
        $this->display("error/index.tpl");
    }
}
