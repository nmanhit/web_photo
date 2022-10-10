<?php
declare(strict_types=1);

require_once "BaseController.php";
require_once "model/Category.php";
require_once "helpers/Html.php";
require_once "helpers/Uploader.php";
require_once "helpers/FormatConverter.php";
require_once "configs/constant.php";

use model\Category as Category;
use helpers\Html as HtmlHelper;
use helpers\FormatConverter as FormatConverter;

class CategoryController extends BaseController
{
    public function actionIndex(): void
    {
        $category = new Category();
        $condition = "is_active = " . ACTIVE;
        $categories = $category->getByCondition($condition);
        $this->smarty->assign("categories", $categories);
        $this->smarty->assign("IMG_PREVIEW_DEFAULT", IMG_PREVIEW_DEFAULT);
        $this->display("category/index.tpl");
    }

    public function actionCreate(): void
    {
        if ($this->isPostMethod()) {
            $this->createOrUpdate("create");
            return;
        }
        $_SESSION["token"] = FormatConverter::getRandomString();
        $this->smarty->assign("token", $_SESSION["token"]);
        $this->smarty->assign("IMG_PREVIEW_DEFAULT", IMG_PREVIEW_DEFAULT);
        $this->display("category/create.tpl");
    }

    public function actionEdit(): void
    {
        $this->createOrUpdate("edit");
    }

    public function actionDetail()
    {
        $_SESSION["token"] = FormatConverter::getRandomString();
        $category = new Category();
        $id = HtmlHelper::htmlSpecialChars($_GET["id"]);
        $_category = $category->findById((int)$id);

        $categoryPhoto = IMG_PREVIEW_DEFAULT;
        if (!empty($_category["photo"])) $categoryPhoto = BASE_URL . "static/upload/" . $_category["photo"];

        $this->smarty->assign("category", $_category);
        $this->smarty->assign("token", $_SESSION["token"]);
        $this->smarty->assign("categoryPhoto", $categoryPhoto);
        $this->display("category/edit.tpl");
    }

    public function actionDelete(): void
    {
        $id = HtmlHelper::htmlSpecialChars($_GET["id"]);
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

    private function createOrUpdate(string $type): void
    {
        $name = HtmlHelper::htmlSpecialChars($_POST["name"]);
        $description = HtmlHelper::htmlSpecialChars($_POST["description"]);

        $token = HtmlHelper::htmlSpecialChars($_POST["token"]);
        if (!$this->validateToken($token)) return;

        $category = new Category();
        $category->name = $name;
        $category->description = $description;
        if ($type == "edit") {
            $id = HtmlHelper::htmlSpecialChars($_POST["id"]);
            $category->id = (int)$id;
        }
        if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {
            $photoName = $this->uploadImage("photo");
            if (!$photoName) return;

            $category->photo = $photoName;
        }
        $category->insertOrUpdate();
        $this->redirect("category");
    }
}
