<?php
declare(strict_types=1);

include 'BaseController.php';
include 'model/User.php';
include 'helpers/Html.php';
include 'helpers/Uploader.php';

use model\User as User;
use helpers\Html as HtmlHelper;
use helpers\Uploader as Uploader;

class UserController extends BaseController
{

    public function actionIndex(): void
    {
        $user = new User();
        $all_user = $user->getAll();
        $active_user = array_filter($all_user, function ($record) {
            return $record["is_active"] == 1;
        }, ARRAY_FILTER_USE_BOTH);
        $this->smarty->assign('users', $active_user);
        $this->display("user/index.tpl");
    }

    public function actionCreate(): void
    {
        if ($this->isPostMethod()) {
            $this->createOrUpdate("create");
            return;
        }
        $_SESSION['token'] = bin2hex(random_bytes(35));
        $this->smarty->assign('token', $_SESSION['token']);
        $this->display("user/sign_up.tpl");
    }

    public function actionEdit(): void
    {
    }

    public function actionDetail(): void
    {
    }

    public function actionDelete(): void
    {
    }

    public function createOrUpdate(string $type): void {
        $email = HtmlHelper::htmlSpecialChars($_POST['email']);
        $password = HtmlHelper::htmlSpecialChars($_POST['password']);
        $fullName = HtmlHelper::htmlSpecialChars($_POST['fullName']);
        $token = HtmlHelper::htmlSpecialChars($_POST['token']);
        $this->validateToken($token);

        $user = new User();
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_BCRYPT);
        $user->full_name = $fullName;
        if($type == "edit") {
            $id = HtmlHelper::htmlSpecialChars($_POST['id']);
            $user->id = (int)$id;
        }
        if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
            $user->avatar = $this->UploadImage("avatar");
        }
        $user->insertOrUpdate();
        $this->redirect("user");
    }
}
