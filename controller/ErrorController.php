<?php
declare(strict_types=1);

include 'BaseController.php';

class ErrorController extends BaseController
{

    public function actionIndex(): void
    {
        $this->display("error/index.tpl");
    }
}
