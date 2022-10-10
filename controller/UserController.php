<?php
declare(strict_types=1);

require_once "BaseController.php";
require_once "model/User.php";
require_once "helpers/Html.php";
require_once "helpers/Uploader.php";
require_once "helpers/FormatConverter.php";

use model\User as User;
use helpers\Html as HtmlHelper;
use helpers\FormatConverter as FormatConverter;

class UserController extends BaseController
{
    public function actionIndex(): void
    {
        $user = new User();
        $condition = "is_active = " . ACTIVE;
        $all_user = $user->getByCondition($condition);
        $this->smarty->assign("users", $all_user);
        $this->display("user/index.tpl");
    }

    public function actionCreate(): void
    {
        if ($this->isPostMethod()) {
            $this->createOrUpdate("create");
            return;
        }
        $_SESSION["token"] = FormatConverter::getRandomString();
        $this->smarty->assign("token", $_SESSION["token"]);
        $this->display("user/sign_up.tpl");
    }

    public function createOrUpdate(string $type): void {
        $email = HtmlHelper::htmlSpecialChars($_POST["email"]);
        $password = HtmlHelper::htmlSpecialChars($_POST["password"]);
        $fullName = HtmlHelper::htmlSpecialChars($_POST["fullName"]);
        $token = HtmlHelper::htmlSpecialChars($_POST["token"]);
        $this->validateToken($token);

        $user = new User();
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_BCRYPT);
        $user->full_name = $fullName;
        if($type == "edit") {
            $id = HtmlHelper::htmlSpecialChars($_POST["id"]);
            $user->id = (int)$id;
        }
        if (is_uploaded_file($_FILES["avatar"]["tmp_name"])) {
            $user->avatar = $this->uploadImage("avatar");
        }
        $user->insertOrUpdate();
        $this->redirect("user");
    }
}
