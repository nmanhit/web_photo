<?php
declare(strict_types=1);

include 'BaseController.php';
include 'model/Category.php';
include 'helpers/Html.php';
include 'helpers/Uploader.php';
include_once 'configs/constant.php';

use model\Category as Category;
use helpers\Html as HtmlHelper;
use helpers\Uploader as Uploader;

class CategoryController extends BaseController
{
    public function actionIndex()
    {
        $category = new Category();
        $all_category = $category->getAll();
        $active_category = array_filter($all_category, function ($record) {
            return $record["is_active"] == 1;
        }, ARRAY_FILTER_USE_BOTH);
        $this->smarty->assign('categories', $active_category);
        $this->display("category/index.tpl");
    }

    public function actionCreate()
    {
        if ($this->isPostMethod()) {
            $name = HtmlHelper::htmlSpecialChars($_POST['name']);
            $description = HtmlHelper::htmlSpecialChars($_POST['description']);
            $photo = $_FILES['photo'];

            $token = isset($_POST['token']) ? HtmlHelper::htmlSpecialChars($_POST['token']) : "";
            $this->validateToken($token);

            if(empty($name)) {
                $this->display("error/index.tpl");
            }

            $photoName = "";
            if(!empty($photo)) {
                $uploader = new Uploader();
                $result = $uploader->uploadFile('photo');
                if($result["isError"]) $this->display("error/index.tpl");
                $photoName = $result["photoName"];
            }

            $category = new Category();
            $category->name = $name;
            $category->description = $description;
            $category->photo = $photoName;
            $category->insertOrUpdate();
            $this->redirect("category");
        }
        $_SESSION['token'] = bin2hex(random_bytes(35));
        $this->smarty->assign('token', $_SESSION['token']);
        $this->smarty->assign("IMG_PREVIEW_DEFAULT", IMG_PREVIEW_DEFAULT);
        $this->display("category/create.tpl");
    }

    public function actionEdit(): void
    {
        $id = HtmlHelper::htmlSpecialChars($_POST['id']);
        $name = HtmlHelper::htmlSpecialChars($_POST['name']);
        $description = HtmlHelper::htmlSpecialChars($_POST['description']);
        $token = HtmlHelper::htmlSpecialChars($_POST['token']);
        $this->validateToken($token);

        $category = new Category();
        $category->id = (int)$id;
        $category->name = $name;
        $category->description = $description;
        $category->insertOrUpdate();
        $this->redirect("category");
    }

    public function actionDetail()
    {
        $_SESSION['token'] = bin2hex(random_bytes(35));
        $category = new Category();
        $id = HtmlHelper::htmlSpecialChars($_GET['id']);
        $_category = $category->findById($id);

        $categoryPhoto = IMG_PREVIEW_DEFAULT;
        if(!empty($_category["photo"])) $categoryPhoto = BASE_URL."static/upload/".$_category["photo"];

        $this->smarty->assign('category', $_category);
        $this->smarty->assign('token', $_SESSION['token']);
        $this->smarty->assign("categoryPhoto", $categoryPhoto);
        $this->display("category/edit.tpl");
    }

    public function actionDelete(): void
    {
        $id = HtmlHelper::htmlSpecialChars($_GET['id']);
        $category = new Category();
        $_category = $category->findById($id);
        if(!isset($_category) || count($_category) < 1) {
            $this->display("error/index.tpl");
        }

        $category->id = (int)$id;
        $category->is_active = INACTIVE;
        $category->insertOrUpdate();
        $this->redirect("category");
    }
}
