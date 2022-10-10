<?php
declare(strict_types=1);

include 'BaseController.php';
include 'model/Category.php';
include 'helpers/Html.php';
include 'helpers/Uploader.php';

use model\Category as Category;
use helpers\Html as HtmlHelper;
//use helpers\Uploader as Uploader;

class CategoryController extends BaseController
{
    public function actionIndex(): void
    {
        $category = new Category();
        $all_category = $category->getAll();
        $active_category = array_filter($all_category, function ($record) {
            return $record["is_active"] == 1;
        }, ARRAY_FILTER_USE_BOTH);
        $this->smarty->assign('categories', $active_category);
        $this->display("category/index.tpl");
    }

    public function actionCreate(): void
    {
        if ($this->isPostMethod()) {
            $this->createOrUpdate("create");
            return;
        }
        $_SESSION['token'] = bin2hex(random_bytes(35));
        $this->smarty->assign('token', $_SESSION['token']);
        $this->display("category/create.tpl");
    }

    public function actionEdit(): void
    {
        $this->createOrUpdate("edit");
    }

    public function actionDetail(): void
    {
        $_SESSION['token'] = bin2hex(random_bytes(35));
        $category = new Category();
        $id = HtmlHelper::htmlSpecialChars($_GET['id']);
        $_category = $category->findById((int)$id);

        $this->smarty->assign('category', $_category);
        $this->smarty->assign('token', $_SESSION['token']);
        $this->display("category/edit.tpl");
    }

    public function actionDelete(): void
    {
        $id = HtmlHelper::htmlSpecialChars($_GET['id']);
        $category = new Category();
        $_category = $category->findById((int)$id);
        if (!isset($_category) || count($_category) < 1) {
            $this->display("error/index.tpl");
        }

        $category->id = (int)$id;
        $category->is_active = INACTIVE;
        $category->insertOrUpdate();
        $this->redirect("category");
    }

    protected function createOrUpdate(string $type): void {
        $name = HtmlHelper::htmlSpecialChars($_POST['name']);
        $description = HtmlHelper::htmlSpecialChars($_POST['description']);
        $token = HtmlHelper::htmlSpecialChars($_POST['token']);
        $this->validateToken($token);

        $category = new Category();
        $category->name = $name;
        $category->description = $description;
        if($type == "edit") {
            $id = HtmlHelper::htmlSpecialChars($_POST['id']);
            $category->id = (int)$id;
        }
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
            $category->photo = $this->UploadImage("photo");
        }
        $category->insertOrUpdate();
        $this->redirect("category");
    }
}
