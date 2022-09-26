<?php
require('/usr/local/lib/php/Smarty/Smarty.class.php');
include('../../model/category.php');

$smarty = new Smarty();
$smarty->template_dir = '../../templates';
$smarty->compile_dir  = '../../templates_c';

$categoryId = $_GET['id'] ?? 1;
$category = getCategoryById($categoryId);
$smarty->assign_by_ref('category', $category);
$smarty->display('../views/category/edit.tpl');
