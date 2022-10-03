<?php declare(strict_types=1);
require('../../model/category.php');
require('../../configs/smarty.php');
const CHARSET = 'ISO-8859-1';
const REPLACE_FLAGS = ENT_COMPAT | ENT_XHTML;

$smarty = new Smarty_Photo();

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $name =  htmlspecialchars($_POST['name'], REPLACE_FLAGS, CHARSET);
    $description =  htmlspecialchars($_POST['description'], REPLACE_FLAGS, CHARSET);

    $new_category = new Tbl_Categories();
    $new_category->name = $name;
    $new_category->description = $description;
    $new_category->save();
    header("Location: http://localhost/web_photo/Controller/category/index.php");
}
else {
    $smarty->display('../views/category/create.tpl');
}

