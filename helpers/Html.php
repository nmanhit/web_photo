<?php
declare(strict_types=1);
namespace helpers;

class Html
{
    public static function htmlSpecialChars($content): string
    {
        if(empty($content)) return "";
        return htmlspecialchars((string)$content, REPLACE_FLAGS, CHARSET);
    }
}