<?php

declare(strict_types=1);


include 'BaseController.php';
include 'model/Category.php';

use model\Category as Category;


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
            $name = htmlspecialchars($_POST['name'], REPLACE_FLAGS, CHARSET);
            $description = htmlspecialchars($_POST['description'], REPLACE_FLAGS, CHARSET);

            $category = new Category();
            $category->name = $name;
            $category->description = $description;
            $category->save();
            $this->redirect("/index.php?controller=category&action=index");
        }
    }

    public function actionEdit(): void
    {
        $id = htmlspecialchars($_POST['id'], REPLACE_FLAGS, CHARSET);
        $name = htmlspecialchars($_POST['name'], REPLACE_FLAGS, CHARSET);
        $description = htmlspecialchars($_POST['description'], REPLACE_FLAGS, CHARSET);

        $category = new Category();
        $category->id = (int)$id;
        $category->name = $name;
        $category->description = $description;
        $category->save();
        $this->redirect("/index.php?controller=category&action=index");
    }

    public function actionDetail()
    {
        $category = new Category();
        $id = htmlspecialchars($_GET['id'], REPLACE_FLAGS, CHARSET);
        $_category = $category->findById($id);
        $this->smarty->assign('category', $_category);
        $this->display("category/edit.tpl");
    }

    public function actionDelete()
    {
        $id = htmlspecialchars($_GET['id'], REPLACE_FLAGS, CHARSET);
        $category = new Category();
        $category->id = (int)$id;
        $category->is_active = 0;
        $category->save();
    }
}
