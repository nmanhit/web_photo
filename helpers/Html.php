<?php
declare(strict_types=1);

namespace helpers;

class Html
{
    public static function htmlSpecialChars(string $content): string
    {
        return htmlspecialchars($content, REPLACE_FLAGS, CHARSET);
    }
}