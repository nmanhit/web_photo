<?php declare(strict_types=1);
require('../../model/category.php');
require('../../configs/smarty.php');

const CHARSET = 'ISO-8859-1';
const REPLACE_FLAGS = ENT_COMPAT | ENT_XHTML;
$smarty = new Smarty_Photo();

if($_SERVER['REQUEST_METHOD'] === "GET") {
    $categoryId = $_GET['id'] ?? 1;
    $category = Tbl_Categories::find($categoryId);
    $smarty->assign_by_ref('category', $category);
    $smarty->display('../views/category/edit.tpl');
}

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $categoryId = $_POST['id'] ?? 1;
    $name =  htmlspecialchars($_POST['name'], REPLACE_FLAGS, CHARSET);
    $description =  htmlspecialchars($_POST['description'], REPLACE_FLAGS, CHARSET);

    $new_category = new Tbl_Categories();
    $new_category->id = $categoryId;
    $new_category->name = $name;
    $new_category->description = $description;
    $new_category->save();
    header("Location: http://localhost/web_photo/Controller/category/index.php");
}

