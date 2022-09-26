<?php
require('/usr/local/lib/php/Smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = '../../templates';
$smarty->compile_dir  = '../../templates_c';

$smarty->display('../views/category/create.tpl');
