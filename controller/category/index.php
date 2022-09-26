<?php
require('/usr/local/lib/php/Smarty/Smarty.class.php');
include('../../model/category.php');

$smarty = new Smarty();
$smarty->template_dir = '../../templates';
$smarty->compile_dir  = '../../templates_c';

$categories = getAllCategory();
$smarty->assign_by_ref('categories', $categories);
$smarty->display('../views/category/index.tpl');
