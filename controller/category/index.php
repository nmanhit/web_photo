<?php declare(strict_types=1);
require '../../model/category.php';
require('../../configs/smarty.php');

$smarty = new Smarty_Photo();
$categories = Tbl_Categories::all();
$activeCategories = array_filter($categories, function ($v) {
    return $v["is_active"] == 1;
}, ARRAY_FILTER_USE_BOTH);

$smarty->assign_by_ref('categories', $activeCategories);
$smarty->display('../views/category/index.tpl');
