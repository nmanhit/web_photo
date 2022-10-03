<?php declare(strict_types=1);
require('/usr/local/lib/php/Smarty/Smarty.class.php');

class Smarty_Photo extends Smarty {
    function __construct() {
        $this->template_dir = '../../templates';
        $this->compile_dir  = '../../templates_c';
    }
}
?>

