<?php

declare(strict_types=1);


namespace configs;

include '/usr/local/lib/php/Smarty/Smarty.class.php';


class smarty_instant extends \Smarty
{
    function __construct()
    {
        $this->assign("BASE_URL", getenv("BASE_URL"));
        $this->{"template_dir"} = BASE_DIR . '/templates';
        $this->{"compile_dir"} = BASE_DIR . '/templates_c';
    }
}
