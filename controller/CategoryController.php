<?php
declare(strict_types=1);

include 'BaseController.php';
include 'model/Category.php';

use model\Category as Category;
use helpers\Html as HtmlHelper;

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
        if ($this->isPost()) {
            $name = HtmlHelper::htmlSpecialChars($_POST['name']);
            $description = HtmlHelper::htmlSpecialChars($_POST['description']);

            $category = new Category();
            $category->name = $name;
            $category->description = $description;
            $category->save();
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
        $category->save();
        $this->redirect("category");
    }

    public function actionDetail()
    {
        $category = new Category();
        $id = HtmlHelper::htmlSpecialChars($_POST['id']);
        $_category = $category->findById($id);
        $this->smarty->assign('category', $_category);
        $this->display("category/edit.tpl");
    }

    public function actionDelete()
    {
        $id = HtmlHelper::htmlSpecialChars($_POST['id']);
        $category = new Category();
        $category->id = (int)$id;
        $category->is_active = 0;
        $category->save();
    }
}