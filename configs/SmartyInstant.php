<?php
declare(strict_types=1);

namespace configs;

require_once "/usr/local/lib/php/Smarty/Smarty.class.php";

class SmartyInstant extends \Smarty
{
    function __construct()
    {
        $this->assign("BASE_URL", BASE_URL);
        $this->{"template_dir"} = BASE_DIR . '/templates';
        $this->{"compile_dir"} = BASE_DIR . '/templates_c';
    }
}
