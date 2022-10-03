<?php declare(strict_types=1);
require('../../model/category.php');
require('../../configs/smarty.php');

$new_category = new Tbl_Categories();
$new_category->id = (int)$_GET['id'];
$new_category->is_active = 0;
$new_category->save();
