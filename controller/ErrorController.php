<?php
declare(strict_types=1);

include("configs/message.php");

class ErrorController
{
    public function showError($errorMessage = ""): void
    {
        if($errorMessage == "") $errorMessage = SOMETHING_WENT_WRONG;
        $this->smarty->assign('errorMessage', $errorMessage);
        $this->display("error/index.tpl");
    }
}
