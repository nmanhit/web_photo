<?php
declare(strict_types=1);

include 'BaseController.php';
include 'model/User.php';
include 'helpers/Html.php';

use model\User as User;
use helpers\Html as HtmlHelper;

class UserController extends BaseController
{

    public function actionIndex()
    {
//        $user = new User();
//        $all_category = $category->getAll();
//        $active_category = array_filter($all_category, function ($record) {
//            return $record["is_active"] == 1;
//        }, ARRAY_FILTER_USE_BOTH);
//        $this->smarty->assign('categories', $active_category);
//        $this->display("category/index.tpl");
    }

    public function actionCreate()
    {
//        if ($this->isPostMethod()) {
//            $name = HtmlHelper::htmlSpecialChars($_POST['name']);
//            $description = HtmlHelper::htmlSpecialChars($_POST['description']);
//            $token = HtmlHelper::htmlSpecialChars($_POST['token']);
//            $this->validateToken($token);
//
//            $category = new Category();
//            $category->name = $name;
//            $category->description = $description;
//            $category->insertOrUpdate();
//            $this->redirect("category");
//            return;
//        }
        $_SESSION['token'] = bin2hex(random_bytes(35));
        $this->smarty->assign('token', $_SESSION['token']);
        $this->display("user/sign_up.tpl");
    }

    public function actionEdit(): void
    {
//        $id = HtmlHelper::htmlSpecialChars($_POST['id']);
//        $name = HtmlHelper::htmlSpecialChars($_POST['name']);
//        $description = HtmlHelper::htmlSpecialChars($_POST['description']);
//        $token = HtmlHelper::htmlSpecialChars($_POST['token']);
//        $this->validateToken($token);
//
//        $category = new Category();
//        $category->id = (int)$id;
//        $category->name = $name;
//        $category->description = $description;
//        $category->insertOrUpdate();
//        $this->redirect("category");
    }

    public function actionDetail()
    {
//        $_SESSION['token'] = bin2hex(random_bytes(35));
//        $category = new Category();
//        $id = HtmlHelper::htmlSpecialChars($_GET['id']);
//        $_category = $category->findById($id);
//
//        $this->smarty->assign('category', $_category);
//        $this->smarty->assign('token', $_SESSION['token']);
//        $this->display("category/edit.tpl");
    }

    public function actionDelete(): void
    {
//        $id = HtmlHelper::htmlSpecialChars($_GET['id']);
//        $category = new Category();
//        $_category = $category->findById($id);
//        if(!isset($_category) || count($_category) < 1) {
//            $this->display("error/index.tpl");
//        }
//
//        $category->id = (int)$id;
//        $category->is_active = INACTIVE;
//        $category->insertOrUpdate();
//        $this->redirect("category");
    }
}