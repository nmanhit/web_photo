<?php
declare(strict_types=1);

include 'BaseController.php';
include 'model/Category.php';
include 'helpers/Html.php';
include 'helpers/Uploader.php';

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
        $this->display("category/create.tpl");
        if ($this->isPostMethod()) {
            $name = HtmlHelper::htmlSpecialChars($_POST['name']);
            $description = HtmlHelper::htmlSpecialChars($_POST['description']);
            $photo = HtmlHelper::htmlSpecialChars($_FILES['photo']);

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
    }

    public function actionEdit(): void
    {
        $id = HtmlHelper::htmlSpecialChars($_POST['id']);
        $name = HtmlHelper::htmlSpecialChars($_POST['name']);
        $description = HtmlHelper::htmlSpecialChars($_POST['description']);

        $category = new Category();
        $category->id = (int)$id;
        $category->name = $name;
        $category->description = $description;
        $category->insertOrUpdate();
        $this->redirect("category");
    }

    public function actionDetail()
    {
        $category = new Category();
        $id = HtmlHelper::htmlSpecialChars($_GET['id']);
        $_category = $category->findById($id);
        $this->smarty->assign('category', $_category);
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
